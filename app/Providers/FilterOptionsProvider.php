<?php

namespace App\Providers;

use App\Models\BodyType;
use App\Models\Country;
use App\Models\Make;
use App\Models\Stock;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class FilterOptionsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $filterOptions = [
            'make' => Make::orderBy('name')->get(),
            'model' => Stock::select('model')->orderBy('model')->distinct()->get(),
            'bodytype' => BodyType::select('name')->orderBy('name')->get(),
            'year' => Stock::select('year')->distinct()->orderBy('year', 'ASC')->get(),
            'country' => Country::select('name', 'id')->distinct()->get(),
        ];

        View::composer('*', function ($view) use ($filterOptions) {
            $view->with('filterOptions', $filterOptions);
        });
    }
}
