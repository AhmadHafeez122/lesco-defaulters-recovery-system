<?php

namespace App\Http\Controllers;

use App\Models\Defaulter;
use Illuminate\Http\Request;

class DefaulterController extends Controller
{
    public function index(Request $request)
    {
        $query = Defaulter::query();

        // Advanced Multi-Column Search Filter
        if ($request->filled('search')) {
            $searchTerm = trim($request->search);
            $query->where(function($q) use ($searchTerm) {
                $q->where('reference_no', 'like', "%{$searchTerm}%")
                  ->orWhere('circle', 'like', "%{$searchTerm}%")
                  ->orWhere('tariff_type', 'like', "%{$searchTerm}%")
                  ->orWhere('status', 'like', "%{$searchTerm}%")
                  ->orWhere('consumer_type', 'like', "%{$searchTerm}%");
            });
        }

        // Standardized 50 items pagination tracking
        $defaulters = $query->latest()->paginate(50)->withQueryString();

        return view('consumers.index', compact('defaulters'));
    }

    public function create()
    {
        return view('consumers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reference_no'       => 'required|unique:defaulters,reference_no',
            'circle'             => 'required|string|max:255',
            'tariff_type'        => 'required|in:DOM,IND,AGRI,COM,OTHER',
            'status'             => 'required|in:Active,Disconnected',
            'consumer_type'      => 'required|in:Private,Govt',
            'outstanding_amount' => 'required|numeric|min:0',
            'revenue_recovered'  => 'nullable|numeric|min:0',
        ]);

        // Default value handling if left empty by the user
        $validated['revenue_recovered'] = $validated['revenue_recovered'] ?? 0;

        Defaulter::create($validated);

        return redirect()->route('consumers.index')->with('success', 'New record added to database successfully.');
    }

    public function edit(int $id)
    {
        // Explicit lookup prevents route binding drop-out bugs
        $consumer = Defaulter::findOrFail($id);
        return view('consumers.edit', compact('consumer'));
    }

    public function update(Request $request, int $id)
    {
        $consumer = Defaulter::findOrFail($id);

        $validated = $request->validate([
            'reference_no'       => 'required|unique:defaulters,reference_no,' . $consumer->id,
            'circle'             => 'required|string|max:255',
            'tariff_type'        => 'required|in:DOM,IND,AGRI,COM,OTHER',
            'status'             => 'required|in:Active,Disconnected',
            'consumer_type'      => 'required|in:Private,Govt',
            'outstanding_amount' => 'required|numeric|min:0',
            'revenue_recovered'  => 'nullable|numeric|min:0',
        ]);

        $validated['revenue_recovered'] = $validated['revenue_recovered'] ?? 0;

        $consumer->update($validated);

        return redirect()->route('consumers.index')->with('success', 'Database record updated successfully.');
    }

    public function destroy(int $id)
    {
        // Explicit lookup ensures deletion directly from the database table
        $consumer = Defaulter::findOrFail($id);
        $consumer->delete();

        return redirect()->route('consumers.index')->with('success', 'Record permanently deleted from database.');
    }
}
