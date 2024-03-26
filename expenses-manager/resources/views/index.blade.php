@extends('layouts.master')

@section('content')
    <a href="{{ route('import') }}" class="btn btn-primary">Import CSV</a>
    <h1>Transactions</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Shop Name</th>
                <th>Money Spent</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $item) 
                <tr>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->ShopName }}</td>
                    <td>{{ $item->MoneySpent }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection