@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header pb-0">
            <h5 class="card-title">{{ __('Summary Pay') }}</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('invoices.payment.store', $invoice->id) }}" method="post" id="payment-form">
                @csrf
                <span>
                    Code: {{ $invoice->code }}
                    Status: __{{ 'Pagada' }}
                </span>
            </form>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('invoice.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="payment-form">
                <i class="fas fa-save"></i> {{ __('Pay') }}
            </button>
        </div>
    </div> 
@endsection
