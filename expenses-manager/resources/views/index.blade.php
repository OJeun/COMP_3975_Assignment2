@extends('layouts.master')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <a class="btn btn-success btn-sm" href="{{ route('import') }}" class="btn btn-primary">Import CSV</a>
                <a class="btn btn-success btn-sm" href="{{ route('transaction.create') }}">
                    Create New
                </a>
            </div>
        </div>
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
                        <a class="btn btn-primary btn-sm" href="{{ route('transaction.edit',$item->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm" href="{{ route('transaction.destroy',$item->id) }}">Del</a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
