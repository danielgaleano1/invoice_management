@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header pb-0">
            <h5 class="card-title">{{ __('Products') }}</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('invoice_product.store') }}" method="post" id="invoice_product_form">
                @csrf
                @include('invoice_product\__form_create')
            </form>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('invoice.show') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="invoice_product_form">
                <i class="fas fa-save"></i> {{ __('Save') }}
            </button>
        </div>
    </div> 
@endsection
