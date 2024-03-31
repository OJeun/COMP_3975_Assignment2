@extends('layouts.master')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    <div style="display: flex; justify-content: center;">
        <div style="width: 80%;">
            <div class="float-left">
                <a class="btn btn-success btn-sm" href="{{ route('import') }}" class="btn btn-primary">Import CSV</a>
                <a class="btn btn-success btn-sm" href="{{ route('transaction.create') }}">
                    Create New
                </a>
                <a class="btn btn-success btn-sm" href="{{ route('transaction.report') }}">
                    Report
                </a>
            </div>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Date</th>
                        <th>Shop Name</th>
                        <th>Money Spent</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $item)
                        <tr>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->ShopName }}</td>
                            <td>{{ $item->MoneySpent }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('transaction.edit', $item->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm"
                                    href="{{ route('transaction.destroy', $item->id) }}">Del</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
