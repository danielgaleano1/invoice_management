<?php

namespace App\Http\View\Composers;

use App\City;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CachedCitiesList 
{
    private $city;
    
    public function __construct(City $city)
    {
        // Dependencies automatically resolved by service container...
        $this->city = $city;
    }

    public function compose(View $view)
    {
        $view->with('cities', Cache::remember('cities.enable', 600, function () {
            return $this->city->all();
        }));
    }
}
