<?php

use App\Country;
use App\City;
use App\DocumentType;
use App\Client;
use App\Profile;
use App\Collaborator;
use App\InvoiceState;
use App\Product;
use App\Invoice;
use App\InvoiceProduct;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Country::class, 1)->create()->each(function ($country) {
            factory(City::class, 3)->create(['country_id'=>$country->id]);
        });
        DB::table('document_types')->insert(['code' => 'CC', 'name' => 'Cédula de ciudadania']);
        factory(Client::class, 1)->create();
        factory(Profile::class, 1)->create();
        factory(Collaborator::class, 1)->create();
        factory(InvoiceState::class, 1)->create();
        factory(Product::class, 1)->create();
        factory(Invoice::class, 1)->create()->each(function ($invoice) {
            factory(InvoiceProduct::class, 5)->create(['invoice_id'=>$invoice->id]);
        });
        factory(User::class, 1)->create();
    }
}
