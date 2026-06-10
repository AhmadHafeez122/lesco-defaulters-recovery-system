<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Defaulters Report</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #006633; padding-bottom: 10px; }
        .header h1 { color: #006633; margin: 0 0 5px 0; }
        .header p { margin: 0; color: #666; font-size: 14px; }

        .meta-info { margin-bottom: 20px; font-size: 11px; }
        .meta-info table { width: 100%; border: none; }
        .meta-info td { padding: 3px; }

        .data-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .data-table th, .data-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .data-table th { background-color: #f0f0f0; color: #333; }
        .data-table tr:nth-child(even) { background-color: #f9f9f9; }

        .amount { text-align: right !important; font-weight: bold; }
        .danger-text { color: #cc0000; }

        .summary { background-color: #006633; color: white; padding: 15px; text-align: right; border-radius: 4px; }
        .summary h2 { margin: 0; font-size: 20px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>LESCO EMS</h1>
        <p>Official Defaulters Billing Summary</p>
    </div>

    <div class="meta-info">
        <table>
            <tr>
                <td><strong>Generated On:</strong> {{ now()->format('F j, Y, g:i A') }}</td>
                <td style="text-align: right;"><strong>Filtered By Circle:</strong> {{ $filters['circle'] }}</td>
            </tr>
            <tr>
                <td><strong>Total Records:</strong> {{ number_format($totalRecords) }}</td>
                <td style="text-align: right;"><strong>Filtered By Status:</strong> {{ $filters['status'] }}</td>
            </tr>
        </table>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Reference No.</th>
                <th>Circle</th>
                <th>Tariff</th>
                <th>Type</th>
                <th>Status</th>
                <th class="amount">Outstanding (Rs)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($defaulters as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $row->reference_no }}</strong></td>
                <td>{{ $row->circle }}</td>
                <td>{{ $row->tariff_type }}</td>
                <td>{{ $row->consumer_type }}</td>
                <td>{{ $row->status }}</td>
                <td class="amount danger-text">{{ number_format($row->outstanding_amount, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        Total Outstanding Recovery:
        <h2>Rs. {{ number_format($totalAmount, 2) }}</h2>
    </div>

</body>
</html>
