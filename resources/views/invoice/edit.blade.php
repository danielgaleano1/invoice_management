@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit Invoices {{ $invoice_list->code }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/invoice">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/invoice/{{ $invoice_list->id }}" method="POST">
                @csrf
                @method('put')
                <div class="form-goup">
                    <label for="title">Code</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Type a title" value="{{ old('code') }}">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>

    
@endsection
