<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profile;
use App\Collaborator;
use App\InvoiceState;
use App\Client;
use App\DocumentType;
use App\Country;
use App\City;
use App\Invoice;
use App\Payment;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $invoice = Invoice::findOrFail($id);
        //$payment = new Payment;

        return view('payment.create', compact('invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Placetopay $placetopay, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $payment = Payment::create();

        // Creating a random reference for the test
        $reference = 'TEST_' . time();

        // Request Information
        $request = [
            "locale" => "es_CO",
            "payer" => [
                "name" => $invoice->client->name,
                "surname" => $invoice->client->surname,
                "email" => $invoice->client->email,
                "documentType" => "CC",
                "document"     => "1848839248",
                "mobile" => $invoice->client->phone,
                "address" => [
                    "street" => $invoice->client->address,
                    "city" => $invoice->client->city->name,
                    "country" => $invoice->client->city->country->name,
                ]
            ],
            "buyer" => [
                "name" => $invoice->client->name,
                "surname" => $invoice->client->surname,
                "email" => $invoice->client->email,
                "documentType" => "CC",
                "document"     => "1848839248",
                "mobile" => $invoice->client->phone,
                "address" => [
                    "street" => $invoice->client->address,
                    "city" => $invoice->client->city->name,
                    "country" => $invoice->client->city->country->name,
                ]
            ],
            "payment"        => [
                "reference"    => $reference,
                "description"  => "Pago",
                "amount"       => [
                    "currency" => "USD",
                    "total"    => $invoice->total_value
                ],
                "allowPartial" => false
            ],
            "expiration"     => date('c', strtotime('+1 hour')),
            "ipAddress"      => $request->ip(),
            "userAgent"      => $request->header('User-Agent'),
            "returnUrl"      => route('invoices.payment.show', $invoice->id),
            "cancelUrl"      => "http://127.0.0.1:8000/invoice",
            "skipResult"     => false,
            "noBuyerFill"    => false,
            "captureAddress" => false,
            "paymentMethod"  => null
        ];

        try {
            $response = $placetopay->request($request);

            if ($response->isSuccessful()) {
                $payment->update([
                    'status' => $response->status()->status(),
                    'invoice_id' => $invoice->id,
                    'request_id' => $response->requestId(),
                    'processUrl' => $response->processUrl(),
                ]);
                $invoice->update([
                    'invoice_state_id' => 2
                ]);

                // Redirect the client to the processUrl or display it on the JS extension
                return redirect($response->processUrl());
            } else {
                // There was some error so check the message
                $response->status()->message();
            }
            var_dump($response);
        } catch (Exception $e) {
            dd($e->getMessage());
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
        $invoice = Invoice::findOrFail($id);
        //$payment = new Payment;

        return view('payment.show', compact('invoice'));
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
        //
    }
}
