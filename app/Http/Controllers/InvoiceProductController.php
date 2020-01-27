<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Collaborator;
use App\Client;
use App\InvoiceProduct;
use App\Product;

class InvoiceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice_products = Product::all();
        return $invoice_products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoice_product.create', [
            'invoice_product_list' => InvoiceProduct::all(),
            'collaborator_list' => Collaborator::all(),
            'client_list' => Client::all(),
            'product_list' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice_list_record = Invoice::findOrFail($request->invoice_id);
        $product_update = Product::findOrFail($request->product_id);

        //$products = DB::select('select * from products where active = ?', [1]);

        $products = DB::table('invoice_products')->where([
            ['product_id', '=', $request->product_id],
            ['invoice_id', '=', $request->invoice_id],
        ])->doesntExist();

        if ($products && $product_update->stock >= $request->input('quantity')) {
            $invoice_product = InvoiceProduct::create($request->all());

            $subtotal = $request->input('price') * $request->input('quantity');

            $invoice_product->update([
                'subtotal' => $subtotal
            ]);

            $invoice_list_record->value_tax += $subtotal / 1.19 * 0.19;
            $invoice_list_record->total_value += $subtotal;
            $invoice_list_record->save();

            $product_update->stock -= $request->input('quantity');
            $product_update->save();

            return back();
        } else {
            return redirect()->route('invoice.show', $invoice_list_record)->withErrors('Quantity not available or the product is already on the invoice. Code of product: ' . $product_update->code);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice_product_list = InvoiceProduct::findOrFail($id);
        $invoice_product_list->delete();

        $invoice_list = $invoice_product_list->invoice_id;
        $invoice_list_record = Invoice::findOrFail($invoice_list);

        $subtotal = $invoice_product_list->price * $invoice_product_list->quantity;

        $invoice_list_record->value_tax -= $subtotal / 1.19 * 0.19;
        $invoice_list_record->total_value -= $subtotal;
        $invoice_list_record->save();

        $product_list = $invoice_product_list->product_id;
        $product_update = Product::findOrFail($product_list);
        $product_update->stock += $invoice_product_list->quantity;
        $product_update->save();

        return redirect()->route('invoice.show', $invoice_list)->withSuccess(__('Invoice Product deleted successfully'));
    }
}
