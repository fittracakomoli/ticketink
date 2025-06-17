<x-main-layout>
    <section id="home" class="pt-32 bg-cover bg-center">
        <div class="py-2 px-4 mx-auto max-w-screen-xl text-center lg:px-0">
            <div class="mb-8 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">      
                <form class="mx-auto" method="GET" action="{{ route('event.show') }}">   
                    <div class="flex">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                        <input type="search" id="default-search" name="q" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-s-xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari event yang kamu sukai . . ." value="{{ request('q') }}" required />
                        <button type="submit" class="text-white end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-e-xl text-sm px-4 py-2">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
  
    <section class="bg-gray-50 py-8 antialiased md:pb-12">
      <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <div>
                    <h2 class="mt-3 text-xl font-semibold text-gray-900 sm:text-2xl">Temukan Event Favoritmu</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <button id="sortDropdownButton1" data-dropdown-toggle="dropdownSort1" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 sm:w-auto">
                        <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                        </svg>
                        Urutkan
                        <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdownSort1" class="z-50 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow" data-popper-placement="bottom">
                        <ul class="p-2 text-left text-sm font-medium text-gray-500" aria-labelledby="sortDropdownButton">
                            <li>
                                <a href="{{ route('event.show', array_merge(request()->except('page'), ['sort_by' => 'newly_added'])) }}"
                                   class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white {{ ($sortBy ?? 'newly_added') == 'newly_added' ? 'text-primary-700 dark:text-primary-500 font-semibold' : 'text-gray-500 dark:text-gray-400' }}">
                                    Baru Ditambahkan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('event.show', array_merge(request()->except('page'), ['sort_by' => 'name_asc'])) }}"
                                   class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white {{ ($sortBy ?? '') == 'name_asc' ? 'text-primary-700 dark:text-primary-500 font-semibold' : 'text-gray-500 dark:text-gray-400' }}">
                                    Abjad (A-Z)
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('event.show', array_merge(request()->except('page'), ['sort_by' => 'name_desc'])) }}"
                                   class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white {{ ($sortBy ?? '') == 'name_desc' ? 'text-primary-700 dark:text-primary-500 font-semibold' : 'text-gray-500 dark:text-gray-400' }}">
                                    Abjad (Z-A)
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('event.show', array_merge(request()->except('page'), ['sort_by' => 'price_asc'])) }}"
                                   class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white {{ ($sortBy ?? '') == 'price_asc' ? 'text-primary-700 dark:text-primary-500 font-semibold' : 'text-gray-500 dark:text-gray-400' }}">
                                    Harga (Termurah)
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('event.show', array_merge(request()->except('page'), ['sort_by' => 'price_desc'])) }}"
                                   class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white {{ ($sortBy ?? '') == 'price_desc' ? 'text-primary-700 dark:text-primary-500 font-semibold' : 'text-gray-500 dark:text-gray-400' }}">
                                    Harga (Termahal)
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('event.show', array_merge(request()->except('page'), ['sort_by' => 'date_desc'])) }}"
                                   class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white {{ ($sortBy ?? '') == 'date_desc' ? 'text-primary-700 dark:text-primary-500 font-semibold' : 'text-gray-500 dark:text-gray-400' }}">
                                    Tanggal Event (Terbaru)
                                </a>
                            </li>
                             <li>
                                <a href="{{ route('event.show', array_merge(request()->except('page'), ['sort_by' => 'date_asc'])) }}"
                                   class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white {{ ($sortBy ?? '') == 'date_asc' ? 'text-primary-700 dark:text-primary-500 font-semibold' : 'text-gray-500 dark:text-gray-400' }}">
                                    Tanggal Event (Terlama)
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($events as $event )
                <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                    <div class="w-full">
                        <a href="{{ route('ticket.detail', $event->slug) }}">
                            <img class="mx-auto w-full h-48 object-cover object-center rounded-t-lg" src="{{ asset($event->image) }}" alt="{{ $event->slug }}" />
                        </a>
                    </div>
                    <div class="p-6">
                        <div class="mb-4 flex items-center justify-between gap-4">
                            <span class="me-2 rounded px-2.5 py-0.5 text-xs font-medium
                            @if ($event->category == 'outdoor')
                            bg-primary-100 text-primary-800
                            @elseif ($event->category == 'indoor')
                            bg-green-100 text-green-800
                            @elseif ($event->category == 'virtual')
                            bg-yellow-100 text-yellow-800
                            @endif
                            "> {{ Str::ucfirst($event->category) }} </span>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                </svg>                  
                                <p class="text-xs font-medium text-gray-500">{{ Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
                            </div>
                        </div>
                        <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{ $event->name }}</a>
                        <ul class="mt-2 flex items-center gap-4">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                </svg>
                                <p class="text-xs font-medium text-gray-500">{{ $event->location }}</p>
                            </li>
                        </ul>
                        <div class="mt-8 flex items-center justify-between gap-4">
                            <p class="text-lg font-extrabold leading-tight text-gray-900">Rp {{ number_format($event->price, 0, ',', '.') }}</p>
                            @auth
                            <div class="flex items-center gap-2">
                                <button type="button" class="inline-flex items-center rounded-lg border border-primary-300 p-2.5 text-sm font-medium text-white hover:bg-primary-800">
                                    <svg class="h-5 w-5 text-primary-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                    </svg>
                                </button>
                                <a href="#" class="bg-primary-700 text-white text-base px-4 py-2.5 rounded-lg hover:bg-primary-900">
                                    Beli
                                </a>
                            </div>
                            @endauth

                            @guest
                            <div class="flex items-center gap-2">
                                <button type="button" class="inline-flex items-center rounded-lg border border-primary-300 p-2.5 text-sm font-medium text-white hover:bg-primary-800">
                                    <svg class="h-5 w-5 text-primary-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                    </svg>
                                </button>
                                <a href="{{ route('login') }}" class="bg-primary-700 text-white text-base px-4 py-2.5 rounded-lg hover:bg-primary-900">
                                    Beli
                                </a>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
  </x-main-layout>