@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Prescription</h2>

        <!-- Prescription form with fields for editing an existing prescription -->

        <form action="{{ route('prescriptions.update', $prescription->id) }}" method="post">
            @csrf
            @method('PUT')
    
            <!-- Include prescription form fields here -->
            <div class="form-group">
                <label for="medication">Medication:</label>
                <textarea name="medication" class="form-control" rows="3">{{ $prescription->medication }}</textarea>
            </div>

            <div class="form-group">
                <label for="dosage">Dosage:</label>
                <textarea name="dosage" class="form-control" rows="3">{{ $prescription->dosage }}</textarea>
            </div>

            <div class="form-group">
                <label for="instructions">Instructions:</label>
                <textarea name="instructions" class="form-control" rows="3">{{ $prescription->instructions }}</textarea>
            </div>

            <div class="form-group">
                <label for="prescription_date">Prescription Date:</label>
                <input type="date" name="prescription_date" class="form-control" value="{{ $prescription->prescription_date }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Prescription</button>
        </form>
    </div>
@endsection
