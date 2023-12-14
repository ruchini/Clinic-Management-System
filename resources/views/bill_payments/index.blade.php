@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Bill Payments List</h2>

        <!-- Display bill payments in a Bootstrap table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($billPayments as $billPayment)
                    <tr>
                        <td>{{ $billPayment->patient->name }}</td>
                        <td>{{ $billPayment->amount }}</td>
                        <td>{{ $billPayment->payment_date }}</td>
                        <td>
                        <a href="{{ route('bill-payments.show', $billPayment->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('bill-payments.edit', $billPayment->id) }}" class="btn btn-primary">Edit</a>
                            <!-- Add delete button if needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('bill-payments.create') }}" class="btn btn-success">Add New Bill Payment</a>
    </div>
@endsection
