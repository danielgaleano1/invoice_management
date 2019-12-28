@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header pb-0">
        <h3 class="card-title">{{ __('Clients') }}</h3>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <a class="btn btn-outline-primary" href="{{ route('client.create') }}">
            <i class="fas fa-plus-circle"></i> {{ __('Create new client') }}
        </a>
    </div>

    <div class="table-responsive-lg">
        <table class="table table-hover table-bordered" >
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>{{ __('id') }}</th>
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Address') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('City') }}</th>
                    <th >{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($client_list as $client_lists)
                    <tr>
                        <td>{{ $client_lists->id }}</td>
                        <td>{{ $client_lists->code }}</td>
                        <td>{{ $client_lists->name }}</td>
                        <td>{{ $client_lists->address }}</td>
                        <td>{{ $client_lists->phone }}</td>
                        <td>{{ $client_lists->email }}</td>
                        <td>{{ $client_lists->City->name }}</td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Client actions') }}">
                                <a href="{{ route('client.show', $client_lists) }}" class="btn btn-outline-info" title="{{ __('View') }}">
                                    <i class="fas fa-eye"></i> {{ __('View') }}
                                </a>

                                <a href="{{ route('client.edit', $client_lists) }}" class="btn btn-outline-secondary" title="{{ __('Edit') }}">
                                    <i class="fas fa-edit"></i> {{ __('Edit') }}
                                </a>

                                <button type="button" class="btn btn-outline-danger" data-route="{{ route('client.destroy', $client_lists->id) }}" data-toggle="modal" data-target="#confirm_delete_modal">
                                    <i class="fas fa-trash-alt"></i> {{ __('Delete') }}
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $client_list->links() }}
    </div>
</div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush