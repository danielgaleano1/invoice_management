@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header pb-0">
            <h5 class="card-title">{{ __('New invocie') }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('invoice.store') }}" method="post" id="invoice-form">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code">{{ __('Code') }}</label>
                            <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="name" id="code" value="{{ old('name') }}" required>
                            @includeWhen($errors->has('code'), 'partials.__invalid_feedback', ['feedback' => $errors->first('code')])
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('invoice.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="invoice-form">
                <i class="fas fa-save"></i> {{ __('Save') }}
            </button>
        </div>
    </div> 
@endsection
