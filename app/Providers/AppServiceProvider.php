<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\loaitour;
use App\noiden;
use App\dongtour;
use App\user;
use App\tour;
use App\hoadon;
use App\slide;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    function boot()
    {
        Schema::defaultStringLength(191);
        $loaitour = loaitour::all();
        $noiden = noiden::all();
        $dongtour = dongtour::all();
        $tour = tour::all();        
        $user = user::all();
        $hoadon = hoadon::all();
        $slide = slide::all();
        view()->share(['loaitour' => $loaitour,'noiden'=>$noiden,'dongtour' => $dongtour,'user'=>$user,'tour' => $tour,'hoadon'=>$hoadon,'slide'=>$slide]); 
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


