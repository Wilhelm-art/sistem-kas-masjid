<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center sm:text-left">
            {{ __('Edit Data Donasi') }}
        </h2>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md rounded-xl">
                <div class="p-6 sm:p-10 text-gray-900">

                    <form method="POST" action="{{ route('admin.donations.update', $donation->id) }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="space-y-2">
                            <label for="donor_name" class="block text-sm font-medium text-gray-700">Nama Donatur</label>
                            <input id="donor_name" type="text" name="donor_name" value="{{ old('donor_name', $donation->donor_name) }}" required
                                   class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200" />
                            <x-input-error :messages="$errors->get('donor_name')" class="mt-1 text-sm" />
                        </div>

                        <div class="space-y-2">
                            <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah (Rp)</label>
                            <input id="amount" type="number" name="amount" value="{{ old('amount', $donation->amount) }}" required
                                   class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200" />
                            <x-input-error :messages="$errors->get('amount')" class="mt-1 text-sm" />
                        </div>

                        <div class="space-y-2">
                            <label for="date" class="block text-sm font-medium text-gray-700">Tanggal Donasi</label>
                            <input id="date" type="date" name="date" value="{{ old('date', $donation->date) }}" required
                                   class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200" />
                            <x-input-error :messages="$errors->get('date')" class="mt-1 text-sm" />
                        </div>

                        <div class="space-y-2">
                            <label for="type" class="block text-sm font-medium text-gray-700">Jenis Donasi</label>
                            <select id="type" name="type"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                                <option value="non-tunai" @selected(old('type', $donation->type) == 'non-tunai')>Non-Tunai (Transfer)</option>
                                <option value="tunai" @selected(old('type', $donation->type) == 'tunai')>Tunai</option>
                            </select>
                            <x-input-error :messages="$errors->get('type')" class="mt-1 text-sm" />
                        </div>

                        <div class="space-y-2">
                            <label for="note" class="block text-sm font-medium text-gray-700">Catatan (Opsional)</label>
                            <textarea id="note" name="note" rows="3"
                                      class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">{{ old('note', $donation->note) }}</textarea>
                            <x-input-error :messages="$errors->get('note')" class="mt-1 text-sm" />
                        </div>

                        <div class="space-y-2">
                            <label for="proof" class="block text-sm font-medium text-gray-700">Ganti Bukti (Kwitansi/Transfer)</label>
                            <input id="proof" type="file" name="proof"
                                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring focus:ring-indigo-200" />
                            @if($donation->proof)
                                <div class="mt-2">
                                    <a href="{{ Storage::url($donation->proof) }}" target="_blank" class="text-sm text-blue-600 hover:underline">Lihat bukti saat ini</a>
                                </div>
                            @endif
                            <x-input-error :messages="$errors->get('proof')" class="mt-1 text-sm" />
                        </div>

                        <div class="flex flex-col sm:flex-row items-center justify-end gap-3 pt-4">
                            <a href="{{ route('admin.donations.index') }}"
                               class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg shadow hover:bg-gray-300 transition">
                                Kembali
                            </a>
                            <button type="submit"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
