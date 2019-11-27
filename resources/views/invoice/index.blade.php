@extends('layouts.app')

@section('content')

<div class="card card-default">
        <div class="card-header pb-0">
            <h5 class="card-title">{{ __('Invoices') }}</h5>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-primary" href="{{ route('invoice.create') }}">Create new invoice</a>
        </div>
    </div>


    <div class="table-responsive-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Code') }}</th>
                        <th>{{ __('Collaborator') }}</th>
                        <th>{{ __('Client') }}</th>
                        <th>{{ __('invoice State') }}</th>
                        <th>{{ __('Expiration at') }}</th>
                        <th>{{ __('Value Tax') }}</th>
                        <th>{{ __('Value Total') }}</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice_list as $invoice_lists)
                        <tr>
                            <td>{{ $invoice_lists->code }}</td>
                            <td>{{ $invoice_lists->collaborator_id }}</td>
                            <td>{{ $invoice_lists->client_id }}</td>
                            <td>{{ $invoice_lists->invoice_state_id }}</td>
                            <td>{{ $invoice_lists->expiration_at }}</td>
                            <td>{{ $invoice_lists->value_tax }}</td>
                            <td>{{ $invoice_lists->total_value }}</td>
                            <td><a href="/invoice/{{ $invoice_lists->id }}/edit">Edit</a></td>
                            <td><a href="/invoice/{{ $invoice_lists->id }}/confirm_delete">delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
