<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cashbook;
use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Menampilkan halaman formulir pilihan laporan.
     */
    public function index()
    {
        // Ambil semua data yang dibutuhkan untuk mengisi dropdown di form
        $cashbooks = Cashbook::all();
        $categories = Category::all();

        return view('admin.reports.index', compact('cashbooks', 'categories'));
    }

    /**
     * Memproses formulir dan menghasilkan laporan.
     */
    public function generate(Request $request)
    {
        $request->validate([
            'report_type' => 'required|in:monthly,weekly,category',
            'cashbook_id' => 'required|exists:cashbooks,id',
        ]);

        $reportType = $request->input('report_type');
        $cashbookId = $request->input('cashbook_id');
        $cashbook = Cashbook::findOrFail($cashbookId);

        $transactions = null;
        $period = '';

        // Logika berdasarkan Jenis Laporan yang dipilih
        if ($reportType === 'monthly') {
            $request->validate([
                'month' => 'required|integer|min:1|max:12',
                'year' => 'required|integer',
            ]);

            $month = $request->input('month');
            $year = $request->input('year');

            $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
            $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();
            $period = 'Bulan ' . $startDate->translatedFormat('F Y');

            $transactions = Transaction::where('cashbook_id', $cashbookId)
                ->whereBetween('date', [$startDate, $endDate])
                ->orderBy('date', 'asc')
                ->get();

        } elseif ($reportType === 'weekly' || $reportType === 'category') {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);

            $startDate = Carbon::parse($request->input('start_date'));
            $endDate = Carbon::parse($request->input('end_date'));
            $period = 'Periode ' . $startDate->format('d M Y') . ' - ' . $endDate->format('d M Y');

            $query = Transaction::where('cashbook_id', $cashbookId)
                        ->whereBetween('date', [$startDate, $endDate]);

            if ($reportType === 'category') {
                $request->validate(['category_id' => 'required|exists:categories,id']);
                $categoryId = $request->input('category_id');
                $query->where('category_id', $categoryId);
                $category = Category::find($categoryId);
                $period .= ' (Kategori: ' . $category->name . ')';
            }

            $transactions = $query->orderBy('date', 'asc')->get();
        }

        // Hitung Saldo Awal pada periode yang dipilih
        $initialBalance = $cashbook->starting_balance +
            Transaction::where('cashbook_id', $cashbookId)
                ->where('date', '<', $startDate)
                ->sum('amount'); // Asumsi pemasukan positif, pengeluaran negatif (perlu disesuaikan jika tidak)

        // Jika model Anda memisahkan pemasukan/pengeluaran, gunakan ini:
        $incomeBefore = Transaction::where('cashbook_id', $cashbookId)->where('type', 'pemasukan')->where('date', '<', $startDate)->sum('amount');
        $expenseBefore = Transaction::where('cashbook_id', $cashbookId)->where('type', 'pengeluaran')->where('date', '<', $startDate)->sum('amount');
        $initialBalance = $cashbook->starting_balance + $incomeBefore - $expenseBefore;


        // Hitung total untuk periode yang dipilih
        $totalIncome = $transactions->where('type', 'pemasukan')->sum('amount');
        $totalExpense = $transactions->where('type', 'pengeluaran')->sum('amount');
        $endingBalance = $initialBalance + $totalIncome - $totalExpense;

        return view('admin.reports.result', compact(
            'transactions',
            'cashbook',
            'period',
            'initialBalance',
            'totalIncome',
            'totalExpense',
            'endingBalance'
        ));
    }
}
