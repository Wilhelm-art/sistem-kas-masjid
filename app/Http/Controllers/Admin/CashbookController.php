<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cashbook;
use Illuminate\Http\Request;

class CashbookController extends Controller
{
    public function index()
    {
        $cashbooks = Cashbook::latest()->get();
        return view('admin.cashbooks.index', compact('cashbooks'));
    }

    public function create()
    {
        return view('admin.cashbooks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:cashbooks,name',
            'description' => 'nullable|string',
            'starting_balance' => 'required|numeric',
        ]);

        Cashbook::create($validatedData);

        return redirect()->route('admin.cashbooks.index')->with('success', 'Buku Kas berhasil ditambahkan!');
    }

    public function edit(Cashbook $cashbook)
    {
        return view('admin.cashbooks.edit', compact('cashbook'));
    }

    public function update(Request $request, Cashbook $cashbook)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:cashbooks,name,' . $cashbook->id,
            'description' => 'nullable|string',
            'starting_balance' => 'required|numeric',
        ]);

        $cashbook->update($validatedData);

        return redirect()->route('admin.cashbooks.index')->with('success', 'Buku Kas berhasil diperbarui!');
    }

    public function destroy(Cashbook $cashbook)
    {
        $cashbook->delete();
        return redirect()->route('admin.cashbooks.index')->with('success', 'Buku Kas berhasil dihapus!');
    }
}
