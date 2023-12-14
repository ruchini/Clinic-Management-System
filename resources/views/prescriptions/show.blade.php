@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Prescription Details</h2>

        <!-- Display details of the prescription -->

        <a href="{{ route('prescriptions.edit', $prescription->id) }}" class="btn btn-primary">Edit Prescription</a>
    </div>
@endsection
