<?php

namespace App\Http\View\Composers;

use App\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CachedClientsList 
{
    private $client;
    
    public function __construct(Client $client)
    {
        // Dependencies automatically resolved by service container...
        $this->client = $client;
    }

    public function compose(View $view)
    {
        $view->with('clients', Cache::remember('client.enable', 600, function () {
            return $this->client->all();
        }));
    }
}
