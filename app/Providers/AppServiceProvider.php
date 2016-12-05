<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DocName;
use App\DocPage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials._docNav', function($view)
        {   
            $doc_names = DocName::all();
            $doc_pages = DocPage::all();
            $view->with('doc_names', $doc_names)->with('doc_pages',$doc_pages);
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
