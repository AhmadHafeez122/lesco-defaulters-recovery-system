<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defaulter extends Model
{
    use HasFactory;

    // Database columns allowed for mass assignment
    protected $fillable = [
        'reference_no',
        'circle',
        'tariff_type',
        'status',
        'consumer_type',
        'outstanding_amount',
        'revenue_recovered'
    ];
}
