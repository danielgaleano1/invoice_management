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
        factory(DocumentType::class, 1)->create();
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
