@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header pb-0">
            <h5 class="card-title">{{ __('New client') }}</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('client.store') }}" method="post" id="client-form">
                @csrf
                @include('client/__form')
            </form>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('client.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="client-form">
                <i class="fas fa-save"></i> {{ __('Save') }}
            </button>
        </div>
    </div> 
@endsection
