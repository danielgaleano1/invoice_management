<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoice;
use App\collaborator;
use App\client;
use App\invoice_state;
use App\invoice_product;
use App\product;

class invoice_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('invoice.index', [
            'invoice_list' => invoice::paginate(10),
            'collaborator_list' => collaborator::all(),
            'invoice_state_list' => invoice_state::all(),
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
        return view('invoice.create', [
            'invoice_list' => invoice::all(),
            'collaborator_list' => collaborator::all(),
            'invoice_state_list' => invoice_state::all(),
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
        $validData = $request->validate([
            'code' => 'min:3|unique:invoices,code',
            'expiration_at' => 'date',
        ]);

        invoice::create($request->all());
        return redirect()->route('invoice.index')->withSuccess(__('Invoice create successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice_list = invoice::findOrFail($id);
        return view('invoice.show', [
            'invoice_list' => $invoice_list,
            'invoice_product_list' => invoice_product::paginate(5),
            'product_list' => product::all(),
        ]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice_list = invoice::findOrFail($id);
        return view('invoice.edit', [
            'invoice_list' => $invoice_list,
            'collaborator_list' => collaborator::all(),
            'client_list' => client::all(),
            'invoice_state_list' => invoice_state::all(),
        ]);
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
        $invoice_list = invoice::findOrFail($id);
        
        $validData = $request->validate([
            'code' => 'min:3|unique:invoices,code',
            'code' => [
                'min:3',
                'max:10',
                Rule::unique('invoices')->ignore($invoice_list->id),
            ],
            'expiration_at' => 'date',
        ]);

        $invoice_list->collaborator_id = $request->input('collaborator');
        $invoice_list->client_id = $request->input('client');
        $invoice_list->invoice_state_id = $request->input('invoice_state');
        $invoice_list->code = $request->input('code');
        $invoice_list->expiration_at = $request->input('expiration_at');
        $invoice_list->value_tax = $request->input('value_tax');
        $invoice_list->total_value = $request->input('total_value');
        $invoice_list->save();

        return redirect()->route('invoice.index')->withSuccess(__('Invoice updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice_list = invoice::findOrFail($id);
        $invoice_list->delete();
        return redirect()->route('invoice.index')->withSuccess(__('Invoice deleted successfully'));
    }
}
