<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Transaksi Baru') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('admin.transactions.store') }}">
                        @csrf

                        <div class="space-y-4">

                            <div>
                                <label for="type" class="block font-medium text-sm text-gray-700">Tipe Transaksi</label>
                                <select name="type" id="type" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="pemasukan">Pemasukan</option>
                                    <option value="pengeluaran">Pengeluaran</option>
                                </select>
                            </div>

                            <div>
                                <label for="category_id" class="block font-medium text-sm text-gray-700">Kategori</label>
                                <select name="category_id" id="category_id" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" data-type="{{ $category->type }}" data-cashbook="{{ $category->cashbook_id }}">
                                            {{ $category->name }} ({{ $category->cashbook->name }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <input type="hidden" name="cashbook_id" id="cashbook_id">

                            <div>
                                <label for="date" class="block font-medium text-sm text-gray-700">Tanggal</label>
                                <input id="date" type="date" name="date" value="{{ old('date', date('Y-m-d')) }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('date')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="block font-medium text-sm text-gray-700">Keterangan</label>
                                <input id="description" type="text" name="description" value="{{ old('description') }}" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('description')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="amount" class="block font-medium text-sm text-gray-700">Jumlah (Rp)</label>
                                <input id="amount" type="number" name="amount" value="{{ old('amount') }}" placeholder="Contoh: 50000" class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('amount')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between mt-6 gap-3">
                            <a href="{{ route('admin.transactions.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-medium text-sm text-gray-700 hover:bg-gray-300">
                                Kembali
                            </a>
                            <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
