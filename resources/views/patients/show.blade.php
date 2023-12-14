@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-3">Patient Details</h2>

        <div class="row mt-4">
            <div class="col-md-6">
                <dl class="row">
                    <dt class="col-sm-4">Name:</dt>
                    <dd class="col-sm-8">{{ $patient->name }}</dd>

                    <dt class="col-sm-4">Birthday:</dt>
                    <dd class="col-sm-8">{{ $patient->birthday }}</dd>

                    <dt class="col-sm-4">Phone:</dt>
                    <dd class="col-sm-8">{{ $patient->contact_no }}</dd>

                    <dt class="col-sm-4">Address:</dt>
                    <dd class="col-sm-8">{{ $patient->address }}</dd>

                    <dt class="col-sm-4">NIC:</dt>
                    <dd class="col-sm-8">{{ $patient->nic }}</dd>

                    <dt class="col-sm-4">Special Note:</dt>
                    <dd class="col-sm-8">{{ $patient->notes }}</dd>

                </dl>

                <a href="{{ route('patients.index') }}" class="btn btn-primary">Back to Patients List</a>
            </div>
        </div>
    </div>
@endsection
