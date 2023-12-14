<!-- resources/views/patients/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Patients List</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Contact No</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->birthday }}</td>
                        <td>{{ $patient->contact_no }}</td>
                        <td>{{ $patient->address }}</td>
                        <td>
                            <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
        <a href="{{ route('patients.create') }}" class="btn btn-primary">New Patient</a>
    </div>
@endsection
