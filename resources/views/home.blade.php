<x-main-layout>  
    <section id="home" class="pt-32 bg-cover bg-center">
        <div class="py-16 px-4 mx-auto max-w-screen-xl text-center lg:px-12">
            <a href="#" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full " role="alert">
                <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3">Baru</span>
                <span class="text-sm font-medium">Event incaranmu sudah tersedia</span> 
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </a>
            <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-50 md:text-3xl lg:text-4xl">Hai kamu, mau ng-event kemana?</h1>
            <p class="mb-8 text-lg font-normal text-gray-50 lg:text-xl sm:px-16 xl:px-48">Jelajahi tiket event bersama ticket-ink.com</p>
            <div class="mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">      
                <form class="max-w-3xl mx-auto" method="GET" action="{{ route('event.show') }}">   
                    <div class="flex">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                        <input type="search" id="default-search" name="q" value="{{ request('q') }}" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-s-xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari event yang kamu sukai . . ." required />
                        <button type="submit" class="text-white end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-e-xl text-sm px-4 py-2">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
  
    <section class="bg-gray-50 py-8 antialiased md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <div>
                    <h2 class="mt-3 text-xl font-semibold text-gray-900 sm:text-2xl">Event Terpopuler</h2>
                </div>
            </div>
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                    <div class="w-full">
                        <a href="#">
                            <img class="mx-auto w-full h-auto" src="/img/848274828252.jpg" alt="" />
                        </a>
                    </div>
                    <div class="p-6">
                        <div class="mb-4 flex items-center justify-between gap-4">
                            <span class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800"> Outdoor </span>
                            <div class="flex items-center justify-end gap-1">
                                <button type="button" data-tooltip-target="tooltip-quick-look" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                                    <span class="sr-only"> Quick look </span>
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                                <div id="tooltip-quick-look" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300" data-popper-placement="top">
                                    Detail
                                    <div class="tooltip-arrow" data-popper-arrow=""></div>
                                </div>
                                <div id="tooltip-add-to-favorites" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300" data-popper-placement="top">
                                    Add to favorites
                                    <div class="tooltip-arrow" data-popper-arrow=""></div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline">Jakarta Night Festival 2025</a>
                        <ul class="mt-2 flex items-center gap-4">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                </svg>                  
                                <p class="text-sm font-medium text-gray-500">27 Juni 2025</p>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                </svg>
                                <p class="text-sm font-medium text-gray-500">Monas</p>
                            </li>
                        </ul>
                        <div class="mt-4 flex items-center justify-between gap-4">
                            <p class="text-xl font-extrabold leading-tight text-gray-900">Rp 20.000</p>
                            <button type="button" class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300">
                                <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                </svg>
                                Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full text-center">
                <button type="button" class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">Tampilkan Lebih Banyak</button>
            </div>
        </div>
    </section>
  
    <section class="bg-white py-8 antialiased">
        <div class="mx-auto grid max-w-screen-xl px-4 pb-8 md:grid-cols-12 lg:gap-12 lg:pb-16 xl:gap-0">
            <div class="content-center justify-self-start md:col-span-7 md:text-start">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:max-w-2xl">Jangan!<br />Sampai Kehabisan.</h1>
                <p class="mb-4 max-w-2xl text-gray-500 md:mb-12 md:text-lg lg:mb-5 lg:text-xl">Jelajahi dan Segera Selesaikan Pembelian Tiket Event yang Kamu Sukai.</p>
                <a href="#" class="inline-block rounded-lg bg-primary-700 px-6 py-3.5 text-center font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 ">Checkout Sekarang!</a>
            </div>
            <div class="hidden md:col-span-5 md:mt-0 md:flex">
                <img class="py-8" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/girl-shopping-list.svg" alt="shopping illustration" />
            </div>
        </div>
    </section>
</x-main-layout>