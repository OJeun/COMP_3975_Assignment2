@if (session('user'))
    @extends('layouts.master')
    @section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 margin-tb p-4">
                            <div class="pull-left">
                                <h2>Add New Transaction</h2>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Date:</strong>
                        <input type="date" name="date" class="form-control" placeholder="Date">
                    </div>

                    <div class="form-group">
                        <strong>Shop Name:</strong>
                        <input type="text" name="ShopName" class="form-control">
                    </div>

                    <div class="form-group">
                        <strong>Money Spent:</strong>
                        <input type="number" step="0.01" name="MoneySpent" class="form-control">
                    </div>

                    <div class="text-center pt-4">
                        <a class="btn btn-success" href="{{ route('index') }}"> Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    @endsection
@endif
