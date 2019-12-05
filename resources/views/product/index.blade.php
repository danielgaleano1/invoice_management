@extends('layouts.app')

@section('content')

<div class="card card-default">
        <div class="card-header pb-0">
            <h3 class="card-title">{{ __('Products') }}</h3>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-primary" href="{{ route('product.create') }}">Create new product</a>
        </div>
    </div>


    <div class="table-responsive-lg">
            <table class="table table-hover table-bordered" >
                <thead class="thead-dark">
                    <tr>
                        <th>{{ __('Code') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Stock') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th class="text-center">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product_list as $product_lists)
                        <tr>
                            <td>{{ $product_lists->code }}</td>
                            <td>{{ $product_lists->description }}</td>
                            <td>{{ $product_lists->stock }}</td>
                            <td>{{ $product_lists->price }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Product actions') }}">
  
                                    <a href="{{ route('product.edit', $product_lists) }}" class="btn btn-outline-secondary" title="{{ __('Edit') }}">
                                        <i class="fas fa-edit">{{ __('Edit') }}</i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger" data-route="{{ route('product.destroy', $product_lists->id) }}" data-toggle="modal" data-target="#confirm_delete_modal"
                                        <i class="fas fa-trash">{{ __('Delete') }}</i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
