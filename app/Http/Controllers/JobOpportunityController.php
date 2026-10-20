<?php

namespace App\Http\Controllers;

use App\Models\JobOpportunity;

class JobOpportunityController extends Controller
{
    public function index()
    {
        $jobs = JobOpportunity::where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where(function ($query) {
                $query->whereNull('application_deadline')
                    ->orWhere('application_deadline', '>=', today());
            })
            ->orderByDesc('posting_date')
            ->paginate(10);

        return view('job-opportunities.index', compact('jobs'));
    }

    public function show($slug)
    {
        $job = JobOpportunity::where('slug', $slug)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        return view('job-opportunities.show', compact('job'));
    }
}