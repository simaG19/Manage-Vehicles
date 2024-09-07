<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show()
    {
        // Logic to fetch and display the report
        $filePath = storage_path('app/reports/new_users_report.csv');
        
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->back()->with('error', 'Report not found.');
    }
}
