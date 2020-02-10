<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Invoice;
use App\Client;
use App\DocumentType;
use App\Country;
use App\City;

class ClientsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_users_cannot_list_clients()
    {
        $this->get(route('client.index'))->assertRedirect(route('login'));
    }

    public function test_logged_in_users_can_list_customers()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('client.index'));

        $response->assertSuccessful();
        $response->assertViewIs('client.index');
    }

    public function test_index_of_clients_has_content()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('client.index'));

        $response->assertSee('Clients');
    }

    public function test_client_information_displayed_on_index()
    {
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create();

        $response = $this->actingAs($user)->get(route('client.index'));

        $response->assertSee($client->code);
        $response->assertSee($client->fullName);
    }

   public function test_unauthenticated_user_cannot_create_a_client()
    {
        $document_type = factory(DocumentType::class)->create();
        $country = factory(Country::class)->create();
        $city = factory(City::class)->create();

        $this->post(route('client.store'), [
        	'city_id' => $city->id,
	        'document_type_id' => $document_type->id,
        	'code' => 14000000,
	        'name' => 'Daniel',
        	'surname' => 'Galeano',
	        'address' => 'calle 61 # 56-51',
        	'phone' => '3104046617',
	        'email' => 'daniel.rgo.13@gmail.com',
        ])
            ->assertRedirect(route('login'));

        $this->assertDatabaseMissing('clients', [
		'code' => 14000000,
	        'name' => 'Daniel',
        	'surname' => 'Galeano',
	        'address' => 'calle 61 # 56-51',
        	'phone' => '3104046617',
	        'email' => 'daniel.rgo.13@gmail.com',
        ]);
    }

   public function test_a_client_can_be_created()
    {
        $user = factory(User::class)->create();
        $document_type = factory(DocumentType::class)->create();
        $country = factory(Country::class)->create();
        $city = factory(City::class)->create();

        $this->actingAs($user)->post(route('client.store'), [
        	'city_id' => $city->id,
	        'document_type_id' => $document_type->id,
        	'code' => 14000000,
	        'name' => 'Daniel',
        	'surname' => 'Galeano',
	        'address' => 'calle 61 # 56-51',
        	'phone' => '3104046617',
	        'email' => 'daniel.rgo.13@gmail.com',
        ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('clients', [
            'code' => 14000000,
            'name' => 'Daniel',
        	'surname' => 'Galeano',
	        'address' => 'calle 61 # 56-51',
        	'phone' => '3104046617',
	        'email' => 'daniel.rgo.13@gmail.com',
        ]);
    }

   public function test_unauthenticated_user_cannot_update_a_client()
    {
        $document_type = factory(DocumentType::class)->create();
        $city = factory(City::class)->create();
	    $client = factory(Client::class)->create();

        $this->put(route('client.update', $client), [
        	'city_id' => $city->id,
	        'document_type_id' => $document_type->id,
        	'code' => 14000000,
	        'name' => 'Daniel',
        	'surname' => 'Galeano',
	        'address' => 'calle 61 # 56-51',
        	'phone' => '3104046617',
	        'email' => 'daniel.rgo.13@gmail.com',
        ])
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('clients', [
		'code' => $client->code,
	        'name' => $client->name,
        	'surname' => $client->surname,
	        'address' => $client->address,
        	'phone' => $client->phone,
	        'email' => $client->email,
        ]);
    }

   public function test_a_client_can_be_updated()
    {
        $this->withoutExceptionHandling();
        
        $user = factory(User::class)->create();
        $document_type = factory(DocumentType::class)->create();
        $city = factory(City::class)->create();
        $client = factory(Client::class)->create();
    
        $this->actingAs($user)->put(route('client.update', $client), [
            'city_id' => $city->id,
            'document_type_id' => $document_type->id,
            'code' => 14000000,
            'name' => 'Daniel',
            'surname' => 'Galeano',
            'address' => 'calle 61 # 56-51',
            'phone' => '3104046617',
            'email' => 'daniel.rgo.13@gmail.com',
        ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('clients', [
            'code' => 14000000,
            'name' => 'Daniel',
            'surname' => 'Galeano',
            'address' => 'calle 61 # 56-51',
            'phone' => '3104046617',
            'email' => 'daniel.rgo.13@gmail.com',
        ]);
    }

    public function test_unauthenticated_user_cannot_delete_a_client()
    {
        $client = factory(Client::class)->create();

        $this->delete(route('client.destroy', $client))
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('clients', [
        	'code' => $client->code,
	        'name' => $client->name,
        	'surname' => $client->surname,
	        'address' => $client->address,
        	'phone' => $client->phone,
	        'email' => $client->email,
        ]);
    }

    public function test_a_client_can_be_deleted()
    {
	$user = factory(User::class)->create();
        $client = factory(Client::class)->create();

        $this->actingAs($user)->delete(route('client.destroy', $client))
            ->assertRedirect(route('client.index'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('clients', [
        	'code' => $client->code,
	        'name' => $client->name,
        	'surname' => $client->surname,
	        'address' => $client->address,
        	'phone' => $client->phone,
	        'email' => $client->email,
        ]);
    }

    public function test_can_be_detailsOf_a_client()
    {
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create();

        $response = $this->actingAs($user)->get(route('client.show', $client));

        $response->assertSuccessful();
        
        //$this->assertIsInt
        $response->assertSeeText($client->code);
        $response->assertSeeText($client->fullNname);
        $response->assertSeeText($client->address);
        $response->assertSeeText($client->phone);
        $response->assertSeeText($client->email);
        $response->assertSeeText($client->city->name);
        $response->assertSeeText($client->document_type->name);
    }
}
