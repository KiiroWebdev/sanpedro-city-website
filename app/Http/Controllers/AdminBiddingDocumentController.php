<?php

namespace App\Http\Controllers;

use App\Models\Bidding;
use App\Models\BiddingDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBiddingDocumentController extends Controller
{
    private function checkAdmin()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        return null;
    }

    public function store(Request $request, Bidding $bidding)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'document_type' => 'nullable|string|max:255',
            'document' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:20480',
        ]);

        $file = $request->file('document');

        $path = $file->store(
            'biddings/' . $bidding->id,
            'public'
        );

        BiddingDocument::create([
            'bidding_id' => $bidding->id,
            'title' => $validated['title'],
            'document_type' => $validated['document_type'] ?? null,
            'file_path' => $path,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
        ]);

        return redirect()
            ->route('admin.biddings.edit', $bidding)
            ->with('success', 'Bidding document uploaded successfully.');
    }

    public function destroy(Bidding $bidding, BiddingDocument $document)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        abort_unless($document->bidding_id === $bidding->id, 404);

        if ($document->file_path) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();

        return redirect()
            ->route('admin.biddings.edit', $bidding)
            ->with('success', 'Bidding document deleted successfully.');
    }
}