<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\invoice;
use App\collaborator;
use App\client;
use App\invoice_product;
use App\product;

class invoice_product_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoice_product.index', [
            'invoice_product_list' => invoice_product::all(),
            'invoice_list' => invoice::all(),
            'collaborator_list' => collaborator::all(),
            'client_list' => client::all(),
            'product_list' => product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoice_product.create', [
            'invoice_product_list' => invoice_product::all(),
            'collaborator_list' => collaborator::all(),
            'client_list' => client::all(),
            'product_list' => product::all()
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
        
        $invoice_list_record = invoice::findOrFail($request->invoice_id);
        $product_update = product::findOrFail($request->product_id);

        if ($product_update->stock > $request->input('quantity')){
            
            invoice_product::create($request->all());
            
            $invoice_list_record->value_tax = $invoice_list_record->value_tax + ($request->input('price') * $request->input('quantity') * 0.19);
            $invoice_list_record->total_value = $invoice_list_record->total_value + ($request->input('price') * $request->input('quantity'));
            $invoice_list_record->save();

            $product_update->stock = $product_update->stock - $request->input('quantity');
            $product_update->save();

            return back();
        }
        else{
            return redirect()->route('invoice.show', $invoice_list_record)->with('message', 'Quantity not available');
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
        $product_id_modal = product::findOrFail($id);
        $product_price = $product_id_modal->price;
        $product_stock = $product_id_modal->stock;
        return response()->json(['price' => $product_price, 'stock' => $product_stock]);
        
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

        $invoice_product_list = invoice_product::findOrFail($id);
        $invoice_product_list->delete();

        $invoice_list = $invoice_product_list->invoice_id;
        $invoice_list_record = invoice::findOrFail($invoice_list);
        $invoice_list_record->value_tax = $invoice_list_record->value_tax - ($invoice_product_list->price * $invoice_product_list->quantity * 0.19);
        $invoice_list_record->total_value = $invoice_list_record->total_value - ($invoice_product_list->price * $invoice_product_list->quantity);
        $invoice_list_record->save();

        $product_list = $invoice_product_list->product_id;
        $product_update = product::findOrFail($product_list);
        $product_update->stock = $product_update->stock + $invoice_product_list->quantity;
        $product_update->save();

        return redirect()->route('invoice.show', $invoice_list)->withSuccess(__('Invoice Product deleted successfully'));
    }
}
