@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Payment</h2>

        <!-- Bill payment edit form with Bootstrap styling -->
        <form action="{{ route('bill-payments.update', $billPayment->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="patient_id">Patient:</label>
                <input type="text" class="form-control" value="{{ $billPayment->patient->name }}" readonly>
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="text" name="amount" class="form-control" value="{{ $billPayment->amount }}" required>
            </div>

            <div class="form-group">
                <label for="payment_date">Payment Date:</label>
                <input type="date" name="payment_date" class="form-control" value="{{ $billPayment->payment_date }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('bill-payments.index') }}" class="btn btn-primary">Back</a>
            
        </form>
    </div>
@endsection
