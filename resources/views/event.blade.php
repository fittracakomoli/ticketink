<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Event') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto my-8 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h5>
                            <span class="text-gray-500">Jumlah Event:</span>
                            <span class="">{{ $events->count() }}</span>
                        </h5>
                    </div>
                    <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                        <button id="tambahModalButton" data-modal-target="tambahModal" data-modal-toggle="tambahModal" type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Buat Event
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Event</th>
                                <th scope="col" class="px-4 py-3">Kategori</th>
                                <th scope="col" class="px-4 py-3">Deskripsi</th>
                                <th scope="col" class="px-4 py-3">Tanggal</th>
                                <th scope="col" class="px-4 py-3">Harga</th>
                                <th scope="col" class="px-4 py-3">Lokasi</th>
                                <th scope="col" class="px-4 py-3">Sisa Tiket</th>
                                <th scope="col" class="px-4 py-3">Terjual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event )
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                    <img src="{{ asset($event->image) }}" alt="{{ $event->slug }}" class="w-auto h-8 mr-3">
                                    <a href="{{ route('event.edit', $event->id) }}" class="hover:underline text-gray-900">
                                        {{ $event->name }}
                                    </a>
                                </th>
                                <td class="px-4 py-2">
                                    <span class="text-xs font-medium px-2 py-0.5 rounded
                                    @if ($event->category == 'outdoor')
                                    bg-primary-100 text-primary-800
                                    @elseif ($event->category == 'indoor')
                                    bg-green-100 text-green-800
                                    @elseif ($event->category == 'virtual')
                                    bg-yellow-100 text-yellow-800
                                    @endif
                                    ">{{ Str::ucfirst($event->category) }}</span>
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 ">{{ Str::limit($event->description, 20, '...') }}</td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ Carbon\Carbon::parse($event->date)->format('d F Y') }}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">Rp {{ number_format($event->price, 0, ',', '.') }}</td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">{{ $event->location }}</td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">
                                    <div class="flex items-center">
                                        <div class="inline-block w-4 h-4 mr-2 bg-red-700 rounded-full"></div>
                                        {{ $event->total }}
                                    </div>
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap ">-</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500">
                        Showing
                        <span class="font-semibold text-gray-900 ">1-10</span>
                        of
                        <span class="font-semibold text-gray-900 ">1000</span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700">1</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">3</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">...</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">100</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Main modal -->
            <div id="tambahModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                        <!-- Modal header -->
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                            <h3 class="text-lg font-semibold text-gray-900">
                                Buat Event Baru
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="tambahModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Event</label>
                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan nama event" required="">
                                </div>
                                <div>
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option selected="">Pilih Kategori</option>
                                        <option value="indoor">Indoor</option>
                                        <option value="outdoor">Outdoor</option>
                                        <option value="virtual">Virtual</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Masukkan deskripsi event disini"></textarea>                    
                                </div>
                                <div>
                                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                                    <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                                </div>
                                <div>
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="50000" required="">
                                </div>
                                <div>
                                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Lokasi</label>
                                    <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan lokasi event" required="">
                                </div>
                                <div>
                                    <label for="total" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Tiket</label>
                                    <input type="number" name="total" id="total" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="100" required="">
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
                                </div>                       
                            </div>
                            <button type="submit" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Buat Event Baru
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>