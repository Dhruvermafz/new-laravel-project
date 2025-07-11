<?php
namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\Category;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $selected = $request->get('category');

        $notes = Note::with('category')
            ->when($selected, fn($q) => $q->where('category_id', $selected))
            ->latest()->get();

        return view('notes.index', compact('notes', 'categories', 'selected'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'nullable',
            'category_id' => 'required|exists:categories,id',
        ]);

        Note::create($request->only('title', 'body', 'category_id'));
        return redirect()->route('notes.index');
    }

    public function destroy($id)
    {
        Note::findOrFail($id)->delete();
        return redirect()->route('notes.index');
    }
}