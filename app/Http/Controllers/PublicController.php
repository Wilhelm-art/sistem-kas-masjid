<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Cashbook;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function dashboard()
    {
        Carbon::setLocale('id');
        $reportData = [];
        $latestTransaction = Transaction::latest('date')->first();

        if ($latestTransaction) {
            $reportMonth = Carbon::parse($latestTransaction->date);
            $startDate = $reportMonth->copy()->startOfMonth();
            $endDate = $reportMonth->copy()->endOfMonth();

            $monthlyStats = Transaction::whereBetween('date', [$startDate, $endDate])
                ->selectRaw('
                    SUM(CASE WHEN type="pemasukan" THEN amount ELSE 0 END) as income,
                    SUM(CASE WHEN type="pengeluaran" THEN amount ELSE 0 END) as expense
                ')->first();

            $totalIncome = $monthlyStats->income ?? 0;
            $totalExpense = $monthlyStats->expense ?? 0;

            $overallStats = Transaction::selectRaw('
                SUM(CASE WHEN type="pemasukan" THEN amount ELSE 0 END) as total_income,
                SUM(CASE WHEN type="pengeluaran" THEN amount ELSE 0 END) as total_expense
            ')->first();

            $totalStartingBalance = Cashbook::sum('starting_balance');
            $endingBalance = $totalStartingBalance + ($overallStats->total_income ?? 0) - ($overallStats->total_expense ?? 0);

            $reportData = [
                'period' => 'Laporan Kas Bulan ' . $reportMonth->translatedFormat('F Y'),
                'totalIncome' => $totalIncome,
                'totalExpense' => $totalExpense,
                'endingBalance' => $endingBalance,
            ];
        }

        $schedules = Schedule::where('date', '>=', Carbon::today())
                            ->orderBy('date', 'asc')
                            ->take(3)
                            ->get();

        return view('pages.dashboard_public', compact('reportData', 'schedules'));
    }

    public function sejarah()
    {
        return view('pages.sejarah');
    }

    public function struktur()
    {
        return view('pages.struktur');
    }

    public function visimisi()
    {
        return view('pages.visimisi');
    }

    public function sedekah()
    {
        $donations = \App\Models\Donation::latest()->paginate(20);
        return view('pages.sedekah', compact('donations'));
    }
}
