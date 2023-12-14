@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Bill Payment</h2>

        <!-- Bill payment form with Bootstrap styling -->
        <form action="{{ route('bill-payments.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="patient_id">Patient:</label>
                <select name="patient_id" class="form-control">
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount (Rs):</label>
                <input type="text" name="amount" class="form-control" pattern="[0-9]+" title="Please enter numbers only" required>
            </div>

            <div class="form-group">
                <label for="payment_date">Payment Date:</label>
                <input type="date" name="payment_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Create Bill Payment</button>
        </form>
    </div>
@endsection
