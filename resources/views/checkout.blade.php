<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-poppins antialiased">
        <section class="bg-white py-8 antialiased">
            <form action="{{ route('checkout.bayar') }}" method="POST" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
              @csrf
              <input type="hidden" name="event_id" value="{{ $event_id }}">
              <input type="hidden" name="biaya_layanan" value="{{ $biaya_layanan }}">
              <input type="hidden" name="total_pembayaran" value="{{ $total_pembayaran }}">

              <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                <div class="min-w-0 flex-1 space-y-8">
                  <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-900">Informasi Pembeli</h3>
                    <div class="bg-white shadow-sm">
                      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="col-span-2">
                          <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                          <input type="text" id="nama" value="{{ old('nama', Auth::user()->name) }}" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                        </div>
                        <div>
                          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                          <input type="email" id="email" value="{{ old('email', Auth::user()->email) }}" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm" />
                        </div>
                        <div>
                          <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                          <input type="text" id="username" value="{{ old('username', Auth::user()->username) }}" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm" />
                        </div>
                      </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900">Tiket yang Dibeli</h3>
                    <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm md:p-6">
                      <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                        <a href="#" class="shrink-0 md:order-1">
                          <img class="h-20 w-full" src="{{ asset($event_image) }}" alt="{{ $event_name }}" />
                        </a>
                        <div class="flex items-center justify-between md:order-3 md:justify-end">
                          <div class="text-end md:order-4 md:w-32">
                            <p class="text-base font-bold text-gray-900">Rp {{ number_format($harga_per_tiket, 0, ',', '.') }}</p>
                          </div>
                        </div>
          
                        <div class="w-full min-w-0 flex-1 md:order-2 md:max-w-md">
                          <p class="text-base font-medium text-gray-900 hover:underline">{{ $event_name }}</p>
                          <p class="text-xs text-gray-400 hover:underline">Jumlah: {{ $jumlah_tiket }} tiket</p>
                        </div>
                      </div>
                    </div>

                    <h3 class="text-xl font-semibold text-gray-900">Metode Pembayaran</h3>
                      <select id="metode_pembayaran" name="metode_pembayaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                          <option selected="">Pilih Metode Pembayaran</option>
                          <option value="virtual_account">Virtual Account</option>
                          <option value="qris">QRIS</option>
                          <option value="e-wallet">E-Wallet</option>
                      </select>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    </div>
                  </div>
                </div>
          
                <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                  <div class="flow-root">
                    <div class="-my-3 divide-y divide-gray-200">
                      <dl class="flex items-center justify-between gap-4 py-3">
                        <dt class="text-base font-normal text-gray-500">Subtotal ({{ $jumlah_tiket }} tiket)</dt>
                        <dd class="text-base font-medium text-gray-900">Rp {{ number_format($subtotal, 0, ',', '.') }}</dd>
                      </dl>
          
                      <dl class="flex items-center justify-between gap-4 py-3">
                        <dt class="text-base font-normal text-gray-500">Biaya Layanan</dt>
                        <dd class="text-base font-medium text-gray-900">Rp {{ number_format($biaya_layanan, 0, ',', '.') }}</dd>
                      </dl>
          
                      <dl class="flex items-center justify-between gap-4 py-3">
                        <dt class="text-base font-bold text-gray-900">Total</dt>
                        <dd class="text-base font-bold text-gray-900">Rp {{ number_format($total_pembayaran, 0, ',', '.') }}</dd>
                      </dl>
                    </div>
                  </div>
          
                  <div class="space-y-3">
                    <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300">Bayar Sekarang</button>
                  </div>
                  <div class="flex items-center justify-center gap-2">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> atau </span>
                    <a href="/tickets" title="" class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
                      Lanjutkan Menjelajah
                      <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </form>
          </section>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </body>
</html>