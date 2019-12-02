@extends('layouts.app')

@section('content')

<div class="card card-default">
        <div class="card-header pb-0">
            <h5 class="card-title">{{ __('Clients') }}</h5>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a class="btn btn-primary" href="{{ route('client.create') }}">Create new client</a>
        </div>
    </div>


    <div class="table-responsive-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Code') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Address') }}</th>
                        <th>{{ __('Phone') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('City') }}</th>
                        <th class="text-right"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($client_list as $client_lists)
                        <tr>
                            <td>{{ $client_lists->code }}</td>
                            <td>{{ $client_lists->name }}</td>
                            <td>{{ $client_lists->address }}</td>
                            <td>{{ $client_lists->phone }}</td>
                            <td>{{ $client_lists->email }}</td>
                            <td>{{ $client_lists->city_id }}</td>
                            <td class="text-right">
                                <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Client actions') }}">
                                    <a href="{{ route('client.show', $client_lists) }}" class="btn btn-link" title="{{ __('View') }}">
                                        <i class="fas fa-eye">View</i>
                                    </a>
                                    <a href="{{ route('client.edit', $client_lists) }}" class="btn btn-link" title="{{ __('Edit') }}">
                                        <i class="fas fa-edit">Edit</i>
                                    </a>
                                    <a href="/client/{{ $client_lists->id }}/confirm_delete" class="btn btn-link text-danger" title="{{ __('Delete') }}">
                                        <i class="fas fa-trash">Delete</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
