@extends('layouts.app')

@section('title', 'Export Reports - LESCO EMS')

@section('content')
<div class="header">
    <div>
        <h1>Export & Report Generation</h1>
        <p>Generate secure PDF billing summaries of filtered defaulter lists.</p>
    </div>
</div>

<div class="card" style="max-width: 500px;">
    <div class="card-header">
        <h3>Filter Report Data</h3>
    </div>

    <form action="{{ route('exports.download') }}" method="GET">
        <div style="margin-bottom: 15px;">
            <label style="display:block; margin-bottom:5px; font-weight:bold;">Select Circle</label>
            <select name="circle" style="width: 100%; padding: 10px; border: 1px solid var(--line);">
                <option value="All">All Circles</option>
                @foreach($circles as $circle)
                    <option value="{{ $circle }}">{{ $circle }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display:block; margin-bottom:5px; font-weight:bold;">Select Status</label>
            <select name="status" style="width: 100%; padding: 10px; border: 1px solid var(--line);">
                <option value="All">All Statuses</option>
                @foreach($statuses as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" style="width: 100%; padding: 12px; background: var(--primary); color: white; border: none; font-weight: bold; cursor: pointer; font-size: 16px; border-radius: 4px;">
            <i class="fa-solid fa-file-pdf"></i> Generate PDF Report
        </button>
    </form>
</div>
@endsection
