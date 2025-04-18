<x-layout>
    <div class="container  2xl:pt-20 px-4">
        <div class="flex justify-start items-center">
            <div class="pt-24 pb-8 lg:pt-24 2xl:pt-2">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="{{ route('wisata.pengunjung') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">

                                Wisata
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="#"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 ">{{ $wisata->nama_wisata }}</a>
                            </div>
                        </li>

                    </ol>
                </nav>
            </div>
        </div>
        <div class="">
            <div class="xl:grid grid-cols-1 xl:grid-cols-8 gap-4 flex flex-col-reverse xl:flex-col">
                <div class="xl:col-span-3 dm-sans rounded-xl">
                    <!-- Tombol Navigasi -->
                    <p class="font-bold text-2xl 2xl:text-6xl mb-8 text-[#004165] font-fjalla uppercase">
                        {{ $wisata->nama_wisata }}
                    </p>

                    <div class="flex items-start space-x-2 text-md font-semibold">
                        <!-- Tombol "Deskripsi" -->
                        <button id="btn-deskripsi"
                            class="tab-button active flex rounded-xl px-4 py-1 transition-all duration-500 ease-in-out font-poppins
       bg-gray-200 text-gray-500 hover:bg-gray-300 hover:text-gray-600 hover:scale-105 hover:shadow-lg transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                            Deskripsi
                        </button>

                        <!-- Tombol "Detail" -->
                        <button id="btn-detail"
                            class="tab-button flex rounded-xl px-4 py-1 transition-all duration-500 ease-in-out font-poppins
       bg-gray-200 text-gray-500 hover:bg-gray-300 hover:text-gray-600 hover:scale-105 hover:shadow-lg transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                            Detail
                        </button>

                        <!-- Tombol "Rute" -->
                        <a href="{{ route('ruteTerdekat.index', $wisata->nama_wisata) }}" target="_blank"
                            class="flex rounded-xl px-4 py-1 transition-all duration-500 ease-in-out font-poppins
  bg-gray-200 text-gray-500 hover:bg-gray-300 hover:text-gray-600 hover:scale-105 hover:shadow-lg transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                            Rute
                        </a>
                    </div>

                    <!-- Konten -->
                    <div class="py-4 pr-4">
                        <div id="deskripsi">
                            <p
                                class=" text-lg md:text-xl font-poppins text-gray-700 leading-loose text-justify indent-8 md:indent-12 first-letter:text-4xl first-letter:font-bold first-letter:text-gray-900 first-letter:mr-2 first-letter:font-serif">
                                {{ $wisata->deskripsi_wisata }}
                            </p>
                        </div>
                        <div id="detail" class="hidden">
                            <!-- Informasi Wisata -->
                            <div class="grid grid-cols-1 gap-4 text-gray-800">

                                <div class="grid grid-cols-12">
                                    <div class="col-span-2">
                                        <p class="font-semibold font-poppins">Kategori</p>
                                    </div>
                                    <div class="col-span-1">:</div>
                                    <div class="col-span-9">
                                        <p class="flex ml-2 font-poppins">
                                            {{ $wisata->kategori_detail->kategori->nama_kategori }},
                                            {{ $wisata->kategori_detail->nama_kategori_detail }}
                                        </p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12">
                                    <div class="col-span-2">
                                        <p class="font-semibold font-poppins">Lokasi</p>
                                    </div>
                                    <div class="col-span-1">:</div>
                                    <div class="col-span-9">
                                        <p class="flex ml-2 font-poppins">{{ $wisata->lokasi }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12">
                                    <div class="col-span-2">
                                        <p class="font-semibold font-poppins">Fasilitas</p>
                                    </div>
                                    <div class="col-span-1">:</div>
                                    <div class="col-span-9">
                                        <p class="flex ml-2 font-poppins">{{ $wisata->fasilitas }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12">
                                    <div class="col-span-2">
                                        <p class="font-semibold font-poppins">HTM</p>
                                    </div>
                                    <div class="col-span-1">:</div>
                                    <div class="col-span-9">
                                        <p class="flex ml-2 font-poppins">Rp {{ $wisata->htm_wisata }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12">
                                    <div class="col-span-2">
                                        <p class="font-semibold font-poppins">Parkir</p>
                                    </div>
                                    <div class="col-span-1">:</div>
                                    <div class="col-span-9">
                                        <p class="flex ml-2 font-poppins">{{ $wisata->parkir ?? 'Tidak tersedia' }}</p>
                                    </div>
                                </div>


                                <!-- Jam Operasional -->
                                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4  gap-2">
                                    <p class="font-semibold col-span-full font-poppins">Jam Operasional</p>
                                    @php
$jamOperasional = json_decode($wisata->jam_operasional, true) ?? [];
                                    @endphp

                                    @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $hari)
                                                                        @php
    $jamBuka = $jamOperasional[$hari]['buka'] ?? 'Kosong';
    $jamTutup = $jamOperasional[$hari]['tutup'] ?? 'Kosong';
                                                                        @endphp
                                                                        <div class="border-2 border-slate-500 p-2 rounded-lg bg-gray-50">
                                                                            <p class="font-semibold font-poppins">{{ ucfirst($hari) }}</p>
                                                                            <p class="text-sm font-poppins">Buka: <span
                                                                                    class="font-medium">{{ $jamBuka }}</span></p>
                                                                            <p class="text-sm font-poppins">Tutup: <span
                                                                                    class="font-medium">{{ $jamTutup }}</span></p>
                                                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="xl:col-span-5 flex flex-col rounded-lg xl:rounded-2xl overflow-hidden ">
                    <!-- Gambar Utama dan Galeri -->
                    <div class="col-span-4 rounded-lg overflow-hidden">
                        <!-- Gambar Utama -->
                        <div class="w-full">
                            @if (!empty($imgDetails) && isset($imgDetails[0]))
                                <img id="main-image" src="{{ asset('storage/' . $imgDetails[0]) }}"
                                    class="object-cover w-full h-auto aspect-[16/9] rounded-lg"
                                    alt="Gambar utama {{ $wisata->nama_wisata }}">
                            @else
                                <div
                                    class="flex justify-center items-center h-[300px] md:h-[400px] lg:h-[500px] bg-gray-200 text-gray-500 rounded-lg font-poppins">
                                    <p>Gambar Kosong</p>
                                </div>
                            @endif
                        </div>

                        <!-- Gambar Kecil -->
                        @if (!empty($imgDetails))
                            <div class="grid grid-cols-8">
                                @foreach ($imgDetails as $img)
                                    <img src="{{ asset('storage/' . $img) }}"
                                        class="object-cover w-full aspect-[1/1] cursor-pointer  border-transparent hover:border-blue-500 "
                                        alt="Gambar detail" onclick="changeMainImage('{{ asset('storage/' . $img) }}')">
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4 text-gray-500 font-poppins">
                                <p>Gambar Detail Tidak Tersedia</p>
                            </div>
                        @endif
                    </div>

                    <!-- Script untuk Pergantian Gambar -->
                    <script>
                        function changeMainImage(newSrc) {
                            const mainImage = document.getElementById('main-image');
                            mainImage.src = newSrc;
                        }
                    </script>
                </div>
            </div>
        </div>
        <div class="pt-8 xl:pt-16 pb-4">
            <p class="font-bold text-2xl 2xl:text-4xl mb-4 text-[#004165] font-fjalla">Lokasi Wilayah</p>
            <div class="grid ">
                <div id="map" class="aspect-[1920/1920] sm:aspect-[1920/1080] xl:sm:aspect-[1920/540] z-[1]">
                </div> <!-- Tentukan tinggi untuk peta -->
            </div>

            <!-- Memuat Leaflet -->
            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
            <script>
                // Inisialisasi peta dengan titik tengah menggunakan koordinat dari variabel $wisata
                var map = L.map('map', {
                    center: [{{ $wisata->latitude }}, {{ $wisata->longitude }}], // Atur titik pusat
                    zoom: 13, // Atur level zoom
                    scrollWheelZoom: false // Menonaktifkan zoom menggunakan scroll mouse
                });

                // Tambahkan tile layer dari OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '<img src="https://flagcdn.com/w20/id.png" srcset="https://flagcdn.com/w40/id.png 2x" width="20" alt="Indonesia"> Explore Jember | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Tambahkan marker lokasi wisata dengan popup
                L.marker([{{ $wisata->latitude }}, {{ $wisata->longitude }}]).addTo(map)
                    .bindPopup(
                        `<b>{{ $wisata->nama_wisata }}</b><br>{{ $wisata->kategori_detail->kategori->nama_kategori }}, {{ $wisata->kategori_detail->nama_kategori_detail }}.`
                    );
            </script>


        </div>
        <div class="mb-4 pt-10">
            <p class="text-2xl 2xl:text-4xl font-bold pb-2 text-[#004165] font-fjalla">Kuliner Yang Tersedia</p>
            <h5 class="pl-0 text-gray-500 font-poppins">Berikut adalah kuliner yang tersedia saat ini</h5>
        </div>
        @if ($wisata->kuliners->isEmpty())
            <div class="p-10 mb-10 text-center font-bold text-gray-500 rounded border">
                Kuliner Kosong.
            </div>
        @else
            <div class="relative">
                <div class="w-full h-auto overflow-x-auto py-4">
                    <div class="flex gap-4 min-w-max">
                        <!-- Added min-w-max to ensure horizontal overflow when items are many -->
                        @foreach ($wisata->kuliners as $kulinersss)
                            <button data-modal-target="modal-gambar-detail-wisata-{{ $kulinersss->id }}"
                                data-modal-toggle="modal-gambar-detail-wisata-{{ $kulinersss->id }}"
                                class="relative group flex-shrink-0" type="button">

                                <!-- Aspect ratio and image sizing adjustment -->
                                <div class="w-64 h-80 overflow-hidden rounded-lg"> <!-- Set a fixed size for image container -->
                                    <img src="{{ asset('storage/' . $kulinersss->gambar_kuliner) }}"
                                        alt="{{ $kulinersss->nama_kuliner }}"
                                        class="w-full h-full object-cover transition duration-300 ease-in-out transform group-hover:scale-105 group-hover:brightness-90">
                                </div>

                                <div class="absolute inset-0 flex items-center justify-center">
                                    <figcaption class="absolute bottom-4 z-10 w-full text-center">
                                        <h1 class="font-semibold text-white text-xs md:text-sm uppercase tracking-wide">
                                            {{ $kulinersss->nama_kuliner }}
                                        </h1>
                                    </figcaption>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>



        @endif
        <div class="mb-4 pt-10 ">
            <p class="text-2xl 2xl:text-4xl font-bold pb-2 text-[#004165] font-fjalla">Event Yang Akan Datang</p>
            <h5 class="pl-0 text-gray-500 font-poppins">Berikut adalah event yang akan datang saat ini</h5>
        </div>
        @if ($wisata->events && $wisata->events->isNotEmpty())
            <div id="event-carousel" class="relative w-full pt-4 pb-4 mb-20" data-carousel="slide">
                <!-- Carousel Wrapper -->
                <div class="relative overflow-hidden rounded-lg aspect-[1920/720]">
                    @foreach ($wisata->events as $event)
                        <button data-modal-target="img-event-{{ $event->id }}" data-modal-toggle="img-event-{{ $event->id }}"
                            class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('storage/' . $event->img) }}"
                                class="block w-full h-auto max-h-full object-cover transition-all duration-300 filter grayscale hover:grayscale-0 mx-auto"
                                alt="{{ $event->name ?? 'Event Image' }}">
                            <p class="text-center mt-4 font-semibold text-lg">{{ $event->nama_event ?? 'Event Name' }}
                            </p>
                        </button>
                    @endforeach
                </div>

                <!-- Slider Indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
                    @foreach ($wisata->events as $index => $event)
                        <button type="button" class="w-3 h-3 rounded-full bg-gray-400 hover:bg-gray-600" aria-current="false"
                            aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}">
                        </button>
                    @endforeach
                </div>

                <!-- Slider Controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                        <svg class="w-4 h-4 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
                        <svg class="w-4 h-4 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        @else
            <div class="p-10 mb-10 text-center font-bold text-gray-500 rounded border font-poppins">
                Event yang akan datang sedang tidak ada.
            </div>
        @endif
        <div class="py-10">
            <div class="py-4">
                <p class="text-2xl 2xl:text-4xl font-bold pb-2 text-[#004165] font-fjalla ">Wisata Lainnya</p>
                <h5 class="pl-0 text-gray-500 font-poppins">Berikut adalah beberapa rekomendasi wisata saat ini</h5>
            </div>

            <div class="grid xl:grid-cols-4 grid-cols-2 gap-4 xl:gap-8">
                @foreach ($lainnya as $filter)
                    <a href="{{ route('profilWisata.index', $filter->nama_wisata) }}"
                        class="shadow-xl shadow-slate-400 bg-white flex justify-between flex-col h-auto w-auto border-slate-500 rounded-lg
                                                                                                                                        transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl hover:shadow-slate-400">
                        <div>
                            <img class="object-cover w-full aspect-[1080/540] rounded-t-xl"
                                src="{{ $filter->img ? asset('storage/' . $filter->img) : asset('images/placeholder.png') }}"
                                alt="{{ $filter->nama_wisata }}" />
                            <div class="w-auto h-auto pt-2 px-4 pb-4">
                                <p class="text-black font-bold text-md">{{ $filter->nama_wisata }}</p>
                                <p class="text-black text-sm">
                                    {{ $filter->kategori_detail->nama_kategori_detail ?? 'Kategori Tidak Tersedia' }}
                                    {{ $filter->kategori_detail->kategori->nama_kategori ?? '' }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>


    @foreach ($wisata->events as $event)
        <div id="img-event-{{ $event->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm ">
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t  border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900  font-poppins">

                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                            data-modal-hide="img-event-{{ $event->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only font-poppins">Close modal</span>
                        </button>

                    </div>
                    <div class="p-4 md:p-5 space-y-4">
                        <img src="{{ asset('storage/' . $event->img) }}"
                            class="block w-full h-auto max-h-full object-contain transition-all duration-300 filter grayscale hover:grayscale-0 mx-auto"
                            alt="{{ $event->name ?? 'Event Image' }}">
                    </div>
                </div>
            </div>
        </div>
    @endforeach




    @foreach ($wisata->kuliners as $kuliner)
    <div id="modal-gambar-detail-wisata-{{ $kuliner->id }}" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 overflow-y-auto flex justify-center items-center p-4 bg-black bg-opacity-50">
        <div class="relative w-full max-w-4xl md:max-w-5xl xl:max-w-7xl bg-white rounded-lg shadow-lg overflow-hidden">
            
            <!-- Tombol Close -->
            <button data-modal-hide="modal-gambar-detail-wisata-{{ $kuliner->id }}"
                class="absolute top-4 right-4 bg-white border border-gray-300 rounded-full w-8 h-8 flex items-center justify-center hover:bg-gray-100 transition-all z-20">
                ✕
            </button>

            <!-- Modal Body -->
            <div class="p-6 grid md:grid-cols-4 gap-6">
                <!-- Kolom Gambar -->
                <div class="md:col-span-2 flex flex-col space-y-4 h-full">
                    @if (!empty($kuliner->gambar_menu))
                        <div class="overflow-x-auto space-x-4 flex-nowrap flex pb-4">
                            @foreach (json_decode($kuliner->gambar_menu, true) as $gambar_menu)
                                <div class="flex-shrink-0 w-[225px] aspect-[3/4]">
                                    <button type="button"
                                        class="w-full h-full border border-slate-200 rounded-lg overflow-hidden hover:shadow-xl transition-transform transform hover:scale-105"
                                        data-src="{{ asset('storage/' . $gambar_menu) }}">
                                        <img src="{{ asset('storage/' . $gambar_menu) }}"
                                            class="object-cover w-full h-full rounded-lg"
                                            alt="Gambar Kuliner {{ $kuliner->nama_kuliner }}">
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-gray-500">Tidak ada gambar yang tersedia.</p>
                    @endif
                </div>

                <!-- Kolom Informasi -->
                <div class="md:col-span-2 space-y-6">
                    <!-- Nama Kuliner -->
                    <div>
                        <h2 class="text-3xl font-semibold text-gray-800 font-poppins">
                            {{ $kuliner->nama_kuliner }}
                        </h2>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-600">Deskripsi</h3>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $kuliner->deskripsi_kuliner ?? 'Deskripsi tidak tersedia.' }}
                        </p>
                    </div>

                    <!-- Kontak -->
                    @if (!empty($kuliner->no_hp))
                        <div>
                            <h3 class="text-xl font-semibold text-gray-600">Kontak</h3>
                            <p class="text-gray-700">
                                <a href="tel:{{ $kuliner->no_hp }}" class="text-blue-600 hover:text-blue-800">
                                    {{ $kuliner->no_hp }}
                                </a>
                            </p>
                        </div>
                    @endif

                    <!-- Jam Operasional -->
                    @if (!empty($kuliner->jam_operasional))
                        @php
                            $jamOperasional = json_decode($kuliner->jam_operasional, true);
                        @endphp
                        @if (is_array($jamOperasional))
                            <div>
                                <h3 class="text-xl font-semibold text-gray-600">Jam Operasional</h3>
                                <ul class="space-y-2">
                                    @foreach ($jamOperasional as $jam)
                                        <li class="flex">
                                            <span class="w-28 font-medium text-gray-600">{{ ucfirst($jam['hari']) }}:</span>
                                            <span class="text-gray-500">
                                                @if ($jam['buka'] == '00:00' && $jam['tutup'] == '00:00')
                                                    <span class="text-green-600">24 Jam</span>
                                                @elseif($jam['buka'] && $jam['tutup'])
                                                    <span class="text-green-600">{{ $jam['buka'] }}</span>
                                                    <span class="text-gray-400">-</span>
                                                    <span class="text-red-500">{{ $jam['tutup'] }}</span>
                                                @else
                                                    <span class="text-red-500">Tutup</span>
                                                @endif
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

        </div>
    </div>
@endforeach



    <div id="imageModal" class="hidden fixed inset-0 z-[999] bg-black bg-opacity-90 flex items-center justify-center">
        <button type="button"
            class="absolute top-4 right-4 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-sm p-2.5 inline-flex items-center z-50"
            id="closeModalBtn">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>
        <img id="modalImage" src="" class="max-w-full max-h-full object-contain rounded-lg" alt="Preview Gambar">
    </div>
    <script>
        document.querySelectorAll('.open-image-modal').forEach(button => {
            button.addEventListener('click', () => {
                const src = button.getAttribute('data-src');
                const modal = document.getElementById('imageModal');
                const modalImg = document.getElementById('modalImage');

                modalImg.src = src;
                modal.classList.remove('hidden');
            });
        });

        document.getElementById('closeModalBtn').addEventListener('click', () => {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('modalImage').src = '';
        });

        // Optional: tutup modal jika klik area hitam di luar gambar
        document.getElementById('imageModal').addEventListener('click', (e) => {
            if (e.target.id === 'imageModal') {
                e.currentTarget.classList.add('hidden');
                document.getElementById('modalImage').src = '';
            }
        });
    </script>






    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btnDeskripsi = document.getElementById("btn-deskripsi");
            const btnDetail = document.getElementById("btn-detail");
            const deskripsi = document.getElementById("deskripsi");
            const detail = document.getElementById("detail");
            const buttons = document.querySelectorAll(".tab-button");

            // Fungsi untuk menampilkan hanya satu div & update tombol aktif
            function showContent(show, hide, activeBtn) {
                show.classList.remove("hidden");
                hide.classList.add("hidden");

                // Reset semua tombol
                buttons.forEach(btn => btn.classList.remove("active", "bg-blue-300", "text-white"));
                activeBtn.classList.add("active", "bg-blue-300", "text-white");
            }

            // Event listener untuk tombol
            btnDeskripsi.addEventListener("click", function () {
                showContent(deskripsi, detail, btnDeskripsi);
            });

            btnDetail.addEventListener("click", function () {
                showContent(detail, deskripsi, btnDetail);
            });

            // Set default ke Deskripsi saat halaman dimuat
            showContent(deskripsi, detail, btnDeskripsi);
        });
    </script>

    <!-- Tambahan CSS -->
    <style>
        .tab-button {
            transition: background-color 0.2s ease-in-out;
        }

        .tab-button.active {
            background-color: #60A5FA;
            color: white;
        }
    </style>

</x-layout>