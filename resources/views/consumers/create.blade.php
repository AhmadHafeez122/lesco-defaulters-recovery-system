@extends('layouts.app')

@section('content')
<div class="header" style="margin-bottom: 20px;">
    <h1 style="margin:0; color:#006633;">Add New Defaulter</h1>
    <a href="{{ route('consumers.index') }}" style="color: #003399; text-decoration: none;">&larr; Back to List</a>
</div>

<div style="background: white; border: 1px solid #ccc; padding: 30px; max-width: 600px;">

    @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('consumers.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label style="display:block; font-weight:bold; margin-bottom:5px;">Reference Number</label>
            <input type="text" name="reference_no" value="{{ old('reference_no') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display:block; font-weight:bold; margin-bottom:5px;">Circle</label>
            <input type="text" name="circle" value="{{ old('circle') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>
        </div>

        <div style="display: flex; gap: 20px; margin-bottom: 15px;">
            <div style="flex: 1;">
                <label style="display:block; font-weight:bold; margin-bottom:5px;">Tariff Type</label>
                <select name="tariff_type" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>
                    <option value="DOM" {{ old('tariff_type') == 'DOM' ? 'selected' : '' }}>Domestic (DOM)</option>
                    <option value="IND" {{ old('tariff_type') == 'IND' ? 'selected' : '' }}>Industrial (IND)</option>
                    <option value="COM" {{ old('tariff_type') == 'COM' ? 'selected' : '' }}>Commercial (COM)</option>
                    <option value="AGRI" {{ old('tariff_type') == 'AGRI' ? 'selected' : '' }}>Agriculture (AGRI)</option>
                    <option value="OTHER" {{ old('tariff_type') == 'OTHER' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div style="flex: 1;">
                <label style="display:block; font-weight:bold; margin-bottom:5px;">Status</label>
                <select name="status" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>
                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Disconnected" {{ old('status') == 'Disconnected' ? 'selected' : '' }}>Disconnected</option>
                </select>
            </div>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display:block; font-weight:bold; margin-bottom:5px;">Consumer Type</label>
            <select name="consumer_type" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>
                <option value="Private" {{ old('consumer_type') == 'Private' ? 'selected' : '' }}>Private</option>
                <option value="Govt" {{ old('consumer_type') == 'Govt' ? 'selected' : '' }}>Government</option>
            </select>
        </div>

        <div style="display: flex; gap: 20px; margin-bottom: 20px;">
            <div style="flex: 1;">
                <label style="display:block; font-weight:bold; margin-bottom:5px;">Outstanding Amount (Rs)</label>
                <input type="number" step="0.01" name="outstanding_amount" value="{{ old('outstanding_amount') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>
            </div>

            <div style="flex: 1;">
                <label style="display:block; font-weight:bold; margin-bottom:5px;">Revenue Recovered (Rs)</label>
                <input type="number" step="0.01" name="revenue_recovered" value="{{ old('revenue_recovered', '0.00') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc;">
            </div>
        </div>

        <button type="submit" style="background: #006633; color: white; padding: 12px 20px; border: none; cursor: pointer; font-weight: bold; width: 100%;">
            Save Record
        </button>
    </form>
</div>
@endsection
