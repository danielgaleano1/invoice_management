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
         
         factory(App\country::class, 1)->create()->each(function ($country) {
            factory(App\City::class, 3)->create(['country_id'=>$country->id]);
        });
        factory(App\client::class, 1)->create();
        factory(App\profile::class, 1)->create();
        factory(App\collaborator::class, 1)->create();
        factory(App\invoice_state::class, 1)->create();
        factory(App\product::class, 1)->create();
        
        factory(App\invoice::class, 1)->create()->each(function ($invoice) {
            factory(App\invoice_product::class, 5)->create(['invoice_id'=>$invoice->id]);
        });
        /*
        factory(App\invoice_product::class, 1)->create();
        factory(App\invoice::class, 1)->create();
        */
        factory(App\User::class, 1)->create();
    }
}
