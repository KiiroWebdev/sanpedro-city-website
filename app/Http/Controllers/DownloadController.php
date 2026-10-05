<?php

namespace App\Http\Controllers;
use App\Models\DownloadDocument;
class DownloadController extends Controller
{
    private function categories(): array
    {
        return [

            'application-forms' => [
                'name' => 'Application Forms',
                'description' => 'Forms used for various applications and transactions with the City Government.',
                'icon' => 'bi-file-earmark-text',
            ],

            'government-documents' => [
                'name' => 'Government Documents',
                'description' => 'Official documents and publications released by the City Government.',
                'icon' => 'bi-file-earmark-pdf',
            ],

            'citizens-charter' => [
                'name' => "Citizen's Charter",
                'description' => "Citizen's Charter documents describing government services and procedures.",
                'icon' => 'bi-book',
            ],

            'policies-ordinances' => [
                'name' => 'Policies & Ordinances',
                'description' => 'Local policies, ordinances, resolutions, and related documents.',
                'icon' => 'bi-journal-text',
            ],

            'other' => [
                'name' => 'Other Downloads',
                'description' => 'Other publicly available forms and resources from the City Government.',
                'icon' => 'bi-folder',
            ],

        ];
    }

    public function index()
    {
        $categories = $this->categories();

        return view('downloads.index', compact('categories'));
    }

    public function show(string $slug)
{
    $categories = $this->categories();

    abort_unless(isset($categories[$slug]), 404);

    $category = $categories[$slug];

    $documents = DownloadDocument::where('category', $slug)
        ->where('status', 'published')
        ->where(function ($query) {
            $query->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
        })
        ->latest('published_at')
        ->latest()
        ->get();

    return view(
        'downloads.show',
        compact('category', 'slug', 'documents')
    );
}
}