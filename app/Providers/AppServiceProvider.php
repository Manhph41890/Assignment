<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\News;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Chia sẻ dữ liệu categories với tất cả các view sử dụng client.layouts.master
        View::composer('client.layouts.master', function ($view) {
            $categories = Category::all(); // Lấy tất cả các mục từ bảng categories
            $view->with('categories', $categories);
        });
        View::composer('client.layouts.master_ls', function ($view) {
            $categories = Category::all(); // Lấy tất cả các mục từ bảng categories
            $view->with('categories', $categories);
        });
        View::composer('client.layouts.master', function ($view) {
            $latestNews = News::orderBy('published_date', 'desc')->take(5)->get();
            $view->with('latestNews', $latestNews);
        });
    }
}