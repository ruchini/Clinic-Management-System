@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Prescriptions</h2>
        
        <!-- Display a list of prescriptions as a Bootstrap grid -->
        <div class="row">
            @foreach ($prescriptions as $prescription)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $prescription->patient->name }}</h5>
                            <p class="card-text"><strong>Medication:</strong> {{ $prescription->medication }}</p>
                            <p class="card-text"><strong>Dosage:</strong> {{ $prescription->dosage }}</p>
                            <p class="card-text"><strong>Instructions:</strong> {{ $prescription->instructions }}</p>
                            <p class="card-text"><strong>Prescription Date:</strong> {{ $prescription->prescription_date }}</p>
                            <a href="{{ route('prescriptions.edit', $prescription->id) }}" class="btn btn-warning">Edit</a>
                            <!-- Add a delete button or form if needed -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
        <a href="{{ route('prescriptions.create') }}" class="btn btn-primary">Add Prescription</a>
        
    </div>
@endsection
