@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">{{ __('Invoice Products') }}</h3>
    </div>

    <div class="card-body">
    <div class="table-responsive-lg">
        <table class="table table-hover table-bordered" >
            <thead class="thead-dark">
                <tr>
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('Product') }}</th>
                    <th>{{ __('Invoice') }}</th>
                    <th>{{ __('Quantity') }}</th>
                    <th>{{ __('Price') }}</th>
                    <th class="text-center">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice_product_list as $invoice_product_lists)
                    <tr>
                            <td>{{ $invoice_product_lists->id }}</td>
                            <td>{{ $invoice_product_lists->Product->description }}</td>
                            <td>{{ $invoice_product_lists->Invoice->code }}</td>
                            <td>{{ $invoice_product_lists->quantity }}</td>
                            <td>{{ $invoice_product_lists->price }}</td>
                            <td class="text-center">                                       
                                <button type="button" class="btn btn-outline-danger" data-route="{{ route('invoice_product.destroy', $invoice_product_lists->id) }}" data-toggle="modal" data-target="#confirm_delete_modal"
                                    <i class="fas fa-trash">{{ __('Delete') }}</i>
                                </button>
                            </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection
@push('modals')
    @include('partials/__confirm_delete_modal')
@endpush