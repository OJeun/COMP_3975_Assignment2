@extends('layouts.master')
<!-- Form for inputting the year -->

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column;">
        <form action="{{ route('showYearlyReport') }}" method="GET">
            @csrf
            <label for="year">Enter Year:</label>
            <input type="text" id="year" name="year">
            <button type="submit">Show Report</button>
        </form>
        <a href="{{ route('index') }}" class="btn btn-primary pl-5 mt-3">Back</a>
    </div>


    {{-- @dump($transactions) --}}
    @if (isset($transactions) && isset($year))
        <div class="container mt-5">
            <h1>Yearly Report for {{ $year }}</h1>

            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Total Spent</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->Category ?? 'Uncategorized' }}</td>
                            <td>{{ $transaction->TotalSpent }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="display: flex; justify-content: center; width: 100%; height: 500px; padding-top: 50px">
            <div style="width: 400px;">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
        <div style="display: flex; justify-content: center; margin-top: 20px;">
            <a class="btn btn-success" href="{{ route('index') }}"> Back</a>
        </div>
    @endif
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('pieChart').getContext('2d');
        var labels = {!! json_encode($transactions->pluck('Category')->toArray()) !!};
        var data = {!! json_encode($transactions->pluck('TotalSpent')->toArray()) !!};
        var colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF8A80', '#D4E157'];

        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: colors,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    });
</script>
