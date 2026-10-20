<?php

namespace App\Http\Controllers;

use App\Models\JobOpportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminJobOpportunityController extends Controller
{
    public function index()
    {
        $jobs = JobOpportunity::latest('created_at')->paginate(10);

        return view('admin.job-opportunities.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.job-opportunities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'office' => ['nullable', 'string', 'max:255'],
            'employment_type' => ['nullable', 'string', 'max:255'],
            'salary_grade' => ['nullable', 'string', 'max:255'],
            'qualification' => ['nullable', 'string'],
            'duties' => ['nullable', 'string'],
            'application_requirements' => ['nullable', 'string'],
            'how_to_apply' => ['nullable', 'string'],
            'posting_date' => ['nullable', 'date'],
            'application_deadline' => ['nullable', 'date'],
            'status' => ['required', 'in:draft,published,closed'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        JobOpportunity::create($validated);

        return redirect()
            ->route('admin.job-opportunities.index')
            ->with('success', 'Job opportunity created successfully.');
    }

    public function edit(JobOpportunity $jobOpportunity)
    {
        return view(
            'admin.job-opportunities.edit',
            compact('jobOpportunity')
        );
    }

    public function update(Request $request, JobOpportunity $jobOpportunity)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'office' => ['nullable', 'string', 'max:255'],
            'employment_type' => ['nullable', 'string', 'max:255'],
            'salary_grade' => ['nullable', 'string', 'max:255'],
            'qualification' => ['nullable', 'string'],
            'duties' => ['nullable', 'string'],
            'application_requirements' => ['nullable', 'string'],
            'how_to_apply' => ['nullable', 'string'],
            'posting_date' => ['nullable', 'date'],
            'application_deadline' => ['nullable', 'date'],
            'status' => ['required', 'in:draft,published,closed'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $jobOpportunity->update($validated);

        return redirect()
            ->route('admin.job-opportunities.index')
            ->with('success', 'Job opportunity updated successfully.');
    }

    public function destroy(JobOpportunity $jobOpportunity)
    {
        $jobOpportunity->delete();

        return redirect()
            ->route('admin.job-opportunities.index')
            ->with('success', 'Job opportunity deleted successfully.');
    }
}