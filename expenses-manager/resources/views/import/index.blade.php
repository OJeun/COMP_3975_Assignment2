@extends('layouts.master')

@section('content')
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">Upload CSV File</h2>
                <form method="POST" action="{{ route('processImport') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="csvFile">Select file</label>
                        <input type="file" class="form-control-file" name="csvFile" id="csvFile" accept=".csv">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <!-- Add a back button -->
                    <a href="{{ route('index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection