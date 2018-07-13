<?php 
    
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer(['layouts.elements.menu', 'layouts.category', 'layouts.search', 'layouts.index'], 'App\Http\ViewComposers\MenuComposer');
    }

    public function register()
    {
        
    }
}
