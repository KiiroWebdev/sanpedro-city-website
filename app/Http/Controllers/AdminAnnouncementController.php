<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminAnnouncementController extends Controller
{
    public function index()
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $announcements = Announcement::latest()->paginate(10);

        return view('admin.announcements.index', compact('announcements'));
    }

    public function create()
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        return view('admin.announcements.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'category' => ['required', 'string', 'max:100'],
            'author' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $originalSlug = $validated['slug'];
        $counter = 1;

        while (Announcement::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        if (empty($validated['author'])) {
            $validated['author'] = session('admin_name');
        }

        if (
            $validated['status'] === 'published' &&
            empty($validated['published_at'])
        ) {
            $validated['published_at'] = now();
        }

        if ($validated['status'] === 'draft') {
            $validated['published_at'] = null;
        }

        Announcement::create($validated);

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Announcement created successfully.');
    }

    public function edit(Announcement $announcement)
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        return view(
            'admin.announcements.edit',
            compact('announcement')
        );
    }

    public function update(
        Request $request,
        Announcement $announcement
    ) {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'category' => ['required', 'string', 'max:100'],
            'author' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
        ]);

        $newSlug = Str::slug($validated['title']);

        $originalSlug = $newSlug;
        $counter = 1;

        while (
            Announcement::where('slug', $newSlug)
                ->where('id', '!=', $announcement->id)
                ->exists()
        ) {
            $newSlug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $newSlug;

        if (empty($validated['author'])) {
            $validated['author'] = session('admin_name');
        }

        if (
            $validated['status'] === 'published' &&
            empty($validated['published_at'])
        ) {
            $validated['published_at'] =
                $announcement->published_at ?? now();
        }

        if ($validated['status'] === 'draft') {
            $validated['published_at'] = null;
        }

        $announcement->update($validated);

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        $announcement->delete();

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Announcement deleted successfully.');
    }
}