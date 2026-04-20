<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        $now = Carbon::now();
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();
        $sixMonthsAgo = $now->copy()->subMonths(5)->startOfMonth();

        // Hitung total pemasukan dan pengeluaran bulan ini
        $statistics = Transaction::selectRaw('
            SUM(CASE WHEN type = "pemasukan" THEN amount ELSE 0 END) as total_income,
            SUM(CASE WHEN type = "pengeluaran" THEN amount ELSE 0 END) as total_expense,
            SUM(CASE WHEN type = "pemasukan" AND date >= ? AND date <= ? THEN amount ELSE 0 END) as current_month_income,
            SUM(CASE WHEN type = "pengeluaran" AND date >= ? AND date <= ? THEN amount ELSE 0 END) as current_month_expense
        ', [$startOfMonth, $endOfMonth, $startOfMonth, $endOfMonth])->first();

        $totalIncome = $statistics->total_income ?? 0;
        $totalExpense = $statistics->total_expense ?? 0;
        $currentMonthIncome = $statistics->current_month_income ?? 0;
        $currentMonthExpense = $statistics->current_month_expense ?? 0;

        // Chart data periodik 6 bulan terakhir
        $monthlyTransactions = Transaction::where('date', '>=', $sixMonthsAgo)
            ->selectRaw('YEAR(date) as year, MONTH(date) as month, type, SUM(amount) as total')
            ->groupBy('year', 'month', 'type')
            ->get();

        $chartData = [
            'labels' => [],
            'income' => [],
            'expense' => [],
            'max_value' => 1
        ];

        $allValues = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthName = $month->translatedFormat('F');
            $year = $month->year;
            $monthNum = $month->month;

            $income = $monthlyTransactions->where('year', $year)->where('month', $monthNum)->where('type', 'pemasukan')->sum('total');
            $expense = $monthlyTransactions->where('year', $year)->where('month', $monthNum)->where('type', 'pengeluaran')->sum('total');

            $chartData['labels'][] = $monthName;
            $chartData['income'][] = (float) $income;
            $chartData['expense'][] = (float) $expense;

            $allValues[] = $income;
            $allValues[] = $expense;
        }

        $allValuesMax = count($allValues) > 0 ? max($allValues) : 0;
        $chartData['max_value'] = $allValuesMax > 0 ? $allValuesMax : 1;

        return view('dashboard', compact(
            'totalIncome',
            'totalExpense',
            'currentMonthIncome',
            'currentMonthExpense',
            'chartData'
        ));
    }
}
