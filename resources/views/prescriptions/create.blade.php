@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Prescription</h2>

        <!-- Prescription form with fields for creating a new prescription -->

        <form action="{{ route('prescriptions.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="patient_id">Patient Name:</label>
                <select name="patient_id" id="patient_id" class="form-control">
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="medication">Medication:</label>
                <textarea name="medication" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="dosage">Dosage:</label>
                <textarea name="dosage" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="instructions">Instructions:</label>
                <textarea name="instructions" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="prescription_date">Prescription Date:</label>
                <input type="date" name="prescription_date" class="form-control" min="{{ now()->toDateString() }}">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
        <a href="{{ route('prescriptions.index') }}" class="btn btn-primary mt-3">Back</a>
    </div>

    <!-- Include Select2 JS and initialize it -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 with the search option
            $('#patient_id').select2({
                theme: 'bootstrap',
                placeholder: 'Search for a patient',
                minimumInputLength: 2, // Minimum number of characters before the search
                ajax: {
                    url: '{{ route("patients.search") }}', // Replace with your actual search route
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endsection
