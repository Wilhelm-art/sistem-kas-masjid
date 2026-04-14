<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Tambah Kategori Baru') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-white shadow-md rounded-lg p-6">

                <form method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf

                    <!-- Buku Kas -->
                    <div class="mt-4">
                        <label for="cashbook_id" class="block text-lg font-semibold text-gray-700 mb-2">
                            Pilih Buku Kas
                        </label>
                        <select name="cashbook_id" id="cashbook_id"
                                class="w-full text-lg rounded-md border-gray-300 focus:ring focus:ring-indigo-200 p-2"
                                required>
                            <option value="">-- Pilih Buku Kas --</option>
                            @foreach ($cashbooks as $cashbook)
                                <option value="{{ $cashbook->id }}">{{ $cashbook->name }}</option>
                            @endforeach
                        </select>
                        @error('cashbook_id')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Kategori -->
                    <div class="mt-4">
                        <label for="name" class="block text-lg font-semibold text-gray-700 mb-2">
                            Nama Kategori
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                               class="w-full text-lg rounded-md border-gray-300 focus:ring focus:ring-indigo-200 p-2"
                               required />
                        @error('name')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tipe -->
                    <div class="mt-4">
                        <label for="type" class="block text-lg font-semibold text-gray-700 mb-2">
                            Tipe Kategori
                        </label>
                        <select name="type" id="type"
                                class="w-full text-lg rounded-md border-gray-300 focus:ring focus:ring-indigo-200 p-2"
                                required>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                        @error('type')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center justify-between mt-6">
                        <!-- Tombol Kembali -->
                        <a href="{{ route('admin.categories.index') }}"
                           class="px-6 py-3 bg-gray-500 text-white text-lg rounded-lg hover:bg-gray-600">
                            ⬅️ Kembali
                        </a>

                        <!-- Tombol Simpan -->
                        <button type="submit"
                                class="px-6 py-3 bg-indigo-600 text-white text-lg rounded-lg hover:bg-indigo-700">
                            💾 Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
