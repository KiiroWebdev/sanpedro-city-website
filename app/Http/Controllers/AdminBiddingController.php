<?php

namespace App\Http\Controllers;

use App\Models\Bidding;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBiddingController extends Controller
{
    private function checkAdmin()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $biddings = Bidding::latest()->get();

        return view('admin.biddings.index', compact('biddings'));
    }

    public function create()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        return view('admin.biddings.create');
    }

    public function store(Request $request)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'reference_no' => 'nullable|string|max:255',
            'type' => 'required|in:Invitation to Bid,Request for Quotation,Notice of Award,Other',
            'description' => 'nullable|string',
            'abc' => 'nullable|numeric|min:0',
            'procurement_mode' => 'nullable|string|max:255',
            'posting_date' => 'nullable|date',
            'submission_deadline' => 'nullable|date',
            'opening_date' => 'nullable|date',
            'venue' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,closed',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        Bidding::create($validated);

        return redirect()
            ->route('admin.biddings.index')
            ->with('success', 'Bidding notice added successfully.');
    }

    public function edit(Bidding $bidding)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        return view('admin.biddings.edit', compact('bidding'));
    }

    public function update(Request $request, Bidding $bidding)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'reference_no' => 'nullable|string|max:255',
            'type' => 'required|in:Invitation to Bid,Request for Quotation,Notice of Award,Other',
            'description' => 'nullable|string',
            'abc' => 'nullable|numeric|min:0',
            'procurement_mode' => 'nullable|string|max:255',
            'posting_date' => 'nullable|date',
            'submission_deadline' => 'nullable|date',
            'opening_date' => 'nullable|date',
            'venue' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,closed',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($validated['status'] === 'published' && !$bidding->published_at) {
            $validated['published_at'] = now();
        }

        if ($validated['status'] !== 'published') {
            $validated['published_at'] = null;
        }

        $bidding->update($validated);

        return redirect()
            ->route('admin.biddings.index')
            ->with('success', 'Bidding notice updated successfully.');
    }

    public function destroy(Bidding $bidding)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $bidding->delete();

        return redirect()
            ->route('admin.biddings.index')
            ->with('success', 'Bidding notice deleted successfully.');
    }
}