@extends('layouts.app')

@section('content')
<div class="header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <div>
        <h1 style="margin:0; color:#006633;">Defaulters Master Record</h1>
        <p style="margin:0; color:#666;">Manage, edit, and delete seeded consumer profiles.</p>
    </div>

    @if(auth()->check() && auth()->user()->isAdmin())
        <a href="{{ route('consumers.create') }}" style="background: #006633; color: white; padding: 10px 15px; text-decoration: none; border-radius: 3px; font-weight: bold;">
            <i class="fa-solid fa-plus"></i> Add Defaulter
        </a>
    @endif
</div>

@if(session('success'))
    <div style="background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif

<div style="background: white; border: 1px solid #ccc; padding: 20px;">
    <form method="GET" action="{{ route('consumers.index') }}" style="margin-bottom: 20px; display: flex; gap: 10px;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Reference No or Circle..." style="padding: 10px; width: 300px; border: 1px solid #ccc;">
        <button type="submit" style="padding: 10px 20px; background: #003399; color: white; border: none; cursor: pointer;">Search</button>
        <a href="{{ route('consumers.index') }}" style="padding: 10px 20px; background: #f0f0f0; color: #333; border: 1px solid #ccc; text-decoration: none;">Clear</a>
    </form>

    <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead style="background: #f0f0f0;">
            <tr>
                <th style="padding: 12px; border-bottom: 2px solid #ccc;">Reference No.</th>
                <th style="padding: 12px; border-bottom: 2px solid #ccc;">Circle</th>
                <th style="padding: 12px; border-bottom: 2px solid #ccc;">Tariff</th>
                <th style="padding: 12px; border-bottom: 2px solid #ccc;">Status</th>
                <th style="padding: 12px; border-bottom: 2px solid #ccc;">Outstanding</th>

                @if(auth()->check() && auth()->user()->isAdmin())
                    <th style="padding: 12px; border-bottom: 2px solid #ccc;">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($defaulters as $consumer)
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 12px; font-weight: bold;">{{ $consumer->reference_no }}</td>
                <td style="padding: 12px;">{{ $consumer->circle }}</td>
                <td style="padding: 12px;">{{ $consumer->tariff_type }}</td>
                <td style="padding: 12px;">
                    <span style="padding: 3px 8px; border-radius: 10px; font-size: 11px; color: white; background: {{ $consumer->status == 'Active' ? '#2ecc71' : '#e74c3c' }};">
                        {{ $consumer->status }}
                    </span>
                </td>
                <td style="padding: 12px; color: #cc0000; font-weight: bold;">Rs {{ number_format($consumer->outstanding_amount) }}</td>

                @if(auth()->check() && auth()->user()->isAdmin())
                    <td style="padding: 12px; display: flex; gap: 5px;">
                        <a href="{{ route('consumers.edit', $consumer->id) }}" style="padding: 5px 10px; background: #f0f0f0; border: 1px solid #ccc; color: #333; text-decoration: none; font-size: 12px;">Edit</a>

                        <form action="{{ route('consumers.destroy', $consumer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 5px 10px; background: #cc0000; border: 1px solid #990000; color: white; cursor: pointer; font-size: 12px;">Delete</button>
                        </form>
                    </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="100%" style="padding: 20px; text-align: center; color: #666;">No records found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $defaulters->links() }}
    </div>
</div>
@endsection
