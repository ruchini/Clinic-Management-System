<?php

// app/Http/Controllers/RevenueReportController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillPayment;
use App\Models\Patient;

class RevenueReportController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('name', 'asc')->get();
        return view('dashboard', compact('patients'));
    }

    public function generateReport(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $revenueData = BillPayment::whereBetween('payment_date', [$startDate, $endDate])
            ->sum('amount');

        $patients = Patient::orderBy('name', 'asc')->get();
        return view('dashboard', compact('revenueData', 'startDate', 'endDate', 'patients'));
    }
}
