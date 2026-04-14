<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Donasi & Infak') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-between items-center mb-4">
                        <a href="{{ route('admin.donations.create') }}"
                           class="px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 transition">
                            ➕ Tambah Donasi
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- TABEL DESKTOP -->
                    <div class="hidden sm:block overflow-x-auto">
                        <table class="min-w-full border border-gray-200 rounded-lg">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Donatur</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Jumlah</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Jenis</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Catatan</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Bukti</th>
                                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($donations as $donation)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm">{{ \Carbon\Carbon::parse($donation->date)->format('d M Y') }}</td>
                                        <td class="px-6 py-4 text-sm">{{ $donation->donor_name }}</td>
                                        <td class="px-6 py-4 text-sm font-semibold text-green-700">Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <span class="px-2 py-1 text-xs rounded-full
                                                {{ $donation->type === 'donasi' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                                {{ ucfirst($donation->type) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm">{{ $donation->note }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            @if($donation->proof)
                                                <a href="{{ Storage::url($donation->proof) }}" target="_blank" class="text-indigo-600 hover:underline">📎 Lihat</a>
                                            @else
                                                <span class="text-gray-400">-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-right space-x-3">
                                            <a href="{{ route('admin.donations.edit', $donation) }}" class="text-blue-600 hover:text-blue-800">✏️ Edit</a>
                                            <form action="{{ route('admin.donations.destroy', $donation) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">🗑️ Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">Belum ada data donasi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- CARD MOBILE -->
                    <div class="sm:hidden space-y-4">
                        @forelse ($donations as $donation)
                            <div class="p-4 border rounded-xl shadow bg-white">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-semibold text-gray-800">{{ $donation->donor_name }}</h3>
                                    <span class="px-2 py-1 text-xs rounded-full
                                        {{ $donation->type === 'donasi' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                        {{ ucfirst($donation->type) }}
                                    </span>
                                </div>

                                <p class="text-lg font-bold text-green-600 mb-2">
                                    Rp {{ number_format($donation->amount, 0, ',', '.') }}
                                </p>

                                <p class="text-sm text-gray-600">📅 {{ \Carbon\Carbon::parse($donation->date)->format('d M Y') }}</p>

                                @if($donation->note)
                                    <p class="text-sm text-gray-600 mt-1">📝 {{ $donation->note }}</p>
                                @endif

                                <div class="mt-3 flex justify-between items-center">
                                    <div>
                                        @if($donation->proof)
                                            <a href="{{ Storage::url($donation->proof) }}" target="_blank" class="text-sm text-indigo-600 hover:underline">📎 Lihat Bukti</a>
                                        @else
                                            <span class="text-sm text-gray-400">Tanpa bukti</span>
                                        @endif
                                    </div>
                                    <div class="flex space-x-3 text-sm">
                                        <a href="{{ route('admin.donations.edit', $donation) }}" class="text-blue-600 hover:text-blue-800">✏️ Edit</a>
                                        <form action="{{ route('admin.donations.destroy', $donation) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">🗑️ Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500">Belum ada data donasi.</p>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{ $donations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
