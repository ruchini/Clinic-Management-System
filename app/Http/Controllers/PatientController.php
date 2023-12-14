<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PatientService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Patient;
class PatientController extends Controller
{
    private $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    public function index()
    {
        $patients = $this->patientService->getAllPatients();
        return view('patients.index', compact('patients'));
    }

    public function show($id)
    {
        $patient = $this->patientService->getPatientById($id);
        return view('patients.show', compact('patient'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        // Validate and store the patient
        $this->validate($request, [
            'name' => 'required|string|max:150',
            'birthday' => 'required|date',
            'contact_no' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nic' => 'nullable|string|max:20|unique:patients',
            'notes' => 'nullable|string',
        ]);

        $this->patientService->createPatient($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient created successfully');
    }

    public function edit($id)
    {
        $patient = $this->patientService->getPatientById($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the patient
        $this->validate($request, [
            'name' => 'required|string|max:150',
            'birthday' => 'required|date',
            'contact_no' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nic' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('patients')->ignore($id),
            ],
            'notes' => 'nullable|string',
        ]);
        $this->patientService->updatePatient($id, $request->all());
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully');
    }

    public function destroy($id)
    {
        $this->patientService->deletePatient($id);
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $patients = Patient::where('name', 'LIKE', "%$query%")->get();

        return response()->json($patients);
    }
}
