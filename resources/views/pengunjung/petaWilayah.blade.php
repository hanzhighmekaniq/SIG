<x-layout>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let elements = document.querySelectorAll("#petaWilayah");

            let observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove("opacity-0", "translate-y-10");
                    }
                });
            }, {
                threshold: 0.2
            });

            elements.forEach((el) => observer.observe(el));
        });
    </script>
    <div id="petaWilayah" class="bg-[#F3F3F3] h-auto w-full opacity-0 translate-y-10 transition-all duration-[1500ms]">
        <div class="container m-auto px-4">
            <div class="m-auto w-auto text-center pt-28 pb-10 text-6xl">
                <p
                    class="pb-4 text-center font-extrabold xl:text-xl text-[#004165] text-base leading-7 text-primary font-montserrat">
                    PETA
                    WILAYAH</p>
                <p class="pacifico-regular text-5xl text-[#004165]">Kabupaten Jember</p>
            </div>

            {{-- Peta Wisata --}}
            <div class="flex justify-center items-center pb-10 lg:pb-14 xl:pb-16 w-full">
                <div class="w-full pt-8">
                    <div id="map" class="relative z-[1] rounded-xl aspect-[1920/720]"></div>
                </div>
            </div>
            {{-- Tabel Daftar Lokasi Wisata --}}
            <p class="m-auto text-start text-3xl font-semibold pb-10 text-[#004165] font-fjalla uppercase">Daftar Titik
                Lokasi Wisata
            </p>
            {{ $rute->links() }}
            <div class="overflow-x-auto pb-20">
                <table class="mt-6 w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-3 px-4 border text-left font-poppins">No</th>
                            <th class="py-3 px-4 border text-left font-poppins">Nama Wisata</th>
                            <th class="py-3 px-4 border text-left font-poppins">Kategori</th>
                            <th class="py-3 px-4 border text-left font-poppins">Jarak (km)</th>
                            <th class="py-3 px-4 border text-left font-poppins">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rute as $index => $item)
                            <tr class="bg-white">
                                <td class="py-3 px-4 border font-poppins bg-white">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4 border font-poppins">{{ $item->nama_wisata }}</td>
                                <td class="py-3 px-4 border font-poppins">
                                    {{ $item->kategori_detail->nama_kategori_detail ?? 'Tidak ada kategori' }}</td>
                                <td class="py-3 px-4 border font-poppins">-</td>
                                <td class="py-3 px-4 border underline text-blue-500 font-poppins">
                                    <a href="{{ route('ruteTerdekat.index', $item->nama_wisata) }}"
                                        target="_blank">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-5 text-center text-gray-500 font-poppins">Tidak ada data
                                    yang tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <script>
                // Inisialisasi peta
                var map = L.map('map').setView([-8.184485, 113.668075], 10);

                // Tambahkan lapisan tile dari OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: ''
                }).addTo(map);

                // Data
                const Jarak = [
                    @forelse ($rute as $item)
                        {
                            nama_wisata: "{{ $item->nama_wisata }}",
                            kategori: "{{ $item->kategori_detail->nama_kategori_detail ?? 'Tidak ada kategori' }}",
                            latitude: {{ $item->latitude ?? 0 }},
                            longitude: {{ $item->longitude ?? 0 }},
                        },
                    @empty
                        {
                            nama_wisata: "Data Kosong",
                            kategori: "Data Kosong",
                            latitude: 0,
                            longitude: 0,
                        },
                    @endforelse
                ];

                const wisataData = [
                    @forelse ($peta as $item)
                        {
                            nama_wisata: "{{ $item->nama_wisata }}",
                            kategori: "{{ $item->kategori_detail->nama_kategori_detail ?? 'Tidak ada kategori' }}",
                            latitude: {{ $item->latitude ?? 0 }},
                            longitude: {{ $item->longitude ?? 0 }},
                            url: "{{ route('ruteTerdekat.index', $item->nama_wisata) }}"
                        },
                    @empty
                        {
                            nama_wisata: "Data Kosong",
                            kategori: "Data Kosong",
                            latitude: 0,
                            longitude: 0,
                        },
                    @endforelse
                ];


                // Icon custom untuk posisi saat ini
                const currentPositionIcon = L.icon({
                    iconUrl: 'img/icon8/markhuman.png',
                    iconSize: [38, 38],
                    iconAnchor: [19, 38],
                    popupAnchor: [0, -38]
                });

                // Menggunakan Geolocation API untuk mendapatkan posisi pengguna
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            const userLat = position.coords.latitude;
                            const userLng = position.coords.longitude;

                            const currentPosition = L.latLng(userLat, userLng);

                            // Tambahkan marker untuk posisi pengguna
                            L.marker(currentPosition, {
                                    icon: currentPositionIcon
                                }).addTo(map)
                                .bindPopup('Posisi Anda')
                                .openPopup();

                            // Pindahkan peta ke lokasi pengguna
                            map.setView(currentPosition, 13);

                            // Update tabel dengan data `Jarak`
                            updateTable(currentPosition);
                        },
                        function(error) {
                            console.error("Error mendapatkan lokasi:", error.message);
                            alert("Tidak dapat mengakses lokasi Anda. Pastikan izin lokasi diaktifkan.");
                        }
                    );
                } else {
                    alert("Geolocation tidak didukung oleh browser Anda.");
                }

                // Render data `wisataData` di peta
                wisataData.forEach(wisata => {
                    L.marker([wisata.latitude, wisata.longitude]).addTo(map)
                        .bindPopup(`<strong>${wisata.nama_wisata}</strong><br>${wisata.kategori}`);
                });

                function updateTable(currentPosition) {
                    let tableBody = document.querySelector("table tbody");
                    tableBody.innerHTML = ""; // Bersihkan tabel sebelum render ulang

                    Jarak.forEach((rute, index) => {
                        // Jika latitude atau longitude adalah 0, beri jarak default "-" (tidak dihitung)
                        let distance = "-";
                        if (rute.latitude !== 0 && rute.longitude !== 0) {
                            const endLatLng = L.latLng(rute.latitude, rute.longitude);
                            distance = (currentPosition.distanceTo(endLatLng) / 1000).toFixed(2) + " km";
                        }

                        // Tambahkan baris ke tabel
                        let row = document.createElement("tr");

                        row.innerHTML = `
                                            <td class="py-3 px-4 border font-poppins">${index + 1}</td>
                                            <td class="py-3 px-4 border font-poppins">${rute.nama_wisata}</td>
                                            <td class="py-3 px-4 border font-poppins">${rute.kategori}</td>
                                            <td class="py-3 px-4 border font-poppins">${distance}</td>
                                            <td class="py-3 px-4 border underline text-blue-500 font-poppins">
                                                <a href="${rute.nama_wisata !== "Data Kosong" ? `/wisata/profil/ruteTerdekat/${rute.nama_wisata}` : "#"}" target="_blank">Lihat</a>
                                            </td>
                                        `;
                        tableBody.appendChild(row);
                    });
                }

                wisataData.forEach(wisata => {
                    if (wisata.latitude !== 0 && wisata.longitude !== 0) {
                        L.marker([wisata.latitude, wisata.longitude]).addTo(map)
                            .bindPopup(`
                <a href="${wisata.url}" target="_blank" class="font-bold text-blue-600 underline">
                    ${wisata.nama_wisata}
                </a><br>
                ${wisata.kategori}
            `);
                    }
                });
            </script>


        </div>
    </div>
</x-layout>
