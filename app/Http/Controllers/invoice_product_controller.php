<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //dd($product_lists->id);
        invoice_product::create($request->all());
        /*$invoice_product_record = new invoice_product;
        $invoice_product_record->product_id = $request->$product_lists->id;
        $invoice_product_record->invoice_id = $request->$invoice_list->id;
        $invoice_product_record->quantity = $request->input('quantity');
        $invoice_product_record->price = $request->input('price');
        $invoice_product_record->save();

        return redirect()->route('invoice.show', $invoice_list)->withSuccess(__('Invoice Product deleted successfully'));
        */

        $invoice_list_record = invoice::findOrFail($request->invoice_id);
        
        $invoice_list_record->value_tax = $invoice_list_record->value_tax + ($request->input('price') * 0.19);
        $invoice_list_record->total_value = $invoice_list_record->total_value + $request->input('price');

        $invoice_list_record->save();

        return back();
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
        $invoice_product_list = invoice_product::findOrFail($id);
        $invoice_list = $invoice_product_list->invoice_id;
        $invoice_product_list->delete();
        return redirect()->route('invoice.show', $invoice_list)->withSuccess(__('Invoice Product deleted successfully'));
    }
}
