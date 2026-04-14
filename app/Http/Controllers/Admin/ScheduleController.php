<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule; // <-- PENTING: Impor model Schedule
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data jadwal, urutkan berdasarkan tanggal dari yang terbaru
        $schedules = Schedule::latest('date')->get();

        return view('admin.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Untuk form jadwal, kita tidak butuh data tambahan, jadi langsung tampilkan view
        return view('admin.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|in:khatib_jumat,pengajian_rutin',
            'title' => 'required|string|max:255',
            'speaker_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'nullable|string',
        ]);

        Schedule::create($validatedData);

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        // Kirim data jadwal yang spesifik ke view edit
        return view('admin.schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validatedData = $request->validate([
            'type' => 'required|in:khatib_jumat,pengajian_rutin',
            'title' => 'required|string|max:255',
            'speaker_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'nullable|string',
        ]);

        $schedule->update($validatedData);

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
