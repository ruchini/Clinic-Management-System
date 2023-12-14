<!-- resources/views/patients/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Patient</h2>

        <!-- Patient creation form with Bootstrap styling -->
        <form action="{{ route('patients.store') }}" method="POST">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-4">
                    <input type="text" name="name" class="form-control form-control-sm" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="birthday" class="col-sm-2 col-form-label">Birthday:</label>
                <div class="col-sm-4">
                    <input type="date" name="birthday" class="form-control form-control-sm" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="contact_no" class="col-sm-2 col-form-label">Phone:</label>
                <div class="col-sm-4">
                    <input type="text" name="contact_no" class="form-control form-control-sm" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address:</label>
                <div class="col-sm-4">
                    <input type="text" name="address" class="form-control form-control-sm" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="nic" class="col-sm-2 col-form-label">NIC:</label>
                <div class="col-sm-4">
                    <input type="text" name="nic" class="form-control form-control-sm">
                </div>
            </div>

            <div class="form-group row">
                <label for="notes" class="col-sm-2 col-form-label">Special Note:</label>
                <div class="col-sm-4">
                    <input type="text" name="notes" class="form-control form-control-sm">
                </div>
            </div>

            <!-- Add other patient fields as needed -->

            <div class="form-group row">
                <div class="col-sm-4 offset-sm-2">
                    <button type="submit" class="btn btn-success btn-sm">Create Patient</button>
                    <a href="{{ route('patients.index') }}" class="btn btn-primary btn-sm mt-2">Back to Patients List</a>
                </div>
            </div>
        </form>
    </div>
@endsection
