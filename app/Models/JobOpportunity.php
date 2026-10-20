<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOpportunity extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'office',
        'employment_type',
        'salary_grade',
        'qualification',
        'duties',
        'application_requirements',
        'how_to_apply',
        'posting_date',
        'application_deadline',
        'status',
        'published_at',
    ];

    protected $casts = [
        'posting_date' => 'date',
        'application_deadline' => 'date',
        'published_at' => 'datetime',
    ];
}