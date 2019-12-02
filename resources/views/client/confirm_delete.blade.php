@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete client</h1>
        </div>
    </div>
    
    <div class="card-footer">
        <form action="/client/{{ $client_list->id }}" method="POST" id="clients_delete_form">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <div class="card-footer">
            <a href="{{ route('client.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-danger" form="clients_delete_form">
                <i class="fas fa-edit"></i> {{ __('Delete') }}
            </button>
    </div>
@endsection