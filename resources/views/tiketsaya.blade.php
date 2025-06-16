<x-main-layout>
    <section class="bg-white pt-32 pb-8 antialiased">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
          <div class="mx-auto max-w-full">
            <div class="gap-4 lg:flex lg:items-center lg:justify-between">
              <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Tiket Saya</h2>
            </div>

            @if (session('success'))
                <div class="mt-4 rounded-lg bg-green-100 p-4 text-sm text-green-700" role="alert">
                    {{ session('success') }}
                </div>
            @endif
      
            <div class="mt-6 flow-root sm:mt-8">
              <div class="divide-y divide-gray-200">
                
                @foreach ($purchases as $purchase)
                                @if ($purchase->event) {{-- Pastikan event terkait ada --}}
                                    @php
                                        // Asumsi $purchase->event->date_time adalah objek Carbon karena cast di model Event
                                        // Jika tidak, parse manual: $eventDate = \Carbon\Carbon::parse($purchase->event->date_time);
                                        $eventDate = \Carbon\Carbon::parse($purchase->event->date);
                                        $now = \Carbon\Carbon::now();
                                        
                                        $statusText = '';
                                        $statusBgColor = '';
                                        $statusTextColor = '';
                                        $statusIconSvg = '';

                                        if ($eventDate->isFuture()) {
                                            $statusText = 'Dijadwalkan';
                                            $statusBgColor = 'bg-yellow-100';
                                            $statusTextColor = 'text-yellow-800';
                                            // Icon jam pasir atau kalender
                                            $statusIconSvg = '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z"/>';
                                        } elseif ($eventDate->isToday()) {
                                            $statusText = 'Ongoing';
                                            $statusBgColor = 'bg-blue-100';
                                            $statusTextColor = 'text-blue-800';
                                            // Icon play atau semacamnya
                                            $statusIconSvg = '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z"/>'; // Ganti dengan icon yang sesuai
                                        } elseif ($eventDate->isPast()) {
                                            $statusText = 'Selesai';
                                            $statusBgColor = 'bg-green-100';
                                            $statusTextColor = 'text-green-800';
                                            // Icon checklist
                                            $statusIconSvg = '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>';
                                        }
                                    @endphp

                                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 items-center gap-x-4 gap-y-4 py-6 w-full">
                                        <div class="content-center">
                                            <a href="#" class="text-base font-semibold text-gray-900 hover:underline">{{ $purchase->nomor_invoice }}</a>
                                        </div>

                                        <div class="content-center">
                                            <div class="flex items-center justify-end gap-2 sm:justify-start">
                                              <p class="text-sm text-gray-900 font-medium">{{ $purchase->event->name }}</p>
                                            </div>
                                          </div>
                        
                                          <div class="content-center">
                                            <div class="flex items-center justify-end gap-2 sm:justify-start">
                                              <p class="text-sm text-gray-500 dark:text-gray-400">
                                                @php
                                                $kode = (string) $purchase->unique_code;
                                                $jumlahDigitTerlihat = 3;
                                                $karakterMask = '*';
                                                $panjangKode = strlen($kode);
                                                $kodeTampil = $kode;

                                                if ($panjangKode > $jumlahDigitTerlihat) {
                                                    $digitTerlihat = substr($kode, -$jumlahDigitTerlihat);
                                                    $mask = str_repeat($karakterMask, $panjangKode - $jumlahDigitTerlihat);
                                                    $kodeTampil = $mask . $digitTerlihat;
                                                }
                                                @endphp
                                                <span class="font-medium text-gray-900">Kode Unik</span>: {{ $kodeTampil }}</p>
                                            </div>
                                          </div>
                        
                                        <div class="w-full sm:w-auto flex-shrink-0 mt-2 sm:mt-0">
                                            <div class="flex items-center gap-2">
                                                <svg class="h-4 w-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                                                </svg>
                                                <p class="text-sm font-medium text-gray-500">{{ $eventDate->translatedFormat('d M Y') }}</p>
                                            </div>
                                        </div>
                        
                                        <div class="w-full sm:w-auto flex-shrink-0 mt-2 sm:mt-0">
                                            <span class="inline-flex items-center rounded px-2.5 py-0.5 text-xs font-medium {{ $statusBgColor }} {{ $statusTextColor }}">
                                                <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    {!! $statusIconSvg !!}
                                                </svg>
                                                {{ $statusText }}
                                            </span>
                                        </div>
                        
                                        <div class="col-span-2 content-center sm:col-span-1 sm:justify-self-end">
                                            <button type="button" class="w-full rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 sm:w-auto">View details</button>
                                          </div>
                                    </div>
                                @else
                                    <div class="py-6">
                                        <p class="text-gray-500">Informasi event untuk pembelian dengan invoice {{ $purchase->nomor_invoice }} tidak ditemukan.</p>
                                    </div>
                                @endif
                                 @if(!$loop->last)
                                    <hr class="my-0"> {{-- Atur margin jika perlu --}}
                                @endif
                            @endforeach

              </div>
            </div>
          </div>
        </div>
    </section>
</x-main-layout>