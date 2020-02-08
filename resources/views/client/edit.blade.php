@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header pb-0">
            <h5 class="card-title">{{ __('Edit a client') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('client.update', $client_list) }}" method="post" id="client-form">
                @csrf
                @method('PATCH')
                @include('client/__form')
            </form>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('client.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="client-form">
                <i class="fas fa-edit"></i> {{ __('Update') }}
            </button>
        </div>
    </div>
    
@endsection
