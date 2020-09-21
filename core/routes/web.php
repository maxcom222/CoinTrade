<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::get('/404', function () {
    return view('404');
})->name('404');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/register/{reference}', 'FrontController@register');
});

Route::get('/', 'FrontController@index');
Route::post('/contact-email', 'FrontController@contactEmail')->name('contact.email');
Route::get('/subscribe', 'FrontController@subscribe')->name('subscribe');
//Payment IPN
Route::post('/ipnpaypal', 'PaymentController@ipnpaypal')->name('ipn.paypal');
Route::post('/ipnperfect', 'PaymentController@ipnperfect')->name('ipn.perfect');
Route::get('/ipnbtc', 'PaymentController@ipnbtc')->name('ipn.btc');
Route::post('/ipnstripe', 'PaymentController@ipnstripe')->name('ipn.stripe');
Route::post('/ipncoin', 'PaymentController@ipncoin')->name('ipn.coinPay');
Route::post('/ipncoin-gate', 'PaymentController@coinGateIPN')->name('ipn.coinGate');
Route::get('/coin-gate', 'PaymentController@coingatePayment')->name('coinGate');
Route::post('/ipnskrill', 'PaymentController@skrillIPN')->name('ipn.skrill');
Route::get('/ipnblock', 'PaymentController@blockIpn')->name('ipn.block');
Route::get('/cron', 'PaymentController@cron');
Route::get('/cron-price', 'FrontController@CronThree');

//Authorization
Route::get('/authorization', 'FrontController@authorization')->name('authorization');
Route::post('/sendemailver', 'FrontController@sendemailver')->name('sendemailver');
Route::post('/emailverify', 'FrontController@emailverify')->name('emailverify');
Route::post('/sendsmsver', 'FrontController@sendsmsver')->name('sendsmsver');
Route::post('/smsverify', 'FrontController@smsverify')->name('smsverify');
Route::post('/home/g2fa/verify', 'FrontController@verify2fa')->name('go2fa.verify');

//Forgot Password
Route::post('/forgot-pass', 'FrontController@forgotPass')->name('forgot.pass');
Route::get('/reset/{token}', 'FrontController@resetLink')->name('reset.passlink');
Route::post('/reset/password', 'FrontController@passwordReset')->name('reset.passw');


Route::group(['middleware' => ['auth']], function() {
Route::group(['prefix' => 'home'], function () {

Route::get('/', 'HomeController@index')->name('home');
Route::get('/refered', 'HomeController@refered')->name('refered');
Route::get('/receive-btc', 'HomeController@receiveBtc')->name('receive.btc');

//CoinWallet
Route::post('/buy-coin', 'CoinController@buyCoin')->name('buy.wcoin');
Route::post('/sell-coin', 'CoinController@sellCoin')->name('sell.wcoin');

//Change Password
Route::get('/change/password', 'HomeController@changepass')->name('changepass');
Route::post('/change/passw', 'HomeController@chnpass')->name('changep');

//Documnet
Route::get('/document', 'HomeController@document')->name('document');
Route::post('/document-upload', 'HomeController@docUpload')->name('document.upload');

//Google-Auth
Route::get('/g2fa', 'HomeController@google2fa')->name('go2fa');
Route::post('/g2fa/create', 'HomeController@create2fa')->name('go2fa.create');
Route::post('/g2fa/disable', 'HomeController@disable2fa')->name('disable.2fa');

//Deposit
Route::get('/deposit', 'PaymentController@deposit')->name('deposit');
Route::post('/deposit-confirm', 'PaymentController@depconfirm')->name('deposit.confirm');
Route::get('/deposit-log', 'HomeController@depositLog')->name('deposit.ulog');


//Withdraw
Route::get('/withdraw-btc', 'HomeController@withdrawBtc')->name('user.withdrawbtc');
Route::post('/confirm-btc', 'HomeController@confirmwithdrawBtc')->name('withdraw.btc');
Route::get('/withdraw-log', 'HomeController@withdrawLog')->name('user.withlog');


//Transaction
Route::get('/transaction-log', 'HomeController@transactionLog')->name('transaction.log');

});
});




