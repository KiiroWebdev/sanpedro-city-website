<?php

namespace App\Http\Controllers;

use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
         $previousAnnouncement = Announcement::where('status', 'published')
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->where('published_at', '<', $announcement->published_at)
        ->orderByDesc('published_at')
        ->first();

    $nextAnnouncement = Announcement::where('status', 'published')
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->where('published_at', '>', $announcement->published_at)
        ->orderBy('published_at')
        ->first();

    return view('announcements.show', compact(
        'announcement',
        'previousAnnouncement',
        'nextAnnouncement'
    ));
}
public function show($slug)
{
    $announcement = Announcement::where('slug', $slug)
        ->where('status', 'published')
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->firstOrFail();

    $previousAnnouncement = Announcement::where('status', 'published')
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->where('published_at', '<', $announcement->published_at)
        ->orderByDesc('published_at')
        ->first();

    $nextAnnouncement = Announcement::where('status', 'published')
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->where('published_at', '>', $announcement->published_at)
        ->orderBy('published_at')
        ->first();

    return view('announcements.show', compact(
        'announcement',
        'previousAnnouncement',
        'nextAnnouncement'
    ));
}
}