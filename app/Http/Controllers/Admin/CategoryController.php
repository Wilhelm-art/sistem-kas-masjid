<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cashbook;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('cashbook')->latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $cashbooks = Cashbook::all();
        return view('admin.categories.create', compact('cashbooks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cashbook_id' => 'required|exists:cashbooks,id',
            'name' => 'required|string|max:255|unique:categories,name',
            'type' => 'required|in:pemasukan,pengeluaran',
        ]);

        Category::create($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(Category $category)
    {
        $cashbooks = Cashbook::all();
        return view('admin.categories.edit', compact('category', 'cashbooks'));
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'cashbook_id' => 'required|exists:cashbooks,id',
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'type' => 'required|in:pemasukan,pengeluaran',
        ]);

        $category->update($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
