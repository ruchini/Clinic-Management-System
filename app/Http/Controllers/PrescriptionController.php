<?php
// app/Http/Controllers/PrescriptionController.php

namespace App\Http\Controllers;

use App\Services\PrescriptionService;
use Illuminate\Http\Request;
use App\Models\Patient;

class PrescriptionController extends Controller
{
    protected $prescriptionService;

    public function __construct(PrescriptionService $prescriptionService)
    {
        $this->prescriptionService = $prescriptionService;
    }

    public function index()
    {
        $prescriptions = $this->prescriptionService->getAllPrescriptions();
        return view('prescriptions.index', compact('prescriptions'));
    }

    public function show($id)
    {
        $prescription = $this->prescriptionService->getPrescriptionById($id);
        return view('prescriptions.show', compact('prescription'));
    }

    public function create()
    {
        $patients = Patient::orderBy('name', 'asc')->get();
        return view('prescriptions.create', compact('patients'));
    }

    public function store(Request $request)
    {
        // Validate and store the prescription
        $this->validate($request, [
            'patient_id' => 'required',
            'medication' => 'required',
            'dosage' => 'required',
            'instructions' => 'nullable',
            'prescription_date' => 'required|date',
        ]);

        $this->prescriptionService->createPrescription($request->all());

        return redirect()->route('prescriptions.index')->with('success', 'Prescription created successfully.');
    }

    public function edit($id)
    {
        $prescription = $this->prescriptionService->getPrescriptionById($id);
        return view('prescriptions.edit', compact('prescription'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the prescription
        $this->validate($request, [
            'patient_id' => 'required',
            'medication' => 'required',
            'dosage' => 'required',
            'instructions' => 'nullable',
            'prescription_date' => 'required|date',
        ]);

        $this->prescriptionService->updatePrescription($id, $request->all());

        return redirect()->route('prescriptions.index')->with('success', 'Prescription updated successfully.');
    }

    public function destroy($id)
    {
        $this->prescriptionService->deletePrescription($id);

        return redirect()->route('prescriptions.index')->with('success', 'Prescription deleted successfully.');
    }
}
