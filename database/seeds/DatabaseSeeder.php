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
         
         //factory(App\country::class, 3)->create()->each(function ($country) {
        //    factory(App\city::class, 2)->create(['country_id'=>$country->id]);
        //});
        factory(App\country::class, 3)->create();
        factory(App\city::class, 2)->create();
        factory(App\client::class, 2)->create();
    }
}
