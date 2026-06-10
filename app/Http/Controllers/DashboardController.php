<?php

namespace App\Http\Controllers;

use App\Models\Defaulter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Total KPI Metrics
        $totalDefaulters = Defaulter::count();
        $totalOutstanding = Defaulter::sum('outstanding_amount');

        // Average amount protection against division by zero
        $avgOutstanding = $totalDefaulters > 0 ? $totalOutstanding / $totalDefaulters : 0;

        // 2. Defaulters by Circle (Bar Chart Data)
        $byCircle = Defaulter::select('circle', DB::raw('count(*) as count'), DB::raw('sum(outstanding_amount) as total_amount'))
            ->groupBy('circle')
            ->orderByDesc('count')
            ->get();

        // 3. Defaulters by Tariff (Donut Chart Data)
        $byTariff = Defaulter::select('tariff_type', DB::raw('count(*) as count'))
            ->groupBy('tariff_type')
            ->get();

        // 4. Defaulters by Status (Donut Chart Data)
        $byStatus = Defaulter::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        // 5. Defaulters by Type (Donut Chart Data)
        $byType = Defaulter::select('consumer_type', DB::raw('count(*) as count'))
            ->groupBy('consumer_type')
            ->get();

        return view('dashboard.analytics', compact(
            'totalDefaulters',
            'totalOutstanding',
            'avgOutstanding',
            'byCircle',
            'byTariff',
            'byStatus',
            'byType'
        ));
    }
}
