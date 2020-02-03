<?php

namespace Tests\Feature\Invoices;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class InvoicesIndexTest extends TestCase
{
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
    }
}
