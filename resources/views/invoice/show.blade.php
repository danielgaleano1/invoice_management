@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">{{ __('Invoice') }}</h5>
            <div>
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('invoice.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                    </a>

                    <a href="{{ route('invoice.edit', $invoice_list) }}" class="btn btn-secondary">
                        <i class="fas fa-edit"></i> {{ __('Edit') }}
                    </a>

                    <a href="/invoice/{{ $invoice_list->id }}/confirm_delete" class="btn btn-danger" title="{{ __('Delete') }}">
                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-md-1">{{ __('Code') }}</dt>
                <dd class="col-md-2">{{ $invoice_list->code }}</dd>

                <dt class="col-md-1">{{ __('Collaborator') }}</dt>
                <dd class="col-md-2">{{ $invoice_list->collaborator->name }}</dd>
                
                <dt class="col-md-1">{{ __('Client') }}</dt>
                <dd class="col-md-2">{{ $invoice_list->client->name }}</dd>

                <dt class="col-md-1">{{ __('invoice State') }}</dt>
                <dd class="col-md-2">{{ $invoice_list->invoice_state->type }}</dd>
                
                <dt class="col-md-1">{{ __('Expiration at') }}</dt>
                <dd class="col-md-2">{{ $invoice_list->expiration_at }}</dd>
                
                <dt class="col-md-1">{{ __('Value Tax') }}</dt>
                <dd class="col-md-2">{{ $invoice_list->value_tax }}</dd>
                
                <dt class="col-md-1">{{ __('Value Total') }}</dt>
                <dd class="col-md-2">{{ $invoice_list->total_value }}</dd>
            </dl>

            <div class="card card-default">
                <div class="card-header">{{ __('Invoice Products') }}</div>
                <div class="card-footer d-flex justify-content-between">
                    <a class="btn btn-primary" href="{{ route('invoice_product.create') }}">Add product</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Product') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th class="text-right"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoice_product_list as $invoice_product_lists)
                            <tr>
                                @if($invoice_product_lists->invoice_id == $invoice_list->id)
                                    <td>{{ $invoice_product_lists->product_id }}</td>
                                    <td>{{ $invoice_product_lists->quantity }}</td>
                                    <td>{{ $invoice_product_lists->price }}</td>
                                    <td class="text-right">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Collaborator actions') }}">
                                            <a href="{{ route('invoice.edit', $invoice_list) }}" class="btn btn-link" title="{{ __('Edit') }}">
                                                <i class="fas fa-edit">Edit</i>
                                            </a>
                                            <a href="/invoice/{{ $invoice_list->id }}/confirm_delete" class="btn btn-link text-danger" title="{{ __('Delete') }}">
                                                <i class="fas fa-trash">Delete</i>
                                            </a>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection