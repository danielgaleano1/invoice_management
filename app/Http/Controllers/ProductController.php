<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\invoice;
use App\Collaborator;
use App\Client;
use App\invoice_state;
use App\InvoiceProduct;
use App\product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index', [
            'product_list' => product::paginate(10),
            'invoice_list' => invoice::all(),
            'collaborator_list' => Collaborator::all(),
            'invoice_state_list' => invoice_state::all(),
            'client_list' => Client::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create', [
            'product_list' => product::all(),
            'invoice_list' => invoice::all(),
            'collaborator_list' => Collaborator::all(),
            'invoice_state_list' => invoice_state::all(),
            'client_list' => Client::all()
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
            'code' => 'min:3|max:10|unique:products,code',
            'description' => 'min:3|max:100',
            'stock' => 'min:1|numeric',
            'price' => 'min:1|numeric'
        ]);

        $product_record = new product;
        $product_record->code = $request->input('code');
        $product_record->description = $request->input('description');
        $product_record->stock = $request->input('stock');
        $product_record->price = $request->input('price');
        $product_record->save();

        return redirect()->route('product.index')->withSuccess(__('Product create successfully!'));
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
        $product_list = product::findOrFail($id);
        return view('product.edit', [
            'product_list' => $product_list,
            'invoice_list' => invoice::all(),
            'collaborator_list' => Collaborator::all(),
            'invoice_state_list' => invoice_state::all(),
            'client_list' => Client::all()
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
        $product_record = product::findOrFail($id);

        $validData = $request->validate([
            'code' => [
                'min:3',
                'max:10',
                Rule::unique('products')->ignore($product_record->id),
            ],
            'description' => 'min:3|max:100',
            'stock' => 'min:1|numeric',
            'price' => 'min:1|numeric'
        ]);

        $product_record->code = $request->input('code');
        $product_record->description = $request->input('description');
        $product_record->stock = $request->input('stock');
        $product_record->price = $request->input('price');
        $product_record->save();

        return redirect()->route('product.index')->withSuccess(__('Product create successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_list = product::findOrFail($id);
        $product_list->delete();
        return redirect()->route('product.index')->withSuccess(__('Product deleted successfully'));
    }
}
