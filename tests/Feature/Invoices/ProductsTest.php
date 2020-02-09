<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Product;

class ProductsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_users_cannot_list_products()
    {
        $this->get(route('product.index'))->assertRedirect(route('login'));
    }

    public function test_logged_in_users_can_list_customers()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('product.index'));

        $response->assertSuccessful();
        $response->assertViewIs('product.index');
    }

    public function test_index_of_products_has_content()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('product.index'));

        $response->assertSee('products');
    }

    public function test_product_information_displayed_on_index()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

        $response = $this->actingAs($user)->get(route('product.index'));

        $this->assertIsInt($product->code);
        $response->assertSee($product->description);
        $this->assertIsInt($product->stock);
        $this->assertIsInt($product->price);
    }

   public function test_unauthenticated_user_cannot_create_a_product()
    {
        $this->post(route('product.store'), [
        	'code' => 14,
	        'description' => 'Celular',
        	'stock' => 5,
	        'price' => 100,
        ])
            ->assertRedirect(route('login'));

        $this->assertDatabaseMissing('products', [
        	'code' => 14,
	        'description' => 'Celular',
        	'stock' => 5,
	        'price' => 100,
        ]);
    }

   public function test_a_product_can_be_created()
    {
	    $user = factory(User::class)->create();

        $this->actingAs($user)->post(route('product.store'), [
        	'code' => 140,
	        'description' => 'Celular',
        	'stock' => 5,
	        'price' => 100,
        ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('products', [
        	'code' => 140,
	        'description' => 'Celular',
        	'stock' => 5,
	        'price' => 100,
        ]);
    }

   public function test_unauthenticated_user_cannot_update_a_product()
    {
	    $product = factory(Product::class)->create();

        $this->put(route('product.update', $product), [
        	'code' => 140,
	        'description' => 'Celular',
        	'stock' => 5,
	        'price' => 100,
        ])
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('products', [
        	'code' => $product->code,
	        'description' => $product->description,
        	'stock' => $product->stock,
	        'price' => $product->price,
        ]);
    }

   public function test_a_product_can_be_updated()
    {
        $user = factory(User::class)->create();
	    $product = factory(Product::class)->create();

        $this->actingAs($user)->put(route('product.update', $product), [
        	'code' => 140,
	        'description' => 'Celular',
        	'stock' => 5,
	        'price' => 100,
        ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('products', [
        	'code' => 140,
	        'description' => 'Celular',
        	'stock' => 5,
	        'price' => 100,
        ]);
    }

    public function test_unauthenticated_user_cannot_delete_a_product()
    {
        $product = factory(Product::class)->create();

        $this->delete(route('product.destroy', $product))
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('products', [
        	'code' => $product->code,
	        'description' => $product->description,
        	'stock' => $product->stock,
	        'price' => $product->price,
        ]);
    }

    public function test_a_product_can_be_deleted()
    {
	    $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

        $this->actingAs($user)->delete(route('product.destroy', $product))
            ->assertRedirect(route('product.index'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('products', [
        	'code' => $product->code,
	        'description' => $product->description,
        	'stock' => $product->stock,
	        'price' => $product->price,
        ]);
    }
}
