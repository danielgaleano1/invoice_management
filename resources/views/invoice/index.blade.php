@extends('layouts.app')

@section('content')

<div class="card card-default">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">
            <h3 class="card-title">{{ __('Invoices') }}</h3>
        </a>
        <form class="form-inline">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <div class="card-footer d-flex justify-content-between">
        <a class="btn btn-outline-primary" href="{{ route('invoice.create') }}">
            <i class="fas fa-plus-circle"></i> {{ __('Create new invoice') }}
        </a>
        <button type="button" class="btn btn-outline-success" data-route="{{ route('invoices.import') }}" data-toggle="modal" data-target="#import_invoice_excel_modal">
            <i class="fas fa-file-excel"></i> {{ __('Import from Excel') }}
        </button> 
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="table-responsive-lg">
        <table class="table table-hover table-bordered text-center" >
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
                        <td>{{ $invoice_lists->Collaborator->name }}</td>
                        <td>{{ $invoice_lists->Client->name }}</td>
                        <td>{{ $invoice_lists->InvoiceState->type }}</td>
                        <td>{{ $invoice_lists->created_at }}</td>
                        <td>{{ $invoice_lists->expiration_at }}</td>
                        <td>{{ $invoice_lists->date_of_receipt == '' ? "Whitout date" : $invoice_lists->date_of_receipt }}</td>
                        <td>{{ number_format($invoice_lists->value_tax, 2) }}</td>
                        <td>{{ number_format($invoice_lists->total_value, 2) }}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Collaborator actions') }}">
                                <a href="{{ route('invoice.show', $invoice_lists) }}" class="btn btn-outline-info" title="{{ __('View') }}">
                                    <i class="fas fa-eye"></i> {{ __('View') }}
                                </a>
                                
                                <a href="{{ route('invoice.edit', $invoice_lists) }}" class="btn btn-outline-secondary" title="{{ __('Edit') }}">
                                    <i class="fas fa-edit"></i> {{ __('Edit') }}
                                </a>

                                <button type="button" class="btn btn-outline-danger" data-route="{{ route('invoice.destroy', $invoice_lists->id) }}" data-toggle="modal" data-target="#confirm_delete_modal">
                                    <i class="fas fa-trash-alt"></i> {{ __('Delete') }}
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
    @include('partials/__confirm_delete_modal')
    @include('partials/__import_invoice_excel_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/import-invoice-excel-modal.js')) }}"></script>
@endpush
