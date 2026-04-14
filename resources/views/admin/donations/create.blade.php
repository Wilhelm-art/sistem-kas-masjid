<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Donasi Baru') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.donations.store') }}" enctype="multipart/form-data" class="space-y-5">
                        @csrf

                        <div class="p-4 rounded-lg border bg-gray-50 shadow-sm">
                            <label for="donor_name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Donatur</label>
                            <input id="donor_name" type="text" name="donor_name" value="Hamba Allah" required
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-base px-3 py-2" />
                        </div>

                        <div class="p-4 rounded-lg border bg-gray-50 shadow-sm">
                            <label for="amount" class="block text-sm font-semibold text-gray-700 mb-2">Jumlah (Rp)</label>
                            <input id="amount" type="number" name="amount" required
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-base px-3 py-2" />
                        </div>

                        <div class="p-4 rounded-lg border bg-gray-50 shadow-sm">
                            <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Donasi</label>
                            <input id="date" type="date" name="date" value="{{ date('Y-m-d') }}" required
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-base px-3 py-2" />
                        </div>

                        <div class="p-4 rounded-lg border bg-gray-50 shadow-sm">
                            <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">Jenis Donasi</label>
                            <select id="type" name="type"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-base px-3 py-2">
                                <option value="non-tunai">Non-Tunai (Transfer)</option>
                                <option value="tunai">Tunai</option>
                            </select>
                        </div>

                        <div class="p-4 rounded-lg border bg-gray-50 shadow-sm">
                            <label for="note" class="block text-sm font-semibold text-gray-700 mb-2">Catatan (Opsional)</label>
                            <textarea id="note" name="note" rows="3"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-base px-3 py-2"></textarea>
                        </div>

                        <div class="p-4 rounded-lg border bg-gray-50 shadow-sm">
                            <label for="proof" class="block text-sm font-semibold text-gray-700 mb-2">Bukti (Kwitansi/Transfer)</label>
                            <input id="proof" type="file" name="proof"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-base px-3 py-2" />
                        </div>

                        <div class="flex justify-between items-center pt-4">
                            <a href="{{ route('admin.donations.index') }}"
                               class="flex items-center px-4 py-2 rounded-lg bg-gray-200 text-gray-700 text-base font-medium hover:bg-gray-300 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                                Kembali
                            </a>
                            <button type="submit"
                                class="flex items-center px-5 py-2 rounded-lg bg-indigo-600 text-white text-base font-semibold hover:bg-indigo-700 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
