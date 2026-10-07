<?php

namespace App\Http\Controllers;

use App\Models\Bidding;

class BiddingController extends Controller
{
    public function index()
    {
        $biddings = Bidding::where('status', 'published')
            ->orderByDesc('posting_date')
            ->get();

        return view('biddings.index', compact('biddings'));
    }

    public function show(string $slug)
    {
        $bidding = Bidding::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('biddings.show', compact('bidding'));
    }
}