<x-main-layout>
    <section class="pt-32 pb-16 bg-white">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
          <div class="lg:grid lg:grid-cols-2 gap-8">
            <div class="shrink-0 ">
              <img class="h-full w-full object-cover object-center" src="{{ asset($event->image) }}" alt="{{ $event->slug }}" />
            </div>
    
            <div class="mt-6 sm:mt-8 lg:mt-0">
              <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">
                {{ $event->name }}
              </h1>
              <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
                    Rp {{ number_format($event->price, 0, ',', '.') }}
                </p>
    
                <div class="flex items-center gap-2 mt-2 sm:mt-0">
                    <ul class="mt-2 flex items-center gap-4">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                            </svg>                  
                            <p class="text-base font-medium text-gray-500">{{ Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                            </svg>
                            <p class="text-base font-medium text-gray-500">{{ $event->location }}</p>
                        </li>
                    </ul>
                </div>
              </div>

              <form action="{{ route('checkout.prepare') }}" method="POST">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                    {{-- Input jumlah tiket sekarang hidden dengan nilai default 1 --}}
                    <input type="hidden" name="jumlah_tiket" value="1"> 

                    {{-- Label dan input number untuk jumlah tiket dihilangkan --}}
                    {{-- Pesan stok habis atau event tidak tersedia bisa tetap ditampilkan jika relevan --}}
                    @if ($event->total !== null && $event->total == 0 && $event->status == 'accept')
                        <p class="mt-1 mb-4 text-sm text-red-600">Tiket untuk event ini sudah habis.</p>
                    @elseif($event->status != 'accept')
                        <p class="mt-1 mb-4 text-sm text-yellow-600">Event tidak tersedia untuk pembelian saat ini.</p>
                    @endif

                <div class="mt-4 sm:gap-4 sm:items-center sm:flex">
                  <button type="submit" class="text-white w-full sm:w-auto bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center" role="button" >
                    Beli Sekarang
                  </button>

                  <p class="text-gray-400">Sisa Tiket: {{ $event->total }}</p>
                </div>
              </form>
    
              <hr class="my-6 md:my-8 border-gray-200" />
    
              <p class="mb-6 text-gray-500">
                {{$event->description}}
              </p>
            </div>
          </div>
        </div>
    </section>
</x-main-layout>