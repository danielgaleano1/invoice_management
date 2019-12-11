@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header pb-0">
        <h3 class="card-title">{{ __('Products') }}</h3>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <a class="btn btn-outline-primary" href="{{ route('product.create') }}">
            <i class="fas fa-plus-circle"></i> {{ __('Create new product') }}
        </a>
    </div>

    <div class="table-responsive-lg">
        <table class="table table-hover table-bordered" >
            <thead class="thead-dark">
                <tr>
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('Product') }}</th>
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
                                <button type="button" class="btn btn-outline-primary" data-description="{{ $product_lists->description }}" data-route="{{ route('product.update', $product_lists->id) }}"  data-toggle="modal" data-target="#add_products_modal">
                                    <i class="fas fa-plus-circle"></i> {{ __('Add Product') }}
                                </button> 

                                <a href="{{ route('product.edit', $product_lists) }}" class="btn btn-outline-secondary" title="{{ __('Edit') }}">
                                    <i class="fas fa-edit"></i> {{ __('Edit') }}
                                </a>
                                <button type="button" class="btn btn-outline-danger" data-route="{{ route('product.destroy', $product_lists->id) }}" data-toggle="modal" data-target="#confirm_delete_modal">
                                    <i class="fas fa-trash-alt"></i> {{ __('Delete') }}
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $product_list->links() }}
    </div>
</div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
    @include('partials.__add_products_modal')
@endpush
