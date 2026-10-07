<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadDocument extends Model
{
   protected $fillable = [
    'title',
    'slug',
    'category',
    'service_slug',
    'description',
    'file_path',
    'file_name',
    'file_size',
    'status',
    'published_at',
];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}