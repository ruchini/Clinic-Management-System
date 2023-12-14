<!-- resources/views/patients/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Create New Patient</h2>

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required> <br>

        <label for="birthday">Birthday:</label>
        <input type="date" name="birthday" required> <br>

        <label for="contact_no">Phone:</label>
        <input type="text" name="contact_no" required> <br>

        <label for="address">Address:</label>
        <input type="text" name="address" required> <br>

        <label for="nic">NIC:</label>
        <input type="text" name="nic"> <br>

        <label for="notes">Special Note:</label>
        <input type="text" name="notes"> <br>

        <!-- Add other patient fields as needed -->

        <button type="submit">Create Patient</button>
    </form>

    <a href="{{ route('patients.index') }}">Back to Patients List</a>
@endsection
