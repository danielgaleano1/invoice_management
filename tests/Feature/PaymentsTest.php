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
}
