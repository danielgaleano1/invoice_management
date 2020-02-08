<?php

namespace Tests\Feature\Invoices;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Country;
use App\DocumentType;
use App\Profile;
use App\City;
use App\Collaborator;
use App\Client;
use App\InvoiceState;
use App\User;
use App\Invoice;

class InvoicesIndexTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_users_cannot_list_invoices()
    {
        $this->get(route('invoice.index'))->assertRedirect(route('login'));
    }

    public function test_logged_in_users_can_list_customers()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('invoice.index'));

        $response->assertSuccessful();
        $response->assertViewIs('invoice.index');
    }

    public function test_index_of_invoices_has_content()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('invoice.index'));

        $response->assertSee('Invoices');
    }

    public function test_invoice_information_displayed_on_index()
    {
        $user = factory(User::class)->create();
        $country = factory(Country::class)->create();
        $document_type = factory(DocumentType::class)->create();
        $profile = factory(Profile::class)->create();
        $city = factory(City::class)->create();
        $collaborator = factory(Collaborator::class)->create();
        $client = factory(Client::class)->create();
        $invoice_state = factory(InvoiceState::class)->create();
        $invoice = factory(Invoice::class)->create();

        $response = $this->actingAs($user)->get(route('invoice.index'));

        $response->assertSee($invoice->code);
        $response->assertSee($invoice->collaborator_id);
        $response->assertSee($invoice->invoice_state_id);
        $response->assertSee($invoice->client_id);
        //$response->assertSee($invoice->expiration_at);
        //$response->assertSee($invoice->date_of_receipt);
        $this->assertIsInt($invoice->value_tax);
        $this->assertIsInt($invoice->total_value);
        //$response->assertSee($invoice->date_of_receipt);
    }

    public function test_unauthenticated_user_cannot_create_a_invoice()
    {
        $country = factory(Country::class)->create();
        $document_type = factory(DocumentType::class)->create();
        $profile = factory(Profile::class)->create();
        $city = factory(City::class)->create();
        $collaborator = factory(Collaborator::class)->create();
        $client = factory(Client::class)->create();
        $invoice_state = factory(InvoiceState::class)->create();

        $this->post(route('invoice.store'), [
            'collaborator_id' => $collaborator->id,
            'client_id' => $client->id,
            'code' => '000000001',
            'expiration_at' => '3000-01-01',
        ])->assertRedirect(route('login'));

        $this->assertDatabaseMissing('invoices', [
            'code' => '000000001',
            'expiration_at' => '3000-01-01',
        ]);
    }

    public function test_a_invoice_can_be_created()
    {
        $user = factory(User::class)->create();
        $country = factory(Country::class)->create();
        $document_type = factory(DocumentType::class)->create();
        $profile = factory(Profile::class)->create();
        $city = factory(City::class)->create();
        $collaborator = factory(Collaborator::class)->create();
        $client = factory(Client::class)->create();
        $invoice_state = factory(InvoiceState::class)->create();

        $this->actingAs($user)->post(route('invoice.store'), [
            'collaborator_id' => $collaborator->id,
            'client_id' => $client->id,
            'code' => '000000002',
            'expiration_at' => '3000-01-01',
        ])        
        ->assertRedirect()
        ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('invoices', [
            'code' => '000000002',
            'expiration_at' => '3000-01-01',
        ]);
    }

   public function test_unauthenticated_user_cannot_update_a_invoice()
    {
        $country = factory(Country::class)->create();
        $document_type = factory(DocumentType::class)->create();
        $profile = factory(Profile::class)->create();
        $city = factory(City::class)->create();
        $collaborator = factory(Collaborator::class)->create();
        $client = factory(Client::class)->create();
        $invoice_state = factory(InvoiceState::class)->create();
	    $invoice = factory(Invoice::class)->create();

        $this->put(route('invoice.update', $invoice), [
            'collaborator_id' => $invoice->collaborator_id,
            'client_id' => $invoice->client_id,
            'code' => '000000001',
            'expiration_at' => '3000-01-01',
        ])
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('invoices', [
            'code' => $invoice->code,
            //'expiration_at' => $invoice->expiration_at,
        ]);
    }

   public function test_a_invoice_can_be_updated()
    {
        $user = factory(User::class)->create();
        $invoice = factory(Invoice::class)->create();

        $this->actingAs($user)->put(route('invoice.update', $invoice), [
            'collaborator_id' => $invoice->collaborator_id,
            'client_id' => $invoice->client_id,
            'expiration_at' => '4000-01-01',
        ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('invoices', [
            'expiration_at' => '4000-01-01',
        ]);
    }

    public function test_unauthenticated_user_cannot_delete_a_invoice()
    {
        $invoice = factory(Invoice::class)->create();

        $this->delete(route('invoice.destroy', $invoice))
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('invoices', [
            'code' => $invoice->code,
        ]);
    }

    public function test_a_invoice_can_be_deleted()
    {
	$user = factory(User::class)->create();
        $invoice = factory(invoice::class)->create();

        $this->actingAs($user)->delete(route('invoice.destroy', $invoice))
            ->assertRedirect(route('invoice.index'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('invoices', [
            'code' => $invoice->code,
        ]);
    }

    public function test_can_be_detailsOf_a_invoice()
    {
        $user = factory(User::class)->create();
        $country = factory(Country::class)->create();
        $document_type = factory(DocumentType::class)->create();
        $profile = factory(Profile::class)->create();
        $city = factory(City::class)->create();
        $collaborator = factory(Collaborator::class)->create();
        $client = factory(Client::class)->create();
        $invoice_state = factory(InvoiceState::class)->create();
        $invoice = factory(Invoice::class)->create();

        $response = $this->actingAs($user)->get(route('invoice.show', $invoice));

        $response->assertSuccessful();

        $response->assertSee($invoice->code);
        $response->assertSee($invoice->Collaborator->name);
        $response->assertSee($invoice->InvoiceState->type);
        $response->assertSee($invoice->client->fullName);
        //$response->assertSee($invoice->expiration_at);
        //$response->assertSee($invoice->date_of_receipt);
        $this->assertIsInt($invoice->value_tax);
        $this->assertIsInt($invoice->total_value);
        //$response->assertSee($invoice->date_of_receipt);

    }

///////////////////////////////////
/*
//Test para carga masiva, importación de facturas

*/


///////////////////////////////////
/*
//Test para buscar, filtrar y paginar las facturas

*/

}