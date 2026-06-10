<?php

namespace App\Http\Controllers;

use App\Models\Defaulter;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    // 1. Show the Export Form UI
    public function index()
    {
        // Get unique circles and statuses to populate the dropdown menus dynamically
        $circles = Defaulter::select('circle')->distinct()->pluck('circle');
        $statuses = Defaulter::select('status')->distinct()->pluck('status');

        return view('exports.index', compact('circles', 'statuses'));
    }

    // 2. Handle the Data Filtering and PDF Generation
    public function download(Request $request)
    {
        $validated = $request->validate([
            'circle' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'string', 'max:255'],
        ]);

        $query = Defaulter::query();

        if (!empty($validated['circle']) && $validated['circle'] !== 'All') {
            $query->where('circle', $validated['circle']);
        }

        if (!empty($validated['status']) && $validated['status'] !== 'All') {
            $query->where('status', $validated['status']);
        }

        $defaulters = $query->orderBy('outstanding_amount', 'desc')->get();

        $totalAmount  = $defaulters->sum('outstanding_amount');
        $totalRecords = $defaulters->count();

        // Only pass the filtered values — never the raw $request object
        $filters = [
            'circle' => $validated['circle'] ?? 'All',
            'status' => $validated['status'] ?? 'All',
        ];

        $pdf = Pdf::loadView('exports.pdf', compact(
            'defaulters', 'totalAmount', 'totalRecords', 'filters'
        ));

        $filename = sprintf(
            '%s_Defaulters_Report_%s.pdf',
            config('app.name', 'LESCO'),
            now()->format('Y-m-d_H-i')
        );

        return $pdf->download($filename);
    }
}
