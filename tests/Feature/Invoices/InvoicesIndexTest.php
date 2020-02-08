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

    /** @test */
    public function guest_users_cannot_list_invoices()
    {
        $this->get(route('invoice.index'))->assertRedirect(route('login'));
    }

    /** @test */
    public function logged_in_users_can_list_customers()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('invoice.index'));

        $response->assertSuccessful();
        $response->assertViewIs('invoice.index');
    }

    /** @test */

    public function index_of_invoices_has_content()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('invoice.index'));

        $response->assertSee('Invoices');
    }

    /** @test */
    public function invoice_information_displayed_on_index()
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

    /** @test */
    public function unauthenticated_user_cannot_create_a_invoice()
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

    /** @test */
    public function a_invoice_can_be_created()
    {
        $this->withoutExceptionHandling();

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
            'code' => '000000001',
            'expiration_at' => '3000-01-01',
        ])        
        ->assertRedirect()
        ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('invoices', [
            'code' => '000000002',
            'expiration_at' => '3000-01-01',
        ]);
    }

/*
    public function testUnauthenticatedUserCannotUpdateACollaborator()
    {
        $collaborator = factory(Collaborator::class)->create();

        $this->put(route('collaborators.update', $collaborator), [
            'name' => 'Test Collaborator Name',
            'email' => 'test@email.com',
            'city' => $collaborator->city_id,
            'role' => $collaborator->role_id,
        ])
        ->assertRedirect(route('login'));

        $this->assertDatabaseHas('collaborators', [
            'name' => $collaborator->name,
            'email' => $collaborator->email,
        ]);
    }

/*
    public function testACollaboratorCanBeUpdated()
    {
        $user = factory(User::class)->create();
        $collaborator = factory(Collaborator::class)->create();

        $this->actingAs($user)->put(route('collaborators.update', $collaborator), [
            'name' => 'Test Collaborator Name',
            'email' => 'test@email.com',
            'city' => $collaborator->city_id,
            'role' => $collaborator->role_id,
        ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('collaborators', [
            'name' => 'Test Collaborator Name',
            'email' => 'test@email.com',
        ]);
    }

/*
    public function testUnauthenticatedUserCannotDeleteACollaborator()
    {
        $collaborator = factory(Collaborator::class)->create();

        $this->delete(route('collaborators.destroy', $collaborator))
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('collaborators', [
            'name' => $collaborator->name,
            'email' => $collaborator->email,
        ]);
    }

/*
    public function testACollaboratorCanBeDeleted()
    {
        $user = factory(User::class)->create();
        $collaborator = factory(Collaborator::class)->create();

        $this->actingAs($user)->delete(route('collaborators.destroy', $collaborator))
            ->assertRedirect(route('collaborators.index'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('collaborators', [
           'name' => $collaborator->name,
            'email' => $collaborator->email,
        ]);
    }

/*
    public function testCanBeDetailsOfACollaborator()
    {
        $user = factory(User::class)->create();
        $collaborator = factory(Collaborator::class)->create();

        $response = $this->actingAs($user)->get(route('collaborators.show', $collaborator));

        $response->assertSuccessful();
        $response->assertSeeText($collaborator->name);
        $response->assertSeeText($collaborator->email);
        $response->assertSeeText($collaborator->city->name);
        $response->assertSeeText($collaborator->role->name);
    }

    */
}
