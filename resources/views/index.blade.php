@extends('layouts.app')

@section('content')

<div class="card card-default">
        <div class="card-header pb-0">
            <h5 class="card-title">{{ __('Invoices') }}</h5>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-primary" href="{{ route('invoice.create') }}">Create new invoice</a>
        </div>
    </div>


    <div class="table-responsive-lg">
        <h1>Invoice Management System</h1>
    </div>
@endsection
