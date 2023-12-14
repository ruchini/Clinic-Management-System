<!-- resources/views/prescriptions/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Prescriptions</h2>

        <!-- Filter by patient name -->
        <div class="form-group">
            <label for="patientFilter">Filter by Patient:</label>
            <select id="patientFilter" class="form-control">
                <option value="">All Patients</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Display prescriptions as a Bootstrap table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Medication</th>
                        <th>Dosage</th>
                        <th>Instructions</th>
                        <th>Prescription Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescriptions as $prescription)
                        <tr>
                            <td>{{ $prescription->patient->name }}</td>
                            <td>{{ $prescription->medication }}</td>
                            <td>{{ $prescription->dosage }}</td>
                            <td>{{ $prescription->instructions }}</td>
                            <td>{{ $prescription->prescription_date }}</td>
                            <td>
                                <a href="{{ route('prescriptions.edit', $prescription->id) }}" class="btn btn-warning">Edit</a>
                                <!-- Add a delete button or form if needed -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
        <a href="{{ route('prescriptions.create') }}" class="btn btn-primary">Add Prescription</a>
    </div>

    <!-- Include Select2 JS and initialize it -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 for patient filtering
            $('#patientFilter').select2({
                theme: 'bootstrap',
                placeholder: 'Select a patient',
                allowClear: true
            });

            // Apply filtering when the patient selection changes
            $('#patientFilter').on('change', function() {
                var selectedPatientId = $(this).val();
                if (selectedPatientId) {
                    // Hide rows that don't match the selected patient
                    $('tbody tr').hide();
                    $('tbody tr[data-patient-id="' + selectedPatientId + '"]').show();
                } else {
                    // Show all rows if no patient is selected
                    $('tbody tr').show();
                }
            });
        });
    </script>
@endsection
