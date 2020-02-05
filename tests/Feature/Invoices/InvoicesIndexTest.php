<?php

namespace Tests\Feature\Invoices;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Invoice;

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
}
