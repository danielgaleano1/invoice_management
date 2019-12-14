@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header pb-0">
        <h3 class="card-title">{{ __('Invoices') }}</h3>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <a class="btn btn-outline-primary" href="{{ route('invoice.create') }}">
            <i class="fas fa-plus-circle"></i> {{ __('Create new invoice') }}
        </a>
    </div>

    <div class="table-responsive-lg">
        <table class="table table-hover table-bordered" >
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('Collaborator') }}</th>
                    <th>{{ __('Client') }}</th>
                    <th>{{ __('invoice State') }}</th>
                    <th>{{ __('Expedition at') }}</th>
                    <th>{{ __('Expiration at') }}</th>
                    <th>{{ __('Receipt at') }}</th>
                    <th>{{ __('Value Tax') }}</th>
                    <th>{{ __('Value Total') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice_list as $invoice_lists)
                    <tr>
                        <td>{{ $invoice_lists->code }}</td>
                        <td>{{ $invoice_lists->collaborator->name }}</td>
                        <td>{{ $invoice_lists->client->name }}</td>
                        <td>{{ $invoice_lists->invoice_state->type }}</td>
                        <td>{{ $invoice_lists->created_at }}</td>
                        <td>{{ $invoice_lists->expiration_at }}</td>
                        <td>{{ $invoice_lists->date_of_receipt }}</td>
                        <td>{{ $invoice_lists->value_tax }}</td>
                        <td>{{ $invoice_lists->total_value }}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Collaborator actions') }}">
                                <a href="{{ route('invoice.show', $invoice_lists) }}" class="btn btn-outline-info" title="{{ __('View') }}">
                                    <i class="fas fa-eye"></i> {{ __('View') }}
                                </a>
                                
                                <a href="{{ route('invoice.edit', $invoice_lists) }}" class="btn btn-outline-secondary" title="{{ __('Edit') }}">
                                    <i class="far fa-edit"></i> {{ __('Edit') }}
                                </a>
                                <button type="button" class="btn btn-outline-danger" data-route="{{ route('invoice.destroy', $invoice_lists->id) }}" data-toggle="modal" data-target="#confirm_delete_modal">
                                    <i class="far fa-trash-alt"></i> {{ __('Delete') }}
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $invoice_list->links() }}
    </div>
</div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush