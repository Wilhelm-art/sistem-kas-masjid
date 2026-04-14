<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kas {{ $cashbook->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .no-print {
                display: none !important;
            }
            .print-container {
                box-shadow: none !important;
                border: none !important;
                padding: 0 !important;
                margin: 0 !important;
                max-width: 100% !important;
            }
            /* Pastikan background pada thead tetap tercetak */
            thead {
                background-color: #f9fafb !important;
            }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-4xl mx-auto p-4 sm:p-8">
        <div class="no-print mb-6 flex justify-between items-center">
            <a href="{{ route('admin.reports.index') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Pilihan Laporan</a>
            <button onclick="window.print()" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700">
                Cetak Laporan
            </button>
        </div>

        <div class="bg-white p-8 sm:p-12 rounded-lg shadow-lg print-container">
            <header class="text-center mb-6">
                <div class="flex justify-center items-center mb-4">
                     <img src="{{ asset('images/logo_attijaniyah.jpg') }}" alt="Logo" class="h-24 mr-4"/>
                     <div>
                        <h1 class="text-2xl font-bold text-gray-800">DEWAN KEMAKMURAN MASJID (DKM) AT-TIJANIYAH</h1>
                        <h2 class="text-xl font-semibold text-gray-700">Laporan Arus Kas</h2>
                        <p class="text-sm text-gray-500">Alamat: Jl. Cikandang, Cimareme, Kec. Ngamprah, Kabupaten Bandung Barat, Jawa Barat 40552</p>
                     </div>
                </div>
                <hr class="border-t-2 border-gray-800 my-2">
                <hr class="border-t-1 border-gray-800">
            </header>

            <section class="mb-6">
                <h3 class="text-center text-lg font-semibold mb-2">{{ $cashbook->name }}</h3>
                <p class="text-center text-md text-gray-600">Untuk Periode yang Berakhir pada {{ $period }}</p>
            </section>

            <section class="my-8">
                <h4 class="text-md font-semibold mb-2 border-b pb-1">Ringkasan Keuangan</h4>
                <table class="w-full sm:w-1/2">
                    <tbody>
                        <tr>
                            <td class="py-1 pr-4 text-gray-600">Saldo Awal Periode</td>
                            <td class="py-1 font-semibold text-gray-800 text-right">Rp {{ number_format($initialBalance, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 pr-4 text-gray-600">Total Pemasukan</td>
                            <td class="py-1 font-semibold text-green-700 text-right">Rp {{ number_format($totalIncome, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 pr-4 text-gray-600">Total Pengeluaran</td>
                            <td class="py-1 font-semibold text-red-700 text-right">(Rp {{ number_format($totalExpense, 0, ',', '.') }})</td>
                        </tr>
                        <tr class="border-t-2 border-gray-300">
                            <td class="py-2 pr-4 font-bold text-gray-800">Saldo Akhir Periode</td>
                            <td class="py-2 font-bold text-blue-800 text-right">Rp {{ number_format($endingBalance, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <main>
                <h4 class="text-md font-semibold mb-2 border-b pb-1">Rincian Transaksi</h4>
                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Pemasukan</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Pengeluaran</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Saldo</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
                            $runningBalance = $initialBalance;
                        @endphp
                        @forelse ($transactions as $transaction)
                            @php
                                if ($transaction->type == 'pemasukan') {
                                    $runningBalance += $transaction->amount;
                                } else {
                                    $runningBalance -= $transaction->amount;
                                }
                            @endphp
                            <tr>
                                <td class="px-4 py-2 whitespace-nowrap text-sm">{{ \Carbon\Carbon::parse($transaction->date)->isoFormat('DD MMM YYYY') }}</td>
                                <td class="px-4 py-2 text-sm">{{ $transaction->description }}</td>
                                <td class="px-4 py-2 text-right text-sm text-green-600">
                                    {{ $transaction->type == 'pemasukan' ? number_format($transaction->amount, 0, ',', '.') : '-' }}
                                </td>
                                <td class="px-4 py-2 text-right text-sm text-red-600">
                                    {{ $transaction->type == 'pengeluaran' ? number_format($transaction->amount, 0, ',', '.') : '-' }}
                                </td>
                                <td class="px-4 py-2 text-right text-sm font-medium">{{ number_format($runningBalance, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-8 text-gray-500">Tidak ada transaksi pada periode ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="bg-gray-50 font-bold">
                        <tr>
                            <td colspan="2" class="px-4 py-2 text-right">Total</td>
                            <td class="px-4 py-2 text-right text-sm text-green-700">Rp {{ number_format($totalIncome, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 text-right text-sm text-red-700">Rp {{ number_format($totalExpense, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 text-right text-sm"></td>
                        </tr>
                    </tfoot>
                </table>
            </main>

            <footer class="mt-16">
                <div class="flex justify-end">
                    <div class="w-1/2 sm:w-1/3 text-center">
                        <p class="mb-16">Ngamprah, {{ \Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}</p>
                    </div>
                </div>
                <div class="flex justify-around items-start mt-4">
                    <div class="text-center">
                        <p class="font-semibold">Mengetahui,</p>
                        <p class="mb-16 font-semibold">Ketua DKM AT-Tijaniyah</p>
                        <p class="font-bold underline">Arman Suratman</p>
                    </div>
                    <div class="text-center">
                        <p class="font-semibold">Dibuat oleh,</p>
                        <p class="mb-16 font-semibold">Bendahara</p>
                        <p class="font-bold underline">Muhammad Furqon</p>
                    </div>
                </div>
            </footer>

        </div>
    </div>

</body>
</html>
