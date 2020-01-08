@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">{{ __('Invoice') }}</h5>
            <div>
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('invoice.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                    </a>

                    <a href="{{ route('invoice.edit', $invoice_list) }}" class="btn btn-outline-secondary">
                        <i class="fas fa-edit"></i> {{ __('Edit') }}
                    </a>

                    <button type="button" class="btn btn-outline-danger" data-route="{{ route('invoice.destroy', $invoice_list->id) }}" data-toggle="modal" data-target="#confirm_delete_modal">
                        <i class="fas fa-trash-alt"></i> {{ __('Delete') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-md-1">{{ __('Code') }}</dt>
                <dd class="col-md-3">{{ $invoice_list->code }}</dd>

                <dt class="col-md-1">{{ __('Collaborator') }}</dt>
                <dd class="col-md-3">{{ $invoice_list->Collaborator->name }}</dd>
                
                <dt class="col-md-1">{{ __('Client') }}</dt>
                <dd class="col-md-3">{{ $invoice_list->Client->name }}</dd>

                <dt class="col-md-1">{{ __('invoice State') }}</dt>
                <dd class="col-md-3">{{ $invoice_list->InvoiceState->type }}</dd>
                
                <dt class="col-md-1">{{ __('Expedition at') }}</dt>
                <dd class="col-md-3">{{ $invoice_list->created_at }}</dd>

                <dt class="col-md-1">{{ __('Expiration at') }}</dt>
                <dd class="col-md-3">{{ $invoice_list->expiration_at }}</dd>

                <dt class="col-md-1">{{ __('Receipt at') }}</dt>
                <dd class="col-md-3">{{ $invoice_list->date_of_receipt == '' ? "Whitout date" : $invoice_list->date_of_receipt }}</dd>

                <dt class="col-md-1">{{ __('Value Tax') }}</dt>
                <dd class="col-md-3">{{ number_format($invoice_list->value_tax, 2) }}</dd>
                
                <dt class="col-md-1">{{ __('Value Total') }}</dt>
                <dd class="col-md-3">{{ number_format($invoice_list->total_value, 2) }}</dd>
            </dl>

            <div class="card card-default">
                <div class="card-header">{{ __('Invoice Products') }}</div>
                <div class="card-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-primary" data-route="{{ route('invoice_product.store') }}" data-toggle="modal" data-target="#add_invoice_product_modal">
                        <i class="fas fa-plus-circle"></i> {{ __('Add Product') }}
                    </button> 
                </div>
                <div class="card-body">
                <table class="table table-hover table-bordered table-sm table-responsive-sm" >
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Product') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Subtotal') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoice_product_list as $invoice_product_lists)
                            <tr class="text-center">
                                @if($invoice_product_lists->invoice_id == $invoice_list->id)
                                    <td>{{ $invoice_product_lists->id }}</td>
                                    <td>{{ $invoice_product_lists->Product->description }}</td>
                                    <td>{{ number_format($invoice_product_lists->quantity, 2) }}</td>
                                    <td>{{ number_format($invoice_product_lists->price, 2) }}</td>
                                    <td>{{ number_format($invoice_product_lists->price * $invoice_product_lists->quantity, 2) }}</td>
                                    <td class="text-center">                                       
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-route="{{ route('invoice_product.destroy', $invoice_product_lists->id) }}" data-toggle="modal" data-target="#confirm_delete_modal">
                                            <i class="fas fa-trash-alt"></i> {{ __('Delete') }}
                                        </button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        <tr class="text-center">
                            <td  class="text-right" colspan="4">
                                <b>{{ __('Value Tax') }}</b>
                            </td>
                            <td>
                                <b>{{ number_format($invoice_list->value_tax, 2) }}</b>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td class="text-right" colspan="4">
                                <b>{{ __('Value Total') }}</b>
                            </td>
                            <td>
                                <b>{{ number_format($invoice_list->total_value, 2) }}</b>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('modals')
    @include('partials/__confirm_delete_modal')
    @include('partials/__add_invoice_product_modal')
@endpush