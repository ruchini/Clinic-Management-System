<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h2 class="text-center">Revenue Report</h2>
                </div>
                <div class="card-body">
                    <!-- Form to input date range -->
                    <form action="{{ route('revenue-reports.generate') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </form>

                    <!-- Display generated report -->
                    @isset($revenueData)
                        <div class="mt-4">
                            <h3>Revenue Report for {{ $startDate }} to {{ $endDate }}</h3>
                            <p class="lead">Total Revenue: Rs {{ $revenueData }}</p>
                        </div>
                    @endisset
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h2 class="text-center">Patient List</h2>
                </div>
                <div class="card-body">
                    <!-- Display patient list -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Birthday</th>
                                <th>Contact No</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->birthday }}</td>
                                    <td>{{ $patient->contact_no }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
