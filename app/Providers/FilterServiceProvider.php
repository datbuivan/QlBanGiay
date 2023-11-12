<?php

namespace App\Providers;

use App\Models\Color;
use App\Models\Gender;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $sort = [
            'Mặc định',
            'Phổ biến',
            'Đánh giá trung bình',
            'Mới nhất',
            'Giá: tăng dần',
            'Giá: giảm dần',
        ];
        
        $prices = [
            'Tất cả',
            '0 - 250000',
            '250000 - 500000',
            '500000 - 1000000',
            '1000000 - 200000',
            '2000000'
        ];

        $colors = Color::all();
        $genders = Gender::all();
        view()->share('colors', $colors);
        view()->share('prices', $prices);
        view()->share('sort', $sort);
        view()->share('genders', $genders);
    }
}