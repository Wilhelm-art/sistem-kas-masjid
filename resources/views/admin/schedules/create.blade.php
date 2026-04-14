<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form method="POST" action="{{ route('admin.schedules.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700">Tipe Jadwal</label>
                        <select name="type" id="type" required class="mt-2 block w-full rounded-lg border-gray-300 focus:ring focus:ring-indigo-200">
                            <option value="">-- Pilih Tipe --</option>
                            <option value="khatib_jumat" {{ old('type') == 'khatib_jumat' ? 'selected' : '' }}>Khatib Jumat</option>
                            <option value="pengajian_rutin" {{ old('type') == 'pengajian_rutin' ? 'selected' : '' }}>Pengajian Rutin</option>
                        </select>
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul/Kegiatan</label>
                        <input id="title" type="text" name="title" value="{{ old('title') }}" required class="mt-2 block w-full rounded-lg border-gray-300 focus:ring focus:ring-indigo-200">
                    </div>

                    <div>
                        <label for="speaker_name" class="block text-sm font-medium text-gray-700">Nama Penceramah/Khatib</label>
                        <input id="speaker_name" type="text" name="speaker_name" value="{{ old('speaker_name') }}" required class="mt-2 block w-full rounded-lg border-gray-300 focus:ring focus:ring-indigo-200">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input id="date" type="date" name="date" value="{{ old('date') }}" required class="mt-2 block w-full rounded-lg border-gray-300 focus:ring focus:ring-indigo-200">
                        </div>
                        <div>
                            <label for="time" class="block text-sm font-medium text-gray-700">Waktu</label>
                            <input id="time" type="time" name="time" value="{{ old('time') }}" required class="mt-2 block w-full rounded-lg border-gray-300 focus:ring focus:ring-indigo-200">
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi (Opsional)</label>
                        <textarea id="description" name="description" rows="3" class="mt-2 block w-full rounded-lg border-gray-300 focus:ring focus:ring-indigo-200">{{ old('description') }}</textarea>
                    </div>

                    <div class="flex justify-between items-center pt-4">
                        <a href="{{ route('admin.schedules.index') }}" class="px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg hover:bg-gray-600">Kembali</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
