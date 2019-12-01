@extends('layouts.app')

@section('content')
<div class="btn-group btn-group-sm" role="group" aria-label="{{ __('menu') }}">
    <a href="{{ route('invoice.index') }}" class="btn btn-link" title="{{ __('invoice') }}">
        <i class="fas fa-eye">Invoice</i>
    </a>
    <a href="{{ route('client.index') }}" class="btn btn-link" title="{{ __('client') }}">
        <i class="fas fa-edit">Client</i>
    </a>
</div>
@endsection
