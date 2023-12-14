<?php
// app/Http/Controllers/BillPaymentController.php

namespace App\Http\Controllers;

use App\Models\BillPayment;
use App\Models\Patient;
use Illuminate\Http\Request;

class BillPaymentController extends Controller
{
    public function index()
    {
        $billPayments = BillPayment::with('patient')->get();
        return view('bill_payments.index', compact('billPayments'));
    }

    public function show($id)
    {
        $billPayment = BillPayment::with('patient')->findOrFail($id);
        return view('bill_payments.show', compact('billPayment'));
    }
    
    public function create()
    {
        $patients = Patient::orderBy('name', 'asc')->get();
        return view('bill_payments.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ]);

        BillPayment::create($request->all());

        return redirect()->route('bill-payments.index')
            ->with('success', 'Bill payment created successfully.');
    }

    public function edit($id)
    {
        $patients = Patient::orderBy('name', 'asc')->get();
        $billPayment = BillPayment::findOrFail($id);
        return view('bill_payments.edit', compact('billPayment', 'patients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ]);
        $billPayment = BillPayment::findOrFail($id);
        $billPayment->update($request->all());

        return redirect()->route('bill-payments.index')
            ->with('success', 'Bill payment updated successfully.');
    }
}
