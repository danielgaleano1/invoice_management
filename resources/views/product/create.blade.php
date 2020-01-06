@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header pb-0">
            <h5 class="card-title">{{ __('New product') }}</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('product.store') }}" method="post" id="product-form">
                @csrf
                @include('product/__form_create')
            </form>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('product.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="product-form">
                <i class="fas fa-save"></i> {{ __('Save') }}
            </button>
        </div>
    </div> 
@endsection
