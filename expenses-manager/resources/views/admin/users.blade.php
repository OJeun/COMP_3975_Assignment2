@extends('layouts.master')

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-success">
                <p>{{ session('message') }}</p>
            </div>
        @endif
        <h1>Users</h1>

        <form action="{{ route('updateUsers') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Is Approved</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        {{-- <h1>{{ $user->isApproved }}</h1> --}}
                        @if (!$user->isAdmin)
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <input type="hidden" name="users[]" value="{{ $user->email }}">
                                    <input type="checkbox" name="isApproved[]" value="{{ $user->email }}"
                                        {{ $user->isApproved ? 'checked' : '' }}>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
