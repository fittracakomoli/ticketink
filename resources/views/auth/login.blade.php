<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full lg:flex min-h-screen">
        <div class="w-full flex items-center bg-white rounded-lg">
            <div class="w-full p-6 space-y-4 md:space-y-6 sm:p-16">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl  border-b border-gray-200 py-8">
                    Halo, Selamat Datang Kembali!
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Kamu</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@youremail.com" required autofocus autocomplete="username" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" name="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500">Ingat Saya</label>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-primary-600 hover:underline">Lupa Password</a>
                        @endif
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Log In</button>
                    <p class="text-sm font-light text-gray-500">
                        Belum memiliki akun? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline">Daftar Sekarang</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="bg-primary-900 w-full p-8 lg:p-16 flex items-center">
            <div class="w-full">
                <h3 class="text-white text-3xl font-semibold">Ticket-Ink</h3>
                <h1 class="text-white text-5xl font-bold py-8">Temukan Event Favoritmu Bersama Ticket-ink.com.</h1>
                <p  class="text-white">Siap jelajahi berbagai event seru dengan mudah dan praktis? Gabung ticket-ink sekarang juga! Jangan sampai kehabisan tiket impianmu, daftar dan amankan tempatmu. Nikmati pengalaman beli tiket yang cepat, mudah, dan tanpa ribet, hanya di ticket-ink. Petualangan eventmu dimulai di sini.</p>
            </div>
        </div>
    </div>
    
</x-guest-layout>
