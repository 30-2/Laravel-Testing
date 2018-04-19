<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //parent::boot();
       // static::creating(function($model)
       // {
       //         $model->created_by = Auth::user()->id;
      //  });
      Validator::extend('strength', 'App\Http\CustomValidator@validateStrength');
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
