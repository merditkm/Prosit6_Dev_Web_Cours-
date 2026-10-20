<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::where('user_id', auth()->id())->get();
        return view('documents.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'file' => 'required|file|mimes:pdf,docx,doc,png,jpg|max:2048',
        ]);

        $path = $request->file('file')->store('documents', 'public');

        Document::create([
            'title' => $request->title,
            'path' => $path,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('documents.index')->with('success', 'Document ajouté.');
    }

    public function destroy(Document $document)
    {
        if ($document->user_id !== auth()->id()) {
            abort(403);
        }

        Storage::disk('public')->delete($document->path);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Document supprimé.');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $documents = Document::where('user_id', auth()->id())
            ->where('title', 'LIKE', "%{$query}%")
            ->get();

        return view('documents.index', compact('documents'));
    }
}