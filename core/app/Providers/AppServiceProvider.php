<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\General;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //General
      $gnl = General::first();
       if($gnl == null)
       {
           $default = [
               'title' => 'THESOFTKING',
               'subtitle' => 'Subtitle',
               'startdate' => '2017-12-29',
               'color' => '009933',
               'cur' => 'BDT',
               'cursym' => 'TK',
               'decimal' => '2',
               'reg' => '1',
               'emailver' => '0',
               'smsver' => '1',
               'emailnotf' => '0',
               'smsnotf' => '1'
           ];
           General::create($default);
           $gnl = General::first();
       }
       view()->share('gnl',  $gnl);

        $all = file_get_contents("https://blockchain.info/ticker");
        $res = json_decode($all);
        $btcrate = $res->USD->last;
        //$btcrate = 0000;
       view()->share('btcrate',  $btcrate);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
