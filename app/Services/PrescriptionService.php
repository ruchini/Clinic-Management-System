<?php

namespace App\Services;

use App\Models\Prescription;

class PrescriptionService
{
    public function getAllPrescriptions()
    {
        return Prescription::all();
    }

    public function getPrescriptionById($id)
    {
        return Prescription::findOrFail($id);
    }

    public function createPrescription($data)
    {
        return Prescription::create($data);
    }

    public function updatePrescription($id, $data)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->update($data);
        return $prescription;
    }

    public function deletePrescription($id)
    {
        $prescription = Prescription::findOrFail($id);
        $prescription->delete();
    }
}
