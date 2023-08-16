<?php

namespace App\Providers;
use App\Models\FAQs;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * 
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        View::composer('inc.admin_sidebar', function ($view) {
            $count = Notification::whereNull('read_at')->count();
            $comment_count = Comment::where('approved', false)->count();
            $view->with(compact('count','comment_count'));
        });
        View::composer('inc.desktop_footer', function ($view) {
            $category_data = Category::select(['id','cat_title'])->get();
            $view->with(compact('category_data'));
        });
        View::composer('pages.faqs', function ($view) {
            $faq_data = FAQs::select(['questions','answers'])->get();
            $view->with(compact('faq_data'));
        });
    }
}
// 
