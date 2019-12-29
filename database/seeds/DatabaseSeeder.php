<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(country_factory::class);
         
         factory(App\Country::class, 1)->create()->each(function ($country) {
            factory(App\City::class, 3)->create(['country_id'=>$country->id]);
        });
        factory(App\Client::class, 1)->create();
        factory(App\profile::class, 1)->create();
        factory(App\Collaborator::class, 1)->create();
        factory(App\InvoiceState::class, 1)->create();
        factory(App\Product::class, 1)->create();
        
        factory(App\Invoice::class, 1)->create()->each(function ($invoice) {
            factory(App\InvoiceProduct::class, 5)->create(['invoice_id'=>$Invoice->id]);
        });
        /*
        factory(App\InvoiceProduct::class, 1)->create();
        factory(App\Invoice::class, 1)->create();
        */
        factory(App\User::class, 1)->create();
    }
}
