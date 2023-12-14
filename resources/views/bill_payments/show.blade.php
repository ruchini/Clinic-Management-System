@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Payment Details</h2>

        <dl class="row mt-4">
            <dt class="col-sm-4">Patient:</dt>
            <dd class="col-sm-8">{{ $billPayment->patient->name }}</dd>

            <dt class="col-sm-4">Amount:</dt>
            <dd class="col-sm-8">{{ $billPayment->amount }}</dd>

            <dt class="col-sm-4">Payment Date:</dt>
            <dd class="col-sm-8">{{ $billPayment->payment_date }}</dd>
        </dl>

        <a href="{{ route('bill-payments.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
