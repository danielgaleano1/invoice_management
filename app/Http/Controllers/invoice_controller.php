<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoice;
use App\collaborator;
use App\client;
use App\invoice_state;

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
            'invoice_list' => invoice::all(),
            'collaborator_list' => collaborator::all(),
            'client_list' => invoice::all(),
            'invoice_state_list' => invoice_state::all(),
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
            'collaborator_list' => collaborator::all(),
            'client_list' => invoice::all(),
            'invoice_state_list' => invoice_state::all(),
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
            'client_list' => invoice::all(),
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
        //
    }

    public function confirm_delete($id)
    {
        //
    }
}
