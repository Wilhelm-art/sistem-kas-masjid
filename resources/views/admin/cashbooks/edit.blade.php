<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('✏️ Edit Buku Kas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Formulir --}}
                    <form method="POST" action="{{ route('admin.cashbooks.update', $cashbook->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Nama -->
                        <div>
                            <label for="name" class="block font-medium text-base text-gray-700">
                                📘 Nama Buku Kas
                            </label>
                            <input id="name"
                                   class="block mt-2 w-full rounded-lg shadow-sm border-gray-300
                                          focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                                          text-base p-2"
                                   type="text"
                                   name="name"
                                   value="{{ old('name', $cashbook->name) }}"
                                   required autofocus />
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mt-4">
                            <label for="description" class="block font-medium text-base text-gray-700">
                                📝 Deskripsi
                            </label>
                            <textarea id="description"
                                      name="description"
                                      rows="3"
                                      class="block mt-2 w-full rounded-lg shadow-sm border-gray-300
                                             focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                                             text-base p-2">{{ old('description', $cashbook->description) }}</textarea>
                            @error('description')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Saldo Awal -->
                        <div class="mt-4">
                            <label for="starting_balance" class="block font-medium text-base text-gray-700">
                                💰 Saldo Awal
                            </label>
                            <input id="starting_balance"
                                   class="block mt-2 w-full rounded-lg shadow-sm border-gray-300
                                          focus:border-indigo-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                                          text-base p-2"
                                   type="number"
                                   name="starting_balance"
                                   value="{{ old('starting_balance', $cashbook->starting_balance) }}"
                                   required />
                            @error('starting_balance')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.cashbooks.index') }}"
                               class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md text-base hover:bg-gray-400">
                                ← Kembali
                            </a>
                            <button type="submit"
                                    class="px-6 py-2 bg-indigo-600 border border-transparent rounded-md
                                           font-semibold text-base text-white hover:bg-indigo-700
                                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                                           transition ease-in-out duration-150">
                                ✅ Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
