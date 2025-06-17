<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Event') }}
        </h2>
    </x-slot>
    
        <div x-data="{tab: 'edit'}" class="mx-auto max-w-7xl py-4 px-8">
          <div class="gap-4 lg:flex">
            <!-- Sidenav -->
            <aside id="sidebar" class="hidden h-full w-80 shrink-0 overflow-y-auto border border-gray-200 bg-white p-3 shadow-sm lg:block lg:rounded-lg">
                <div class="flex w-full items-center justify-between mb-4">
                    <img class="w-full rounded-md" src="{{ asset($event->image) }}" alt="{{ $event->slug }}">
                </div>

                <div class="flex w-full items-center justify-between pb-4">
                    <h2 class="text-gray-900 font-medium">{{ $event->name }}</h2>
                </div>

              <div class="mb-4 w-full border-y border-gray-100 py-4">
                <ul class="grid grid-cols-3 gap-2">
                  <li>
                    <a href="#" class="group flex flex-col items-center justify-center rounded-xl bg-primary-50 p-2.5 hover:bg-primary-100">
                      <span class="mb-1 flex h-8 w-8 items-center justify-center rounded-full bg-primary-100 group-hover:bg-primary-200">
                        <svg class="h-5 w-5 text-primary-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 2a10 10 0 1 0 10 10A10.009 10.009 0 0 0 12 2Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.093 20.093 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM10 3.707a8.82 8.82 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.755 45.755 0 0 0 10 3.707Zm-6.358 6.555a8.57 8.57 0 0 1 4.73-5.981 53.99 53.99 0 0 1 3.168 4.941 32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.641 31.641 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM12 20.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 15.113 13a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"/>
                        </svg>
                      </span>
                      <span class="text-sm font-medium text-primary-700">{{ Str::ucfirst($event->category) }}</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="group flex flex-col items-center justify-center rounded-xl bg-red-50 p-2.5 hover:bg-red-100">
                      <span class="mb-1 flex h-8 w-8 items-center justify-center rounded-full bg-red-100 group-hover:bg-red-200">
                        <p class="text-xs text-red-700 font-medium">{{ $event->total }}</p>
                      </span>
                      <span class="text-sm font-medium text-red-600">Sisa Tiket</span>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="group flex flex-col items-center justify-center rounded-xl bg-teal-50 p-2.5 hover:bg-teal-100">
                      <span class="mb-1 flex h-8 w-8 items-center justify-center rounded-full bg-teal-100 group-hover:bg-teal-200">
                        <svg class="h-5 w-5 text-teal-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                        </svg>
                      </span>
                      <span class="text-sm font-medium text-teal-600">{{ $event->status }}</span>
                    </a>
                  </li>
                </ul>
              </div>
      
              <ul class="space-y-2">
                <li>
                  <a href="#" @click.prevent="tab = 'edit'" class="group flex items-center rounded-lg p-2 text-base font-medium text-gray-900 hover:bg-gray-100">
                    <svg class="h-6 w-6 text-gray-400 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                    </svg>
                    <span class="ml-3 flex-1 whitespace-nowrap">Sesuaikan</span>
                  </a>
                </li>
                <li>
                  <a href="#" @click.prevent="tab = 'purchase'" class="group flex items-center rounded-lg p-2 text-base font-medium text-gray-900 hover:bg-gray-100">
                    <svg class="h-6 w-6 text-gray-400 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                    </svg>
                    <span class="ml-3">Pembelian</span>
                  </a>
                </li>
              </ul>
              <ul class="mt-5 space-y-2 border-t border-gray-100 pt-5">
                <li>
                  <form action="{{ route('event.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus event ini?')" class="w-full">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="group w-full flex items-center rounded-lg p-2 text-base font-medium text-red-600 hover:bg-red-100">
                    <svg class="h-6 w-6 flex-shrink-0 text-red-600 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                    <span class="ml-3 flex-1 text-start whitespace-nowrap">Hapus</span>
                  </button>
                  </form>
                </li>
              </ul>
            </aside>
            <!-- Right content -->
            <div x-show="tab === 'edit'" class="w-full">
                <form action="{{ route('event.update', $event->id) }}" enctype="multipart/form-data" method="POST" class="w-full border border-gray-200 bg-white p-4 shadow-sm lg:block lg:rounded-lg">
                  @csrf
                  @method('PATCH')
                    <div class="space-y-6">
                      <h3 class="text-xl font-semibold text-gray-900 border-b border-gray-100 pb-4">SESUAIKAN DESKRIPSI EVENT</h3>
      
                      <div class="grid gap-4 mb-4 sm:grid-cols-2">
                          <div>
                              <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Event</label>
                              <input type="text" name="name" id="name" value="{{ old('name', $event->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                          </div>
                          <div>
                              <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                              <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option value="indoor" {{ old('category', $event->category) == 'indoor' ? 'selected' : '' }}>Indoor</option>
                                <option value="outdoor" {{ old('category', $event->category) == 'outdoor' ? 'selected' : '' }}>Outdoor</option>
                                <option value="virtual" {{ old('category', $event->category) == 'virtual' ? 'selected' : '' }}>Virtual</option>
                            </select>
                          </div>
                          <div class="sm:col-span-2">
                              <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                              <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500">{{ old('description', $event->description) }}</textarea>
                          </div>
                          <div>
                              <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                              <input type="date" name="date" id="date" value="{{ old('date', \Carbon\Carbon::parse($event->date)->format('Y-m-d')) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                          </div>
                          <div>
                              <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                              <input type="number" name="price" id="price" value="{{ old('price', $event->price) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                          </div>
                          <div>
                              <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Lokasi</label>
                              <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                          </div>
                          <div>
                              <label for="total" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Tiket</label>
                              <input type="number" name="total" id="total" value="{{ old('total', $event->total) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                          </div>  
                          <div class="sm:col-span-2">
                              <label for="dropzone-file" class="block mb-2 text-sm font-medium text-gray-900">Thumbnail</label>
                              <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">PNG or JPG (MAX. 1920x1080px)</p>
                                    </div>
                                    <input id="dropzone-file" name="image" type="file" class="hidden" />
                                </label>
                            </div>
                            @if($event->image)
                                <img src="{{ asset($event->image) }}" alt="Thumbnail" class="mt-2 w-32 h-20 object-cover rounded">
                            @endif 
                          </div>                       
                      </div>
                      <a class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                          Batal
                      </a>
                      <button type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                          Sesuaikan Event
                      </button>
                    </div>
                </form>
            </div>

            {{-- Second Content --}}
            <div x-show="tab === 'purchase'" class="w-full bg-white rounded-lg p-4">
              <div class="flex items-center justify-between border-b border-gray-100 mb-4 pb-4">
                <h3 class="text-xl font-semibold text-gray-900">DAFTAR PEMBELI</h3>
                <button id="start-scan-button" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xs px-5 py-2.5">
                  Mulai Scan Check-in
                </button>
              </div>

              {{-- QR Code Scanner Interface --}}
              <div id="qr-scanner-container" class="mb-6" style="display:none;">
                <div id="qr-reader" style="width:100%; max-width:400px; margin: 0 auto;"></div>
                <div id="qr-reader-results" class="mt-4 text-center"></div>
                <label for="manual-code-input" class="block mb-2 text-sm font-medium text-gray-900">Masukkan Kode Unik Manual:</label>
                <div class="flex gap-2 w-full">
                    <input type="text" id="manual-code-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full" placeholder="Contoh: T-67876">
                    <button id="submit-manual-code-button" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-64">
                      Check-in
                    </button>
                </div>
                <div id="manual-checkin-results" class="mt-2 text-sm"></div>
                <button id="stop-scan-button" type="button" class="mt-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5" style="display:none;">
                    Stop Scan
                </button>
              </div>
              
              <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Pembeli
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tgl. Pembelian
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode Unik
                        </th>
                        <th scope="col" class="px-6 py-3 whitespace-nowrap text-center">
                          Kehadiran
                        </th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($event->pembelians as $pembelian)
                    @if ($pembelian->user) {{-- Pastikan data user ada --}}
                      <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                          {{ $pembelian->user->name }}
                        </th>
                        <td class="px-6 py-4">
                          {{ $pembelian->user->email }}
                        </td>
                        <td class="px-6 py-4">
                          {{ \Carbon\Carbon::parse($pembelian->tanggal_pembelian)->translatedFormat('d M Y, H:i') }}
                        </td>
                        <td class="px-6 py-4">
                          {{ $pembelian->unique_code }}
                        </td>
                        <td class="px-6 py-4">
                          {{ $pembelian->status }}
                        </td>
                      </tr>
                    @endif
                    @endforeach
                </tbody>
              </table>
              </div>
            </div>
                
          </div>
        </div>

        <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const startScanButton = document.getElementById('start-scan-button');
            const stopScanButton = document.getElementById('stop-scan-button');
            const qrScannerContainer = document.getElementById('qr-scanner-container');
            const qrReaderElement = document.getElementById('qr-reader');
            const qrReaderResultsElement = document.getElementById('qr-reader-results');
            let html5QrCode;

            const manualCodeInput = document.getElementById('manual-code-input');
            const submitManualCodeButton = document.getElementById('submit-manual-code-button');
            const manualCheckinResultsElement = document.getElementById('manual-checkin-results');

            const eventId = {{ $event->id }}; // Get event ID

            function processCheckin(code) {
                console.log(`Processing check-in for code = ${code} for event ID = ${eventId}`);
                manualCheckinResultsElement.textContent = `Memproses kode: ${code}...`;
                qrReaderResultsElement.textContent = `Memproses: ${code}...`;

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/api/events/${eventId}/checkin`, { 
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ unique_code: code })
                 })
                  .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                  })
                  .then(data => {
                    if(data.success) {
                        manualCheckinResultsElement.textContent = `Sukses: ${data.message}`;
                        qrReaderResultsElement.textContent = `Sukses: ${data.message}`;
                        // Optionally, refresh part of the page or the whole page
                        // location.reload(); 
                        // Or update the specific row in the table if you implement that
                    } else {
                        manualCheckinResultsElement.textContent = `Gagal: ${data.message}`;
                        qrReaderResultsElement.textContent = `Gagal: ${data.message}`;
                    }
                  })
                  .catch(error => {
                    console.error('Error during check-in:', error);
                    const errorMessage = error.message || 'Terjadi kesalahan saat check-in.';
                    manualCheckinResultsElement.textContent = `Error: ${errorMessage}`;
                    qrReaderResultsElement.textContent = `Error: ${errorMessage}`;
                  });
            }

            function onScanSuccess(decodedText, decodedResult) {
                qrReaderResultsElement.textContent = `Hasil Scan: ${decodedText}`;
                processCheckin(decodedText);
            }

            function onScanFailure(error) {
                // console.warn(`Code scan error = ${error}`);
            }

            startScanButton.addEventListener('click', () => {
                qrScannerContainer.style.display = 'block';
                stopScanButton.style.display = 'block';
                startScanButton.style.display = 'none';
                qrReaderResultsElement.textContent = ''; 
                manualCheckinResultsElement.textContent = '';

                html5QrCode = new Html5Qrcode("qr-reader");
                const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                    onScanSuccess(decodedText, decodedResult);
                };
                const config = { fps: 10, qrbox: { width: 250, height: 250 } };

                html5QrCode.start({ facingMode: "user" }, config, qrCodeSuccessCallback, onScanFailure)
                .catch(err => {
                    console.error("Failed to start QR scanner with front camera, trying environment.", err);
                    html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback, onScanFailure)
                    .catch(errInner => {
                        qrReaderResultsElement.textContent = "Tidak dapat memulai kamera untuk scan.";
                        console.error("Failed to start QR scanner.", errInner);
                        qrScannerContainer.style.display = 'none';
                        stopScanButton.style.display = 'none';
                        startScanButton.style.display = 'inline-flex';
                    });
                });
            });

            stopScanButton.addEventListener('click', () => {
                if (html5QrCode && html5QrCode.isScanning) {
                    html5QrCode.stop().then(ignore => {
                        qrScannerContainer.style.display = 'none';
                        stopScanButton.style.display = 'none';
                        startScanButton.style.display = 'inline-flex';
                        qrReaderResultsElement.textContent = "Scan dihentikan.";
                    }).catch(err => {
                        console.error("Failed to stop QR scanner.", err);
                        qrReaderResultsElement.textContent = "Gagal menghentikan scan.";
                    });
                }
            });

            submitManualCodeButton.addEventListener('click', () => {
                const code = manualCodeInput.value.trim();
                if (code) {
                    processCheckin(code);
                    manualCodeInput.value = ''; 
                } else {
                    manualCheckinResultsElement.textContent = 'Silakan masukkan kode unik.';
                }
            });

            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === "style") {
                        const purchaseTabElement = qrScannerContainer.closest('[x-show="tab === \'purchase\'"]');
                        if (purchaseTabElement) {
                            const isPurchaseTabVisible = purchaseTabElement.style.display !== 'none';
                            if (!isPurchaseTabVisible && html5QrCode && typeof html5QrCode.isScanning === 'boolean' && html5QrCode.isScanning) {
                                html5QrCode.stop().then(ignore => {
                                    qrScannerContainer.style.display = 'none';
                                    stopScanButton.style.display = 'none';
                                    startScanButton.style.display = 'inline-flex';
                                }).catch(err => console.error("Failed to stop QR scanner on tab change.", err));
                            }
                        }
                    }
                });
            });
            const purchaseTabDiv = document.querySelector('[x-show="tab === \'purchase\'"]');
            if(purchaseTabDiv){
                 observer.observe(purchaseTabDiv, { attributes: true, subtree: true });
            }
        });
    </script>
    
</x-app-layout>