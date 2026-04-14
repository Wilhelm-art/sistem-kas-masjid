<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Pengelolaan Transaksi Keuangan') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                <div class="flex items-center justify-between mb-6">
                    <a href="{{ route('admin.transactions.create') }}"
                       class="px-5 py-3 bg-indigo-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        ➕ Tambah Transaksi
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-100 border border-green-400 text-green-700 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tampilan Desktop (Tabel) -->
                <div class="hidden md:block overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Keterangan</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Jumlah</th>
                                <th class="px-6 py-3 text-right text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            @forelse ($transactions as $transaction)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}</td>
                                    <td class="px-6 py-4">{{ $transaction->description }}</td>
                                    <td class="px-6 py-4">{{ $transaction->category->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 font-semibold">
                                        @if($transaction->type == 'pemasukan')
                                            <span class="text-green-600">+ Rp {{ number_format($transaction->amount, 0, ',', '.') }}</span>
                                        @else
                                            <span class="text-red-600">- Rp {{ number_format($transaction->amount, 0, ',', '.') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('admin.transactions.edit', $transaction->id) }}"
                                           class="text-indigo-600 hover:text-indigo-900 font-medium mr-4">✏️ Edit</a>
                                        <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:text-red-800 font-medium"
                                                    onclick="return confirm('Anda yakin ingin menghapus transaksi ini?')">
                                                🗑️ Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                                        Belum ada data transaksi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Tampilan Mobile (Card Vertikal) -->
                <div class="md:hidden space-y-4">
                    @forelse ($transactions as $transaction)
                        <div class="p-4 border rounded-lg shadow-sm bg-gray-50">
                            <div class="flex justify-between">
                                <span class="text-sm font-semibold text-gray-600">Tanggal:</span>
                                <span>{{ \Carbon\Carbon::parse($transaction->date)->format('d M Y') }}</span>
                            </div>
                            <div class="flex justify-between mt-2">
                                <span class="text-sm font-semibold text-gray-600">Keterangan:</span>
                                <span>{{ $transaction->description }}</span>
                            </div>
                            <div class="flex justify-between mt-2">
                                <span class="text-sm font-semibold text-gray-600">Kategori:</span>
                                <span>{{ $transaction->category->name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between mt-2">
                                <span class="text-sm font-semibold text-gray-600">Jumlah:</span>
                                @if($transaction->type == 'pemasukan')
                                    <span class="text-green-600 font-bold">+ Rp {{ number_format($transaction->amount, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-red-600 font-bold">- Rp {{ number_format($transaction->amount, 0, ',', '.') }}</span>
                                @endif
                            </div>
                            <div class="flex justify-end space-x-4 mt-3">
                                <a href="{{ route('admin.transactions.edit', $transaction->id) }}"
                                   class="px-3 py-1 bg-indigo-600 text-white text-xs rounded-lg hover:bg-indigo-700">✏️ Edit</a>
                                <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white text-xs rounded-lg hover:bg-red-700"
                                            onclick="return confirm('Anda yakin ingin menghapus transaksi ini?')">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500">Belum ada data transaksi.</p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
