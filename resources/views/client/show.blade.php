@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">{{ __('Client') }}</h5>
            <div>
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('client.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                    </a>

                    <a href="{{ route('client.edit', $client_list) }}" class="btn btn-secondary">
                        <i class="fas fa-edit"></i> {{ __('Edit') }}
                    </a>

                    <a href="/client/{{ $client_list->id }}/confirm_delete" class="btn btn-danger" title="{{ __('Delete') }}">
                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-md-3">{{ __('Code') }}</dt>
                <dd class="col-md-3">{{ $client_list->code }}</dd>

                <dt class="col-md-3">{{ __('Name') }}</dt>
                <dd class="col-md-3">{{ $client_list->name }}</dd>
                
                <dt class="col-md-3">{{ __('Address') }}</dt>
                <dd class="col-md-3">{{ $client_list->address }}</dd>

                <dt class="col-md-3">{{ __('phone') }}</dt>
                <dd class="col-md-3">{{ $client_list->phone }}</dd>
                
                <dt class="col-md-3">{{ __('Email') }}</dt>
                <dd class="col-md-3">{{ $client_list->email }}</dd>
                
                <dt class="col-md-3">{{ __('Client') }}</dt>
                <dd class="col-md-3">{{ $client_list->city->name }}</dd>
            </dl>

            <div class="card card-default">
                <div class="card-header">{{ __('Invoices') }}</div>
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
                        @foreach($invoice_list as $invoice_lists)
                            <tr>
                                @if($invoice_lists->client_id == $client_list->id)
                                    <td>{{ $invoice_lists->id }}</td>
                                    <td>{{ $invoice_lists->code }}</td>
                                    <td>{{ $invoice_lists->collaborator_id }}</td>
                                    <td class="text-right">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Collaborator actions') }}">
                                            <a href="{{ route('invoice.edit', $invoice_lists) }}" class="btn btn-link" title="{{ __('Edit') }}">
                                                <i class="fas fa-edit">Edit</i>
                                            </a>
                                            <a href="/invoice/{{ $invoice_lists->id }}/confirm_delete" class="btn btn-link text-danger" title="{{ __('Delete') }}">
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