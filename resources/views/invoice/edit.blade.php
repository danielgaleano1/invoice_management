@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header pb-0">
            <h5 class="card-title">{{ __('Edit a invoice') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('invoice.update', $invoice_list) }}" method="post" id="invoices-form">
                @csrf
                @method('PATCH')
                @include('invoice/__form')
            </form>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('invoice.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="invoices-form">
                <i class="fas fa-edit"></i> {{ __('Update') }}
            </button>
        </div>
    </div>
    
@endsection
