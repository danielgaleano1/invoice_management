<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Client;
use App\City;
use App\DocumentType;
use App\Invoice;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
        $data_to_search = $request->get('search');
        $clients = Client::searchs($data_to_search)->paginate(5);

        return view('client.index', [
            'client_list' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client_list = new Client;

        return response()->view('client.create', compact('client_list'));
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
        $client_record->city_id = $request->input('city_id');
        $client_record->document_type_id = $request->input('document_type_id');
        $client_record->code = $request->input('code');
        $client_record->name = $request->input('name');
        $client_record->surname = $request->input('surname');
        $client_record->address = $request->input('address');
        $client_record->phone = $request->input('phone');
        $client_record->email = $request->input('email');
        $client_record->save();
        //$client_record = Client::create($request->all());

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
            'client_list' => $client_list
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
        $client = Client::findOrFail($id);

        $validData = $request->validate([
            'code' => [
                'min:3',
                'max:10',
                Rule::unique('clients')->ignore($client->id),
            ],
            'name' => 'min:3',
            'surname' => 'min:3',
            'address' => 'min:5',
            'phone' => 'min:3|numeric',
            'email' => [
                'email',
                Rule::unique('clients')->ignore($client->id),
            ],
        ]);

        $client->update([
            'city' => $request->input('city'),
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email')
        ]);

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
