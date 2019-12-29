<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Client;
use App\City;
use App\Invoice;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index', [
            'client_list' => Client::paginate(10),
            'city_list' => City::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create', [
            'client_list' => Client::all(),
            'invoice_list' => Invoice::all(),
            'city_list' => City::all()
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
            'code' => 'min:3|unique:clients,code',
            'name' => 'min:3',
            'address' => 'min:5',
            'phone' => 'min:3|numeric',
            'email' => 'min:3|email|unique:clients,email'
        ]);

        $client_record = new Client;
        $client_record->city_id = $request->input('city');
        $client_record->code = $request->input('code');
        $client_record->name = $request->input('name');
        $client_record->address = $request->input('address');
        $client_record->phone = $request->input('phone');
        $client_record->email = $request->input('email');
        $client_record->save();

        return redirect()->route('client.index')->withSuccess(__('Client create successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client_list = Client::findOrFail($id);
        return view('client.show', [
            'client_list' => $client_list,
            'invoice_list' => Invoice::all()
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
        $client_list = Client::findOrFail($id);
        return view('client.edit', [
            'client_list' => $client_list,
            'invoice_list' => Invoice::all(),
            'city_list' => City::all()
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
        $client_record = Client::findOrFail($id);

        $validData = $request->validate([
            'code' => [
                'min:3',
                'max:10',
                Rule::unique('clients')->ignore($client_record->id),
            ],
            'name' => 'min:3',
            'address' => 'min:5',
            'phone' => 'min:3|numeric',
            'email' => [
                'email',
                Rule::unique('clients')->ignore($client_record->id),
            ],
        ]);

        $client_record->city_id = $request->input('city');
        $client_record->code = $request->input('code');
        $client_record->name = $request->input('name');
        $client_record->address = $request->input('address');
        $client_record->phone = $request->input('phone');
        $client_record->email = $request->input('email');
        $client_record->save();

        return redirect()->route('client.index')->withSuccess(__('Client update successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         $client_list = Client::findOrFail($id);
         $client_list->delete();
         return redirect()->route('client.index')->withSuccess(__('client deleted successfully'));
     }
}
