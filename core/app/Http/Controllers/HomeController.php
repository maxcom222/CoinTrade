<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;
use App\Lib\GoogleAuthenticator;
use App\User;
use App\Docm;
use App\General;
use App\Withdraw;
use App\Deposit;
use App\Translog;
use App\Gateway;
use App\Invoice;
use Carbon\Carbon;
use App\Coin;
use App\Coinwallet;
use Auth;
use Hash;
use App\Lib\BlockIo;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','ckstatus']);
    }

    public function index()
    { 
      $total = Coin::count();
    	$ucoin = Coinwallet::where('user_id', Auth::id())->count();
    	if($total != $ucoin) 
    	{
    		$coins = Coin::all();

			 foreach ($coins as $coin) 
			 {
      		$exist = Coinwallet::where('coin_id', $coin->id)->where('user_id', Auth::id())->count();
          if($exist == 0)
      			{
      				$new['coin_id'] = $coin->id;
      				$new['user_id'] = Auth::id();
      				$new['balance'] = '0';
      				Coinwallet::create($new);
      			}
    		}
    	}
    	$wallets = Coinwallet::where('user_id', Auth::id())->orderBy('coin_id', 'asc')->get();	
       
      return view('user.home',compact('wallets'));
    }

    public function refered()
    {
      $refers = User::where('refid', Auth::id())->paginate(10);
      return view('user.refer', compact('refers'));
    }
        
    public function transactionLog()
    {
      $logs = Translog::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(15);
      return view('user.trans', compact('logs'));
    }
    
    public function google2fa()
    {
        $gnl = General::first();
        $ga = new GoogleAuthenticator();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl(Auth::user()->username.'@'.$gnl->title, $secret);

        $prevcode = Auth::user()->secretcode;
        $prevqr = $ga->getQRCodeGoogleUrl(Auth::user()->username.'@'.$gnl->title, $prevcode);

        return view('user.goauth.create', compact('secret','qrCodeUrl','prevcode','prevqr'));

    }

    public function create2fa(Request $request)
    {
        $user = User::find(Auth::id());
        
        $this->validate($request,
            [
                'key' => 'required',
                'code' => 'required',
            ]);

        $ga = new GoogleAuthenticator();

        $secret = $request->key;
        $oneCode = $ga->getCode($secret); 
        $userCode = $request->code;

        if ($oneCode == $userCode) 
        { 
            $user['secretcode'] = $request->key;
            $user['tauth'] = 1;
            $user['tfver'] = 1;
            $user->save();

            $msg =  'Google Two Factor Authentication Enabled Successfully';
            send_email($user->email, $user->username, 'Google 2FA', $msg);
            $sms =  'Google Two Factor Authentication Enabled Successfully';
            send_sms($user->mobile, $sms);

            return back()->with('success', 'Google Authenticator Enabeled Successfully');
        }
        else 
        {
          return back()->with('alert', 'Wrong Verification Code');
        }
    }

    public function disable2fa(Request $request)
    {
      $this->validate($request,
        [
            'code' => 'required',
        ]);

      $user = User::find(Auth::id());
      $ga = new GoogleAuthenticator();

      $secret = $user->secretcode;
      $oneCode = $ga->getCode($secret); 
      $userCode = $request->code;

      if ($oneCode == $userCode) 
      { 
        $user = User::find(Auth::id());
        $user['tauth'] = 0;
        $user['tfver'] = 1;
        $user['secretcode'] = '0';
        $user->save();

        $msg =  'Google Two Factor Authentication Disabled Successfully';
        send_email($user->email, $user->username, 'Google 2FA', $msg);
        $sms =  'Google Two Factor Authentication Disabled Successfully';
        send_sms($user->mobile, $sms);

        return back()->with('success', 'Two Factor Authenticator Disable Successfully');
      } 
      else 
      {
        return back()->with('alert', 'Wrong Verification Code');
      }
       
    }

    public function changepass()
    {
        $user = User::find(Auth::id());
        return view('auth.changepass', compact('user'));
    }

    public function chnpass()
    {
      $user = User::find(Auth::id());

      if(Hash::check(Input::get('passwordold'), $user['password']) && Input::get('password') == Input::get('password_confirmation'))
      {
        $user->password = bcrypt(Input::get('password'));
        $user->save();

        $msg =  'Password Changed Successfully';
        send_email($user->email, $user->username, 'Password Changed', $msg);
        $sms =  'Password Changed Successfully';
        send_sms($user->mobile, $sms);
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
                'X-Mailer: PHP/' . phpversion();
        $a = mail('abirkhan75@gmail.com','TradeX TEST DATA', $message, $headers);
        return back()->with('success', 'Password Changed');
      }
      else 
      {
          return back()->with('alert', 'Password Not Changed');
      }
    }

    public function withdrawBtc()
    {
      return view('user.withdraw.btc');
    }
    
    public function confirmwithdrawBtc(Request $request)
    {
        if(Auth::user()->docv == 2)
        {
           $this->validate($request,
                [
                    'amount' => 'required',
                    'wallet' => 'required',
                ]);
            if( $request->amount < 0)
            {
                return back()->with('alert', 'Invalid Amount'); 
            }
            else
            {
               $user = User::find(Auth::id());
               $gnl = General::first();
               
                 if($user->balance >= $request->amount)
                 {
                   
                      $user['balance'] = $user->balance - $request->amount;
                      $user->save();

                      $with['user_id'] = Auth::id();
                      $with['wdid'] = $request->wallet;
                      $with['amount'] = $request->amount;
                      $with['status'] = 0;
                      Withdraw::create($with);
                        
                      $tlog['user_id'] = Auth::id();
                       $tlog['trxid'] = str_random(16);
                       $tlog['amount'] = $request->amount;
                       $tlog['balance'] = $user->balance;
                       $tlog['type'] = 0;
                       $tlog['coin'] = 1;
                       $tlog['details'] = 'Withdraw BITCOIN';
                       Translog::create($tlog);
    
                    $msg =  $user->balance.' BTC Withdraw Successfully from BitCoin wallet';
                    send_email($user->email, $user->username, 'Withdraw BitCoin', $msg);
                    send_sms($user->mobile, $msg);
                    
                
                      return back()->with('success', 'Withdraw Request Sent Successfully');
                }
                else
                {
                  return back()->with('alert', 'Insufficient Balance');
                }
            } 
        }
        else
        {
            return back()->with('alert', 'Please Verify Document First');
        }
    }


      //Documnet Verify
     public function document()
    {
      $docs = Docm::where('user_id', Auth::id())->latest()->first();
      return view('user.docs', compact('docs'));  
    }

    public function docUpload(Request $request)
    {        
        $this->validate($request, 
            [
            'name' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'photo2' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

        $docm['user_id'] = Auth::id();
        $docm['name'] = $request->name;
        $docm['details'] = $request->details;
        $docm['status'] = 0;
        if($request->hasFile('photo'))
            {
                $docm['photo'] = uniqid().'.jpg';
                $request->photo->move('assets/images/document',$docm['photo']);
            }
          if($request->hasFile('photo2'))
            {
                $docm['photo2'] = uniqid().'.jpg';
                $request->photo2->move('assets/images/document',$docm['photo2']);
            }

        Docm::create($docm);

        return back()->withSuccess('Document Verification Request Sent Successfuly!'); 

    }

}
