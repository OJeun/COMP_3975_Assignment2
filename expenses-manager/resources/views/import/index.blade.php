@extends('layouts.master')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 pl-5">
                <h2 class="text-center">Upload CSV File</h2>
                <form method="POST" action="{{ route('processImport') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group p-3 text-center">
                        <label for="csvFile" class="pl-5">Select file</label>
                        <input type="file" class="form-control-file pl-5" name="csvFile" id="csvFile" accept=".csv">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary pl-5">Upload</button>
                        <!-- Add a back button -->
                        <a href="{{ route('index') }}" class="btn btn-secondary pl-5">Back</a>
                    </div>
            </div>
        </div>
    </div>
@endsection
