<x-guest-layout>
    <div class="w-full lg:flex min-h-screen">
        <div class="w-full flex items-center bg-white rounded-lg">
            <div class="w-full p-6 space-y-4 md:space-y-6 sm:p-16">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl  border-b border-gray-200 py-8">
                    Perjalananmu Dimulai di Sini!
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="John Doe" required autofocus autocomplete="username" value="{{ old('name') }}">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="johndoe" required autofocus autocomplete="username" value="{{ old('username') }}">
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Kamu</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@youremail.com" required autofocus autocomplete="username" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="accept-terms" aria-describedby="accept-terms" name="accept-terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="accept-terms" class="text-gray-500">Saya menyetujui <span class="text-primary-700">syarat & ketentuan</span> yang berlaku.</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Log In</button>
                    <p class="text-sm font-light text-gray-500">
                        Sudah memiliki akun? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline">Login Sekarang</a>
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
