<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 leading-tight tracking-tight">
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-sm font-medium text-slate-500 mt-1">Ringkasan aktivitas dan metrik keuangan masjid</p>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center bg-emerald-50 px-3 py-1.5 rounded-full text-sm font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Bulan Ini: {{ now()->translatedFormat('F Y') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="text-gray-900 mb-6">
                <h3 class="text-2xl font-semibold">Selamat datang, {{ Auth::user()->name }}!</h3>
            </div>

            <!-- Cards Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Saldo Kas Card -->
                <div class="bg-white overflow-hidden shadow-sm rounded-2xl ring-1 ring-slate-200/50 hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-slate-500 truncate uppercase tracking-wider">Total Pemasukan</dt>
                                    <dd class="text-2xl font-bold text-slate-900 mt-1">Rp {{ number_format($totalIncome, 0, ',', '.') }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-2xl ring-1 ring-slate-200/50 hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-slate-500 truncate uppercase tracking-wider">Masuk (Bln Ini)</dt>
                                    <dd class="text-2xl font-bold text-slate-900 mt-1">Rp {{ number_format($currentMonthIncome, 0, ',', '.') }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-2xl ring-1 ring-slate-200/50 hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" /></svg>
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-slate-500 truncate uppercase tracking-wider">Keluar (Bln Ini)</dt>
                                    <dd class="text-2xl font-bold text-slate-900 mt-1">Rp {{ number_format($currentMonthExpense, 0, ',', '.') }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-2xl ring-1 ring-slate-200/50 hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                            <div class="ml-4 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-slate-500 truncate uppercase tracking-wider">Total Pengeluaran</dt>
                                    <dd class="text-2xl font-bold text-slate-900 mt-1">Rp {{ number_format($totalExpense, 0, ',', '.') }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts & Recent Transactions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Chart Section -->
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm ring-1 ring-slate-200/50 p-6 flex flex-col h-[400px]">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-slate-800">Grafik Keuangan (6 Bulan Terakhir)</h3>
                        <a href="{{ route('admin.reports.index') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-700">Lihat Laporan &rarr;</a>
                    </div>
                    <div class="relative w-full flex-grow">
                        <!-- Canvas container must have relative formatting and bounded size -->
                        <div class="absolute inset-0">
                            <canvas id="financeChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions -->
                <div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-200/50 p-6 flex flex-col h-[400px]">
                    <h3 class="text-lg font-bold text-slate-800 mb-6">Jadwal Sholat (Cimareme)</h3>
                    
                    <div class="overflow-y-auto flex-1 pr-2 space-y-4" id="prayer-times-widget">
                        <div class="flex items-center justify-center h-full text-slate-500">Memuat jadwal...</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Gunakan Chart.js dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Logika untuk Grafik Keuangan
            try {
                const ctx = document.getElementById('financeChart').getContext('2d');
                const chartData = @json($chartData);
                
                // Konfigurasi Gradien untuk area chart
                let gradientPemasukan = ctx.createLinearGradient(0, 0, 0, 400);
                gradientPemasukan.addColorStop(0, 'rgba(16, 185, 129, 0.4)');
                gradientPemasukan.addColorStop(1, 'rgba(16, 185, 129, 0.0)');
                
                let gradientPengeluaran = ctx.createLinearGradient(0, 0, 0, 400);
                gradientPengeluaran.addColorStop(0, 'rgba(239, 68, 68, 0.4)');
                gradientPengeluaran.addColorStop(1, 'rgba(239, 68, 68, 0.0)');

                const data = {
                    labels: chartData.labels,
                    datasets: [
                        {
                            label: 'Pemasukan',
                            data: chartData.income,
                            backgroundColor: gradientPemasukan,
                            borderColor: '#10b981', // Tailwind emerald-500
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#10b981',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.4 // Smooth curves
                        },
                        {
                            label: 'Pengeluaran',
                            data: chartData.expense,
                            backgroundColor: gradientPengeluaran,
                            borderColor: '#ef4444', // Tailwind red-500
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#ef4444',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.4 // Smooth curves
                        }
                    ]
                };

                const config = {
                    type: 'line',
                    data: data,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    font: { family: "'Outfit', sans-serif", size: 13, weight: '500' },
                                    usePointStyle: true,
                                    padding: 20
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(15, 23, 42, 0.9)',
                                titleFont: { family: "'Outfit', sans-serif", size: 14, weight: 'bold' },
                                bodyFont: { family: "'Outfit', sans-serif", size: 13 },
                                padding: 12,
                                cornerRadius: 8,
                                callbacks: {
                                    label: function(context) {
                                        let label = context.dataset.label || '';
                                        if (label) label += ': ';
                                        if (context.parsed.y !== null) {
                                            label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(context.parsed.y);
                                        }
                                        return label;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: '#f1f5f9', drawBorder: false },
                                ticks: {
                                    font: { family: "'Outfit', sans-serif", size: 11 },
                                    color: '#64748b',
                                    callback: function(value) {
                                        if(value >= 1000000) return 'Rp ' + (value / 1000000).toFixed(1) + 'M';
                                        if(value >= 1000) return 'Rp ' + (value / 1000).toFixed(0) + 'K';
                                        return 'Rp ' + value;
                                    }
                                }
                            },
                            x: {
                                grid: { display: false, drawBorder: false },
                                ticks: { font: { family: "'Outfit', sans-serif", size: 12 }, color: '#64748b' }
                            }
                        },
                        interaction: { mode: 'index', intersect: false },
                    }
                };

                new Chart(ctx, config);
            } catch (error) {
                console.error("Gagal memuat grafik keuangan:", error);
            }

            // 2. Logika untuk Jadwal Sholat
            const prayerWidget = document.getElementById('prayer-times-widget');
            async function fetchPrayerTimes() {
                const latitude = -6.843, longitude = 107.526, method = 20;
                const today = new Date(), dateString = `${today.getDate()}-${today.getMonth() + 1}-${today.getFullYear()}`;
                const apiUrl = `https://api.aladhan.com/v1/timings/${dateString}?latitude=${latitude}&longitude=${longitude}&method=${method}`;

                try {
                    const response = await fetch(apiUrl);
                    if (!response.ok) throw new Error('Network response was not ok.');
                    const data = await response.json();
                    const timings = data.data.timings;

                    const prayerMapping = { Fajr: 'Subuh', Sunrise: 'Terbit', Dhuhr: 'Dzuhur', Asr: 'Ashar', Maghrib: 'Maghrib', Isha: 'Isya' };
                    prayerWidget.innerHTML = '';

                    for (const key in prayerMapping) {
                        if (timings[key]) {
                            const prayerItem = document.createElement('div');
                            prayerItem.className = 'p-3 rounded-xl border border-slate-100 bg-slate-50/50 hover:bg-emerald-50 hover:border-emerald-100 transition-colors flex justify-between items-center group';
                            prayerItem.innerHTML = `
                                <div class="flex items-center gap-3">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-slate-200 text-slate-600 group-hover:bg-emerald-200 group-hover:text-emerald-700 flex items-center justify-center font-bold text-xs uppercase tracking-wider">
                                        ${prayerMapping[key].charAt(0)}
                                    </div>
                                    <span class="font-semibold text-slate-700 group-hover:text-emerald-700">${prayerMapping[key]}</span>
                                </div>
                                <span class="font-mono font-bold text-slate-900 group-hover:text-emerald-700 text-lg">${timings[key]}</span>
                            `;
                            prayerWidget.appendChild(prayerItem);
                        }
                    }
                } catch (error) {
                    prayerWidget.innerHTML = '<p class="text-center text-red-500">Gagal memuat jadwal.</p>';
                }
            }
            fetchPrayerTimes();
        });
    </script>
</x-app-layout>
