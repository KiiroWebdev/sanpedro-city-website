<?php

namespace App\Http\Controllers;

use App\Models\DownloadDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\GovernmentServiceController;

class AdminDownloadController extends Controller
{
    private function checkAdmin()
    {
        if (!session('admin_id')) {
            return redirect()->route('admin.login');
        }

        return null;
    }

    private function categories(): array
    {
        return [
            'application-forms' => 'Application Forms',
            'government-documents' => 'Government Documents',
            'citizens-charter' => "Citizen's Charter",
            'policies-ordinances' => 'Policies & Ordinances',
            'other' => 'Other Downloads',
        ];
    }

   private function services(): array
{
    return (new GovernmentServiceController)->serviceOptions();
}

    public function index()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $documents = DownloadDocument::latest()->get();

        return view('admin.downloads.index', [
            'documents' => $documents,
            'categories' => $this->categories(),
        ]);
    }

   public function create()
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    return view('admin.downloads.create', [
        'categories' => $this->categories(),
        'services' => $this->services(),
    ]);
}

    public function store(Request $request)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:' . implode(',', array_keys($this->categories())),
'service_slug' => 'nullable|string|in:' . implode(',', array_keys($this->services())),
'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip|max:20480',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);

        $file = $request->file('file');

        $filename = Str::slug($validated['title'])
            . '-' . time()
            . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs(
            'downloads/' . $validated['category'],
            $filename,
            'public'
        );

        DownloadDocument::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . time(),
            'category' => $validated['category'],
            'description' => $validated['description'] ?? null,
            'file_path' => $path,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'status' => $validated['status'],
            'published_at' => $validated['status'] === 'published'
                ? ($validated['published_at'] ?? now())
                : null,
        ]);

        return redirect()
            ->route('admin.downloads.index')
            ->with('success', 'Document uploaded successfully.');
    }
    public function edit(DownloadDocument $download)
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    return view('admin.downloads.edit', [
    'download' => $download,
    'categories' => $this->categories(),
    'services' => $this->services(),
]);
}
public function update(Request $request, DownloadDocument $download)
{
    if ($redirect = $this->checkAdmin()) {
        return $redirect;
    }

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string|in:' . implode(',', array_keys($this->categories())),
'service_slug' => 'nullable|string|in:' . implode(',', array_keys($this->services())),
'description' => 'nullable|string',
        'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip|max:20480',
        'status' => 'required|in:draft,published',
        'published_at' => 'nullable|date',
    ]);

    $data = [
        'title' => $validated['title'],
        'category' => $validated['category'],
'service_slug' => $validated['service_slug'] ?? null,
'description' => $validated['description'] ?? null,
        'status' => $validated['status'],
        'published_at' => $validated['status'] === 'published'
            ? ($validated['published_at'] ?? $download->published_at ?? now())
            : null,
    ];

    if ($request->hasFile('file')) {

        if ($download->file_path) {
            Storage::disk('public')->delete($download->file_path);
        }

        $file = $request->file('file');

        $filename = Str::slug($validated['title'])
            . '-' . time()
            . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs(
            'downloads/' . $validated['category'],
            $filename,
            'public'
        );

        $data['file_path'] = $path;
        $data['file_name'] = $file->getClientOriginalName();
        $data['file_size'] = $file->getSize();
    }

    $download->update($data);

    return redirect()
        ->route('admin.downloads.index')
        ->with('success', 'Document updated successfully.');
}
    public function destroy(DownloadDocument $download)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        if ($download->file_path) {
            Storage::disk('public')->delete($download->file_path);
        }

        $download->delete();

        return redirect()
            ->route('admin.downloads.index')
            ->with('success', 'Document deleted successfully.');
    }
}