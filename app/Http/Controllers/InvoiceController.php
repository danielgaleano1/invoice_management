<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Invoice;
use App\Collaborator;
use App\Client;
use App\InvoiceState;
use App\InvoiceProduct;
use App\Product;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoice.index', [
            'invoice_list' => Invoice::paginate(10),
            'collaborator_list' => Collaborator::all(),
            'invoice_state_list' => InvoiceState::all(),
            'client_list' => Client::all(),
            'product_list' => Product::all()
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
            'invoice_list' => Invoice::all(),
            'collaborator_list' => Collaborator::all(),
            'invoice_state_list' => InvoiceState::all(),
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
        $validData = $request->validate([
            'code' => 'min:3|unique:invoices,code',
            'expiration_at' => 'date',
        ]);

        Invoice::create($request->all());
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
        $invoice_list = Invoice::findOrFail($id);
        return view('invoice.show', [
            'invoice_list' => $invoice_list,
            'invoice_product_list' => InvoiceProduct::all(),
            'product_list' => Product::all(),
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
        $invoice_list = Invoice::findOrFail($id);
        return view('invoice.edit', [
            'invoice_list' => $invoice_list,
            'collaborator_list' => Collaborator::all(),
            'client_list' => Client::all(),
            'invoice_state_list' => InvoiceState::all(),
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
        $invoice_list = Invoice::findOrFail($id);
        
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
        $invoice_list->expiration_at = $request->input('expiration_at');
        $invoice_list->date_of_receipt = $request->input('date_of_receipt');
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
        $invoice_list = Invoice::findOrFail($id);
        $invoice_list->delete();
        return redirect()->route('invoice.index')->withSuccess(__('Invoice deleted successfully'));
    }
}