Route::group(['prefix' => 'admin'], function () {

  // General Settings
  Route::get('/general', 'GeneralController@index')->name('general');
  Route::post('/general/update', 'GeneralController@update')->name('general.update');
  Route::get('/logo', 'GeneralController@logo')->name('logo');
  Route::post('/logo/update', 'GeneralController@logoupdate')->name('logo.update');
  Route::get('/change-password', 'GeneralController@changepass')->name('change.password');
  Route::post('/password/update', 'GeneralController@updatepass')->name('password.update');

//Slider
  Route::get('/slide', 'SliderController@index')->name('slide');
  // Route::post('/slider', 'SliderController@store')->name('slider.store');
  Route::put('/slider/{slider}', 'SliderController@update')->name('slider.update');
  // Route::get('/slider/{slider}/delete', 'SliderController@destroy')->name('slider.destroy');
  //Services
  Route::get('/services', 'ServiceController@index')->name('service');
  Route::post('/service', 'ServiceController@store')->name('service.store');
  Route::put('/service/{service}', 'ServiceController@update')->name('service.update');
  Route::get('/service/{service}/delete', 'ServiceController@destroy')->name('service.destroy');
  
  //Testimonial
  Route::get('/testim', 'TestmController@index')->name('testim');
  Route::post('/testim', 'TestmController@store')->name('testim.store');
  Route::put('/testim/{testim}', 'TestmController@update')->name('testim.update');
  Route::get('/testim/{testim}/delete', 'TestmController@destroy')->name('testim.destroy');
  //FAQ
  Route::get('/faq', 'FaqController@index')->name('faq');
  Route::post('/faq/store', 'FaqController@store')->name('faq.store');
  Route::get('/faq/{faq}/edit', 'FaqController@edit')->name('faq.edit');
  Route::put('/faq/{faq}/update', 'FaqController@update')->name('faq.update');
  Route::get('/faq/{faq}/delete', 'FaqController@destroy')->name('faq.destroy');
  //Interface
  Route::get('/interface', 'InterfaceController@index')->name('interface');
  Route::post('/interface/update', 'InterfaceController@update')->name('interface.update');

  //Email Template
  Route::get('/template', 'EtemplateController@index')->name('template');
  Route::post('/template/update', 'EtemplateController@update')->name('template.update');

  //User Management
  Route::get('/users', 'UserlogController@index')->name('users');
  Route::get('/user/translog', 'UserlogController@transLog')->name('users.transactions');
  Route::get('/user/docs', 'UserlogController@userDocs')->name('users.docs');
  Route::post('/user/search', 'UserlogController@userSearch')->name('search.users');
  Route::get('/user/{user}', 'UserlogController@single')->name('user.single');
  Route::get('/user-banned', 'UserlogController@banusers')->name('user.ban');

  Route::get('/mail/{user}', 'UserlogController@email')->name('email');
  Route::post('/sendmail', 'UserlogController@sendemail')->name('send.email');
  Route::put('/doc-verified/{user}', 'UserlogController@documentVerify')->name('user.docver');
  Route::put('/user/pass-change/{user}', 'UserlogController@userPasschange')->name('user.passchange');
  Route::put('/user/balance/{user}', 'UserlogController@blupdate')->name('user.balance');
  Route::put('/user/status/{user}', 'UserlogController@statupdate')->name('user.status');
  Route::get('/broadcast', 'UserlogController@broadcast')->name('broadcast');
  Route::post('/broadcast/email', 'UserlogController@broadcastemail')->name('broadcast.email');

//Payment Gateway
Route::get('/gateway', 'GatewayController@index')->name('gateway.index');
Route::put('/gateway/{gateway}', 'GatewayController@update')->name('gateway.update');

//Deposit
Route::get('/deposits', 'DepositController@index')->name('admin.deposits');


//Withdraw
Route::get('/withdraw', 'WithdrawController@index')->name('withdraw');
Route::get('/withdraw-requests', 'WithdrawController@requests')->name('withdraw.requests');
Route::put('/withdraw-approve/{id}', 'WithdrawController@approve')->name('withdraw.approve');
Route::get('/withdraw/{withdraw}/delete', 'WithdrawController@destroy')->name('withdraw.destroy');


//Coin Wallet
Route::get('/coin-status', 'GeneralController@coinStatus')->name('coin.status');

  //Admin Auth
  Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

});

