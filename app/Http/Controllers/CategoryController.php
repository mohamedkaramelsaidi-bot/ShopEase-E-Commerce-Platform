<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cat = Category::all();
        return view('categories.index', compact('cat'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:100'],
        ]);

        Category::create($validated);

        return redirect()->route('categories.index');
    }

    public function show(string $id)
    {
        $cat = Category::findOrFail($id);
        return view('categories.show', compact('cat'));
    }

    public function edit(string $id)
    {
        $cat = Category::findOrFail($id);
        return view('categories.edit', compact('cat'));
    }

    public function update(Request $request, string $id)
    {
        $cat = Category::findOrFail($id);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:100'],
        ]);

        $cat->update($validated);

        return redirect()->route('categories.index')->with('successful', 'updated');
    }

    public function destroy(string $id)
    {
        $cat = Category::findOrFail($id);
        $cat->delete();

        return redirect()->route('categories.index');
    }
}
