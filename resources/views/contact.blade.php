<x-main-layout>
    <section id="home" class="bg-cover bg-center">
        <div class="py-16 px-4 mx-auto max-w-screen-xl text-center lg:px-12">
            <h1 class="mt-20 mb-36 text-2xl font-extrabold tracking-tight leading-none text-gray-50 md:text-3xl lg:text-4xl">Kontak Kami</h1>
        </div>
    </section>

    <section class="py-12 px-4 mx-auto max-w-screen-xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Kami Siap Membantu Anda</h2>
            <p class="text-lg text-gray-700 leading-relaxed">
                Ada pertanyaan, masukan, atau membutuhkan bantuan? Jangan ragu untuk menghubungi tim kami melalui berbagai saluran di bawah ini.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="text-4xl text-blue-600 mb-4">📞</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Telepon Kami</h3>
                <p class="text-gray-600">Senin - Jumat, 09.00 - 17.00 WIB</p>
                <p class="text-blue-600 font-bold text-lg">0812-3456-7890</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="text-4xl text-blue-600 mb-4">✉️</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Email Kami</h3>
                <p class="text-gray-600">Kirim pertanyaan Anda kapan saja.</p>
                <p class="text-blue-600 font-bold text-lg">support@ticket-ink.com</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <div class="text-4xl text-blue-600 mb-4">📍</div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Alamat Kami</h3>
                <p class="text-gray-600">Jl. Akbar Raya No. 123, Kota Semarang, Jawa Tengah</p>
                <p class="text-blue-600 font-bold text-lg"><a href="https://maps.google.com" target="_blank" class="hover:underline">Lihat di Peta</a></p>
            </div>
        </div>

        <div class="max-w-3xl mx-auto bg-white p-8 sm:p-10 rounded-xl shadow-xl mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Kirimkan Pesan kepada Kami</h2>
            <form action="#" method="POST" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="full-name" class="block mb-2 text-sm font-medium text-gray-800">Nama Lengkap</label>
                        <input type="text" id="full-name" name="full-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition-colors duration-300" placeholder="John Doe" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-800">Alamat Email</label>
                        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition-colors duration-300" placeholder="anda@email.com" required>
                    </div>
                </div>
                <div>
                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-800">Subjek</label>
                    <input type="text" id="subject" name="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition-colors duration-300" placeholder="Tuliskan subjek pesan Anda" required>
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-800">Pesan Anda</label>
                    <textarea id="message" name="message" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 transition-colors duration-300" placeholder="Tuliskan pertanyaan atau masukan Anda di sini..." required></textarea>
                </div>
                <div class="text-center pt-2">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-12 py-3 text-center transition-colors duration-300">Kirim Pesan</button>
                </div>
            </form>
        </div>

        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Temukan Kami di Media Sosial</h2>
            <p class="text-lg text-gray-700 mb-6">Ikuti kami untuk informasi terbaru dan promo menarik!</p>
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-blue-600 hover:text-blue-800 text-3xl transition-colors" aria-label="Facebook">📘</a>
                <a href="#" class="text-blue-400 hover:text-blue-600 text-3xl transition-colors" aria-label="Twitter">🐦</a>
                <a href="#" class="text-pink-600 hover:text-pink-800 text-3xl transition-colors" aria-label="Instagram">📸</a>
                <a href="#" class="text-red-600 hover:text-red-800 text-3xl transition-colors" aria-label="YouTube">▶️</a>
            </div>
        </div>
    </section>
</x-main-layout>
