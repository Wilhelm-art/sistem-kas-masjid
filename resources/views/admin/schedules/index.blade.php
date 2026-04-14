<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengelolaan Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                        <a href="{{ route('admin.schedules.create') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-semibold hover:bg-gray-700 transition">
                            Tambah Jadwal
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 px-4 py-3 rounded-md bg-green-100 text-green-700 border border-green-300">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Versi Tabel (Desktop) -->
                    <div class="hidden sm:block overflow-x-auto">
                        <table class="w-full border border-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Tanggal</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Judul/Kegiatan</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Penceramah</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Tipe</th>
                                    <th class="px-4 py-2 text-center font-medium text-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($schedules as $schedule)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3">
                                            {{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }},
                                            {{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}
                                        </td>
                                        <td class="px-4 py-3">{{ $schedule->title }}</td>
                                        <td class="px-4 py-3">{{ $schedule->speaker_name }}</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 inline-flex text-xs rounded-full font-semibold
                                                {{ $schedule->type == 'khatib_jumat' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                                {{ $schedule->type == 'khatib_jumat' ? 'Khatib Jumat' : 'Pengajian Rutin' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <div class="flex flex-row gap-2 justify-center">
                                                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="px-3 py-1 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-xs">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus jadwal ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 text-xs">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                            Belum ada data jadwal.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Versi Card (Mobile) -->
                    <div class="sm:hidden space-y-4">
                        @forelse ($schedules as $schedule)
                            <div class="p-4 border rounded-lg shadow-sm bg-gray-50">
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold">Tanggal:</span>
                                    {{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }},
                                    {{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold">Judul:</span> {{ $schedule->title }}
                                </p>
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold">Penceramah:</span> {{ $schedule->speaker_name }}
                                </p>
                                <p class="text-sm text-gray-600 mb-2">
                                    <span class="font-semibold">Tipe:</span>
                                    <span class="px-2 py-1 text-xs rounded-full font-semibold
                                        {{ $schedule->type == 'khatib_jumat' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                        {{ $schedule->type == 'khatib_jumat' ? 'Khatib Jumat' : 'Pengajian Rutin' }}
                                    </span>
                                </p>
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="flex-1 px-3 py-2 bg-indigo-600 text-white text-center rounded-md text-sm hover:bg-indigo-700">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Anda yakin ingin menghapus jadwal ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full px-3 py-2 bg-red-600 text-white rounded-md text-sm hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500">Belum ada data jadwal.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
