@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Invoices</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/expense_reports/create">Create new invoice</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table>
                @foreach($invoice_list as $invoice_lists)
                    <tr>
                        <td>{{ $invoice_lists->code }}</td>
                        <td><a href="/invoice/{{ $invoice_lists->id }}/edit">Edit</a></td>
                        <td><a href="/invoice/{{ $invoice_lists->id }}/confirm_delete">delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
