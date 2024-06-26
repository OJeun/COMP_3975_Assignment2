@extends('layouts.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <br>
        <div class="d-flex align-items-center">
            <h2 style="margin-right: 1em;">Buckets</h2>
            <button onclick="window.location='{{ route('bucket.create') }}'" class="btn btn-primary">Create</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Shop Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buckets as $bucket)
                    <tr>
                        <td>{{ $bucket->category }}</td>
                        <td>{{ $bucket->shopName }}</td>
                        <td>
                            <a href="{{ route('bucket.edit', $bucket->id) }}" class="btn btn-primary">Update</a>
                            <form action="{{ route('bucket.destroy', $bucket->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('index') }}" class="btn btn-secondary">Back</a>
    </div>
    <br>
    <div class="container">
        <h2>Uncategorized Shops</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Shop Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($uncategorizedShops as $shop)
                    <tr>
                        <td>{{ $shop->shop_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
