<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.kategori', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'color' => 'required|string|max:50',
        ]);
    
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'color' => $request->color,
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $request->id,
            'color' => 'required|string|max:50',
        ]);
    
        $category = Category::findOrFail($request->id);
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'color' => $request->color,
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id): RedirectResponse
    {
        $category = Category::findOrFail($id);

        // Hapus semua postingan yang terkait dengan kategori ini
        $category->posts()->delete();
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori dan semua postingan terkait berhasil dihapus.');
    }
}
