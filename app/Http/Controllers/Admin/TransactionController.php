<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Category; // <-- PENTING: Impor model Category
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data transaksi, urutkan dari yang paling baru
        $transactions = Transaction::with('category.cashbook')->latest()->get();

        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua kategori untuk mengisi dropdown di form
        $categories = Category::with('cashbook')->get();

        return view('admin.transactions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:pemasukan,pengeluaran',
        ]);

        // Ambil cashbook_id dari kategori yang dipilih
        $category = Category::find($validatedData['category_id']);
        $validatedData['cashbook_id'] = $category->cashbook_id;

        Transaction::create($validatedData);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        // Ambil semua kategori untuk mengisi dropdown di form edit
        $categories = Category::with('cashbook')->get();

        return view('admin.transactions.edit', compact('transaction', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:pemasukan,pengeluaran',
        ]);

        // Update juga cashbook_id jika kategori berubah
        $category = Category::find($validatedData['category_id']);
        $validatedData['cashbook_id'] = $category->cashbook_id;

        $transaction->update($validatedData);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('admin.transactions.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
