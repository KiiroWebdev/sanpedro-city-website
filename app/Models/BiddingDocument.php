<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BiddingDocument extends Model
{
    protected $fillable = [
        'bidding_id',
        'title',
        'file_path',
        'file_name',
        'file_size',
        'document_type',
    ];

    public function bidding(): BelongsTo
    {
        return $this->belongsTo(Bidding::class);
    }
}