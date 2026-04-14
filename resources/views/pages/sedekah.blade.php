<x-guest-layout>
    <div>
        <div class="relative bg-gradient-to-br from-green-800 to-green-900">
            <div class="relative mx-auto max-w-7xl py-24 px-6 sm:py-32 lg:px-8 text-center">
                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-6xl">Sedekah & Infak</h1>
                <p class="mt-6 max-w-3xl mx-auto text-xl text-green-100">"Perumpamaan orang yang menginfakkan hartanya di jalan Allah seperti sebutir biji yang menumbuhkan tujuh tangkai, pada setiap tangkai ada seratus biji..." (QS. Al-Baqarah: 261)</p>
            </div>
        </div>

        <div class="bg-gray-50">
            <div class="mx-auto max-w-7xl px-6 py-16 sm:py-24 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-12 gap-y-16">

                    <div class="lg:col-span-1">
                        <h2 class="text-2xl font-bold text-gray-900">Salurkan Donasi Anda</h2>
                        <p class="mt-4 text-gray-600">Anda dapat menyalurkan donasi melalui transfer ke rekening resmi DKM AT-Tijaniyah di bawah ini:</p>

                        <div class="mt-8 space-y-6">
                            <div class="rounded-xl border bg-white p-6 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center font-bold text-green-800">BSI</div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Bank Syariah Indonesia</p>
                                        <p class="text-sm text-gray-500">a.n. DKM AT-TIJANIYAH</p>
                                    </div>
                                </div>
                                <div class="mt-4 flex items-center justify-between gap-4 p-3 bg-gray-100 rounded-lg">
                                    <p id="rek-bsi" class="text-lg font-mono text-gray-700 tracking-wider">1234 5678 9012</p>
                                    <button onclick="copyToClipboard('rek-bsi', this)" class="text-sm font-medium text-green-700 hover:text-green-900 px-3 py-1 rounded-md hover:bg-green-100 transition-colors">Salin</button>
                                </div>
                            </div>
                            <div class="rounded-xl border bg-white p-6 shadow-sm hover:shadow-lg transition-shadow">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center font-bold text-blue-800">M</div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Bank Mandiri</p>
                                        <p class="text-sm text-gray-500">a.n. DKM AT-TIJANIYAH</p>
                                    </div>
                                </div>
                                <div class="mt-4 flex items-center justify-between gap-4 p-3 bg-gray-100 rounded-lg">
                                    <p id="rek-mandiri" class="text-lg font-mono text-gray-700 tracking-wider">0987 6543 2109</p>
                                    <button onclick="copyToClipboard('rek-mandiri', this)" class="text-sm font-medium text-green-700 hover:text-green-900 px-3 py-1 rounded-md hover:bg-green-100 transition-colors">Salin</button>
                                </div>
                            </div>
                        </div>
                        <p class="mt-6 text-sm text-gray-600">
                            Untuk konfirmasi atau informasi lebih lanjut, silakan hubungi bendahara DKM.
                        </p>
                    </div>

                    <div class="lg:col-span-2">
                        <h2 class="text-2xl font-bold text-gray-900">Laporan Donasi Masuk</h2>
                        <p class="mt-4 text-gray-600">Berikut adalah daftar donasi yang telah kami terima. Jazakumullah Khairan Katsiran.</p>

                        <div class="mt-8 flow-root">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">

                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Tanggal</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Donatur</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Jenis</th>
                                                    <th scope="col" class="px-3 py-3.5 text-right text-sm font-semibold text-gray-900">Jumlah</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">
                                                @forelse ($donations as $donation)
                                                    <tr class="{{ $loop->even ? 'bg-gray-50' : '' }} hover:bg-green-50">
                                                        {{-- PERUBAHAN DI SINI --}}
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ \Carbon\Carbon::parse($donation->date)->translatedFormat('d F Y') }}</td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $donation->donor_name }}</td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            @if(isset($donation->type) && $donation->type == 'tunai')
                                                                <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">Tunai</span>
                                                            @else
                                                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Non-Tunai</span>
                                                            @endif
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-right font-medium text-gray-900">Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                                                        <td class="px-3 py-4 text-sm text-gray-500">
                                                            @if(isset($donation->proof) && $donation->proof)
                                                                <a href="{{ Storage::url($donation->proof) }}" target="_blank" class="text-blue-600 hover:text-blue-800 hover:underline">
                                                                    {{ $donation->note ?? 'Lihat Bukti' }}
                                                                </a>
                                                            @else
                                                                <span>{{ $donation->note ?? '-' }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="py-8 text-center text-gray-500">Belum ada data donasi untuk ditampilkan.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="mt-4">
                                        {{ $donations->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(elementId, button) {
            const textToCopy = document.getElementById(elementId).innerText;
            if (navigator.clipboard) {
                navigator.clipboard.writeText(textToCopy);
            } else {
                const textarea = document.createElement('textarea');
                textarea.value = textToCopy;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
            }
            const originalText = button.innerText;
            button.innerText = 'Tersalin!';
            button.disabled = true;
            setTimeout(() => {
                button.innerText = originalText;
                button.disabled = false;
            }, 2000);
        }
    </script>
</x-guest-layout>
