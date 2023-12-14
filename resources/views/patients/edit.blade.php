@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Edit Patient</h2>

                <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="{{ $patient->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input type="date" name="birthday" value="{{ $patient->birthday }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="contact_no">Phone:</label>
                        <input type="text" name="contact_no" value="{{ $patient->contact_no }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" value="{{ $patient->address }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="nic">NIC:</label>
                        <input type="text" name="nic" value="{{ $patient->nic }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="notes">Special Note:</label>
                        <input type="text" name="notes" value="{{ $patient->notes }}" class="form-control">
                    </div>

                    <!-- Add other patient fields as needed -->

                    <button type="submit" class="btn btn-warning">Update Patient</button>
                    <a href="{{ route('patients.index') }}" class="btn btn-primary">Back to Patients List</a>
                </form>

                
            </div>
        </div>
    </div>
@endsection
