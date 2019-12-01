@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete invoice</h1>
        </div>
    </div>
    
    <div class="card-footer">
        <form action="/invoice/{{ $invoice_list->id }}" method="POST" id="invoices_delete_form">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <div class="card-footer">
            <a href="{{ route('invoice.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-danger" form="invoices_delete_form">
                <i class="fas fa-edit"></i> {{ __('Delete') }}
            </button>
    </div>
@endsection