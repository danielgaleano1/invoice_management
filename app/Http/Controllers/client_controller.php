<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;
use App\city;
use App\invoice;

class client_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index', [
            'client_list' => client::all(),
            'city_list' => city::all()
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
            'client_list' => client::all(),
            'invoice_list' => invoice::all(),
            'city_list' => city::all()
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
        $client_record = new client;
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
        $client_list = client::findOrFail($id);
        return view('client.show', [
            'client_list' => $client_list,
            'invoice_list' => invoice::all()
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
        $client_list = client::findOrFail($id);
        return view('client.edit', [
            'client_list' => $client_list,
            'invoice_list' => invoice::all(),
            'city_list' => city::all()
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
        $client_record = client::findOrFail($id);

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
         $client_list = client::findOrFail($id);
         $client_list->delete();
         return redirect()->route('client.index')->withSuccess(__('client deleted successfully'));
     }
 
     public function confirm_delete($id)
     {
         $client_list = client::findOrFail($id);
         return view('client.confirm_delete', [
             'client_list' => $client_list
         ]);
     }
}
