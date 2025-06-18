<nav class="antialiased fixed w-full transition-all text-gray-50 bg-[#102041] z-10">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-6">
        <div class="flex items-center justify-between">
  
            <div class="flex items-center space-x-12 navlink">
                <div class="shrink-0">
                    <a href="/" title="" class="">
                        <p class="font-bold text-2xl">Ticket-Ink</p>
                    </a>
                </div>
  
                <ul class="hidden lg:flex items-center justify-start gap-6 md:gap-8 py-3 sm:justify-center">
                    <li class="shrink-0">
                        <a href="{{ route('home') }}" title="" class="flex text-sm font-normal hover:text-primary-700">
                            Beranda
                        </a>
                    </li>
                    <li class="shrink-0">
                        <a href="{{ route('event.show') }}" title="" class="flex text-sm font-normal hover:text-primary-700">
                            Beli Tiket
                        </a>
                    </li>
                    <li class="shrink-0">
                        <a href="/about" title="" class="flex text-sm font-normal hover:text-primary-700">
                            Tentang Kami
                        </a>
                    </li>
                    <li class="shrink-0">
                        <a href="/contact" title="" class="flex text-sm font-normal hover:text-primary-700">
                            Kontak Kami
                        </a>
                    </li>
                </ul>
            </div>
  
            <div class="flex items-center space-x-2">

                @guest
                <a href="{{ route('login') }}" class="inline-flex border border-white items-center rounded-lg justify-center px-4 py-2.5 hover:bg-primary-700 text-sm font-medium leading-none">
                    <span>Masuk</span>             
                </a>

                <a href="{{ route('register') }}" class="inline-flex border border-primary-700 items-center rounded-lg justify-center px-4 py-2.5 bg-primary-700 text-sm font-medium leading-none">
                    <span>Daftar Sekarang</span>             
                </a>
                @endguest

                @auth
                <button id="profileDropdownButton1" data-dropdown-toggle="profileDropdown1" type="button" class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-primary-700 text-sm font-medium leading-none">
                    <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>              
                    {{ Auth::user()->username }}
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg> 
                </button>
  
                <div id="profileDropdown1" class="hidden z-10 w-56 divide-y divide-gray-100 overflow-hidden overflow-y-auto rounded-lg bg-white antialiased shadow">
                    <ul class="p-2 text-start text-sm font-medium text-gray-900">
                        <li>
                            <a href="#" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100"> Edit Profil </a>
                        </li>
                        <li>
                            <a href="{{ route('my.tickets') }}" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100"> Tiket Saya </a>
                        </li>
                    </ul>
        
                    <div class="p-2 text-sm font-medium text-gray-900">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100"> Log Out </button>
                        </form>
                    </div>
                </div>
                
                @endauth
  
                <button type="button" data-collapse-toggle="ecommerce-navbar-menu-1" aria-controls="ecommerce-navbar-menu-1" aria-expanded="false" class="inline-flex lg:hidden items-center justify-center hover:bg-gray-100 rounded-md p-2 text-gray-50">
                    <span class="sr-only">
                        Open Menu
                    </span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                    </svg>                
                </button>
            </div>
        </div>
  
        <div id="ecommerce-navbar-menu-1" class="bg-gray-50 border border-gray-200 rounded-lg py-3 hidden px-4 mt-4">
            <ul class="text-gray-900 text-sm font-medium space-y-3">
                <li>
                    <a href="/" class="hover:text-primary-700">Beranda</a>
                </li>
                <li>
                    <a href="/tickets" class="hover:text-primary-700">Beli Tiket</a>
                </li>
                <li>
                    <a href="#" class="hover:text-primary-700">Tentang Kami</a>
                </li>
                <li>
                    <a href="#" class="hover:text-primary-700">Kontak Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>