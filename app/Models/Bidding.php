<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bidding extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'reference_no',
        'type',
        'description',
        'abc',
        'procurement_mode',
        'posting_date',
        'submission_deadline',
        'opening_date',
        'venue',
        'contact_person',
        'contact_email',
        'contact_phone',
        'status',
        'published_at',
    ];

    protected $casts = [
        'abc' => 'decimal:2',
        'posting_date' => 'date',
        'submission_deadline' => 'datetime',
        'opening_date' => 'datetime',
        'published_at' => 'datetime',
    ];

    public function documents(): HasMany
{
    return $this->hasMany(BiddingDocument::class);
}
}