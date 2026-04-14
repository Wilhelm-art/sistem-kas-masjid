<x-app-layout>
    {{-- Header Halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengelolaan Buku Kas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Tombol Tambah Buku Kas Baru --}}
                    <a href="{{ route('admin.cashbooks.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md
                              font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-700
                              focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2
                              focus:ring-indigo-500 focus:ring-offset-2 transition mb-4">
                        ➕ Tambah Buku Kas
                    </a>

                    {{-- Menampilkan pesan sukses --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                            <span class="block">{{ session('success') }}</span>
                        </div>
                    @endif

                    {{-- Versi Desktop (Tabel) --}}
                    <div class="hidden md:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">Saldo Awal</th>
                                    <th class="px-6 py-3 text-right font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($cashbooks as $cashbook)
                                    <tr>
                                        <td class="px-6 py-4">{{ $cashbook->name }}</td>
                                        <td class="px-6 py-4">{{ $cashbook->description }}</td>
                                        <td class="px-6 py-4">
                                            Rp {{ number_format($cashbook->starting_balance, 2, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 text-right space-x-3">
                                            <a href="{{ route('admin.cashbooks.edit', $cashbook->id) }}"
                                               class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('admin.cashbooks.destroy', $cashbook->id) }}"
                                                  method="POST"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus buku kas ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                            Belum ada data buku kas.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Versi Mobile (Card) --}}
                    <div class="md:hidden space-y-4">
                        @forelse ($cashbooks as $cashbook)
                            <div class="border rounded-lg p-4 shadow-sm bg-gray-50">
                                <p><span class="font-semibold">📘 Nama:</span> {{ $cashbook->name }}</p>
                                <p><span class="font-semibold">📝 Deskripsi:</span> {{ $cashbook->description }}</p>
                                <p><span class="font-semibold">💰 Saldo Awal:</span>
                                    Rp {{ number_format($cashbook->starting_balance, 2, ',', '.') }}
                                </p>
                                <div class="mt-3 flex space-x-4">
                                    <a href="{{ route('admin.cashbooks.edit', $cashbook->id) }}"
                                       class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm">Edit</a>
                                    <form action="{{ route('admin.cashbooks.destroy', $cashbook->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku kas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded-md text-sm">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500">Belum ada data buku kas.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
