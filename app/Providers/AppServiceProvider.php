<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\Food;
use App\Models\Review;
use Carbon\Carbon;

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

        view()->composer(['admin.layouts.master'], function($view){
            $pendingEventCount = count(Order::where('status', config('setup.pending'))->get());
                if ($pendingEventCount) {
                    $view->with('pendingEventCount', $pendingEventCount);
                }
        });

        view()->composer(['admin.index'], function($view){
            $userCount = User::count();
                if ($userCount) {
                    $view->with('userCount', $userCount);
                }
        });

        view()->composer(['admin.index'], function($view){
            $foodCount = Food::count();
                if ($foodCount) {
                    $view->with('foodCount', $foodCount);
                }
        });

        view()->composer(['admin.index'], function($view){
            $orderCount = Carbon::now();
            $orderCount = Order::count();
                if ($orderCount) {
                    $view->with('orderCount', $orderCount);
                }
        });

        view()->composer(['admin.index'], function($view){
            $reviewCount = Carbon::now();
            $reviewCount = Review::count();
                if ($reviewCount) {
                    $view->with('reviewCount', $reviewCount);
                }
        });    

        view()->composer(['admin.layouts.master'], function($view){
            $orderTime = Order::where('status', config('setup.pending'))->get();

            if ($orderTime) {

                $view->with('orderTime', $orderTime);
            }
        });
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
