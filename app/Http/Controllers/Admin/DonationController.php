<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::latest()->paginate(20);
        return view('admin.donations.index', compact('donations'));
    }

    public function create()
    {
        return view('admin.donations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'donor_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'type' => 'required|in:tunai,non-tunai',
            'note' => 'nullable|string',
            'proof' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('proof')) {
            $path = $request->file('proof')->store('proofs', 'public');
            $validated['proof'] = $path;
        }

        Donation::create($validated);

        return redirect()->route('admin.donations.index')->with('success', 'Data donasi berhasil ditambahkan.');
    }

    public function edit(Donation $donation)
    {
        return view('admin.donations.edit', compact('donation'));
    }

    public function update(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'donor_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'type' => 'required|in:tunai,non-tunai',
            'note' => 'nullable|string',
            'proof' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('proof')) {
            if ($donation->proof) {
                Storage::disk('public')->delete($donation->proof);
            }
            $path = $request->file('proof')->store('proofs', 'public');
            $validated['proof'] = $path;
        }

        $donation->update($validated);

        return redirect()->route('admin.donations.index')->with('success', 'Data donasi berhasil diperbarui.');
    }

    public function destroy(Donation $donation)
    {
        if ($donation->proof) {
            Storage::disk('public')->delete($donation->proof);
        }

        $donation->delete();

        return redirect()->route('admin.donations.index')->with('success', 'Data donasi berhasil dihapus.');
    }
}
