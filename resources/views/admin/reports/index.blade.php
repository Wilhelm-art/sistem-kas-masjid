@php
    \Carbon\Carbon::setLocale('id');
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cetak Laporan Keuangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.reports.generate') }}" target="_blank">
                        @csrf

                        <!-- Jenis Laporan -->
                        <div>
                            <label for="report_type" class="block font-medium text-sm text-gray-700">Jenis Laporan</label>
                            <select name="report_type" id="report_type" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
                                <option value="monthly">Laporan Bulanan</option>
                                <option value="weekly">Laporan Mingguan/Custom</option>
                                <option value="category">Laporan per Kategori</option>
                            </select>
                        </div>

                        <!-- Buku Kas -->
                        <div class="mt-4">
                            <label for="cashbook_id" class="block font-medium text-sm text-gray-700">Buku Kas</label>
                            <select name="cashbook_id" id="cashbook_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
                                @foreach ($cashbooks as $cashbook)
                                    <option value="{{ $cashbook->id }}">{{ $cashbook->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Opsi Laporan Bulanan -->
                        <div id="monthly_options" class="mt-4 space-y-4">
                            <div>
                                <label for="month" class="block font-medium text-sm text-gray-700">Bulan</label>
                                <select name="month" id="month" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ $i == date('m') ? 'selected' : '' }}>{{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div>
                                <label for="year" class="block font-medium text-sm text-gray-700">Tahun</label>
                                <input type="number" name="year" id="year" value="{{ date('Y') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                            </div>
                        </div>

                        <!-- Opsi Laporan Mingguan/Custom -->
                        <div id="custom_date_options" class="mt-4 space-y-4" style="display: none;">
                            <div>
                                <label for="start_date" class="block font-medium text-sm text-gray-700">Tanggal Mulai</label>
                                <input type="date" name="start_date" id="start_date" value="{{ date('Y-m-01') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                            </div>
                            <div>
                                <label for="end_date" class="block font-medium text-sm text-gray-700">Tanggal Selesai</label>
                                <input type="date" name="end_date" id="end_date" value="{{ date('Y-m-d') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                            </div>
                        </div>

                        <!-- Opsi Laporan per Kategori -->
                        <div id="category_options" class="mt-4" style="display: none;">
                            <label for="category_id" class="block font-medium text-sm text-gray-700">Kategori</label>
                            <select name="category_id" id="category_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }} ({{ ucfirst($category->type) }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500">
                                Cetak Laporan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const reportTypeSelect = document.getElementById('report_type');
            const monthlyOptions = document.getElementById('monthly_options');
            const customDateOptions = document.getElementById('custom_date_options');
            const categoryOptions = document.getElementById('category_options');

            function toggleReportFields() {
                const selectedType = reportTypeSelect.value;

                monthlyOptions.style.display = 'none';
                customDateOptions.style.display = 'none';
                categoryOptions.style.display = 'none';

                if (selectedType === 'monthly') {
                    monthlyOptions.style.display = 'block';
                } else if (selectedType === 'weekly') {
                    customDateOptions.style.display = 'block';
                } else if (selectedType === 'category') {
                    customDateOptions.style.display = 'block';
                    categoryOptions.style.display = 'block';
                }
            }

            reportTypeSelect.addEventListener('change', toggleReportFields);
            toggleReportFields(); // Jalankan saat halaman dimuat
        });
    </script>
</x-app-layout>
