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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
        $data_to_search = $request->get('search');
        $products = Product::searchs($data_to_search)->paginate(5);

        return view('product.index', [
            'product_list' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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

        $product_record = Product::create($request->all());

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
        $product_list = Product::findOrFail($id);
        return view('product.edit', [
            'product_list' => $product_list
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
        $product_record = Product::findOrFail($id);

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
        $product_list = Product::findOrFail($id);
        $product_list->delete();
        return redirect()->route('product.index')->withSuccess(__('Product deleted successfully'));
    }
}
