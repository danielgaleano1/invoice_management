@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">{{ __('Client') }}</h5>
            <div>
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('client.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                    </a>

                    <a href="{{ route('client.edit', $client_list) }}" class="btn btn-outline-secondary">
                        <i class="fas fa-edit"></i> {{ __('Edit') }}
                    </a>

                    <button type="button" class="btn btn-outline-danger" data-route="{{ route('client.destroy', $client_list) }}" data-toggle="modal" data-target="#confirm_delete_modal">
                        <i class="fas fa-trash"></i> {{ __('Delete') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-md-1">{{ __('Document Type') }}</dt>
                <dd class="col-md-3">{{ $client_list->document_type->name }}</dd>

                <dt class="col-md-1">{{ __('Document') }}</dt>
                <dd class="col-md-3">{{ $client_list->code }}</dd>

                <dt class="col-md-1">{{ __('Name') }}</dt>
                <dd class="col-md-3">{{ $client_list->surName }}</dd>
                
                <dt class="col-md-1">{{ __('Address') }}</dt>
                <dd class="col-md-3">{{ $client_list->address }}</dd>

                <dt class="col-md-1">{{ __('phone') }}</dt>
                <dd class="col-md-3">{{ $client_list->phone }}</dd>
                
                <dt class="col-md-1">{{ __('Email') }}</dt>
                <dd class="col-md-3">{{ $client_list->email }}</dd>
                
                <dt class="col-md-1">{{ __('City') }}</dt>
                <dd class="col-md-3">{{ $client_list->City->name }}</dd>
            </dl>

            <div class="card card-default">
                <div class="card-header">{{ __('Invoices') }}</div>
                <div class="card-body">
                    <table class="table table-hover table-bordered" >
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>{{ __('Invoice Code') }}</th>
                            <th>{{ __('Collaborator') }}</th>
                            <th>{{ __('Invoice State') }}</th>
                            <th>{{ __('Expiration at') }}</th>
                            <th>{{ __('Value Tax') }}</th>
                            <th>{{ __('Value Total') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoice_list as $invoice_lists)
                            <tr class="text-center">
                                @if($invoice_lists->client_id == $client_list->id)
                                    <td>{{ $invoice_lists->code }}</td>
                                    <td>{{ $invoice_lists->Collaborator->name }}</td>
                                    <td>{{ $invoice_lists->InvoiceState->type }}</td>
                                    <td>{{ $invoice_lists->expiration_at }}</td>
                                    <td>{{ number_format($invoice_lists->value_tax, 2) }}</td>
                                    <td>{{ number_format($invoice_lists->total_value, 2) }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Collaborator actions') }}">
                                            <a href="{{ route('invoice.edit', $invoice_lists) }}" class="btn btn-outline-secondary" title="{{ __('Edit') }}">
                                                <i class="fas fa-edit"></i> {{ __('Edit') }}
                                            </a>
                                            <button type="button" class="btn btn-outline-danger" data-route="{{ route('invoice.destroy', $invoice_lists->id) }}" data-toggle="modal" data-target="#confirm_delete_modal">
                                                <i class="fas fa-trash-alt"></i> {{ __('Delete') }}
                                            </button>
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
@push('modals')
    @include('partials/__confirm_delete_modal')
@endpush