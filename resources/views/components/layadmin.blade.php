<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        @include('partials.navbarAdmin')
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        {{-- Menggunakan @include agar data bisa dikirim ke sidebar --}}
        @include('partials.sidebar', ['countWisata' => $countWisata])
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-gray-200 border-dashed rounded-lg mt-14">
            <div class="flex">
                <p class="font-semibold text-3xl playfair-display-uniquifier">
                    {{-- Menampilkan judul berdasarkan route --}}
                    @if (request()->is('dashboard'))
                        Dashboard
                    @elseif(request()->is('data-wisata', 'tambah-wisata', 'tambah-event', 'tambah-kuliner'))
                        Data Wisata
                    @else
                        Data Tidak Dikenal
                    @endif
                </p>
            </div>

            <div>
                <div class="pt-6">
                    {{-- Kondisional untuk menampilkan partials sesuai route --}}
                    @if (request()->routeIs(
                            'wisata.index',
                            'event.index',
                            'kuliner.index',
                            'wisata.create',
                            'event.create',
                            'kuliner.create',
                            'wisata.edit',
                            'event.edit',
                            'kuliner.edit'))
                        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 ">
                            @include('partials.navlink')
                        </div>
                        @if (request()->routeIs('wisata.index', 'wisata.create', 'wisata.edit'))
                            @include('partials.navData.navWisata')
                        @elseif (request()->routeIs('event.index', 'event.create', 'event.edit'))
                            @include('partials.navData.navEvent')
                        @elseif (request()->routeIs('kuliner.index', 'kuliner.create', 'kuliner.edit'))
                            @include('partials.navData.navKuliner')
                        @endif
                    @endif

                    {{-- Slot untuk konten dinamis --}}
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL LOGOUT --}}
    <div id="default-modal-logout" tabindex="-1"
        class="hidden fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" data-modal-hide="default-modal-logout"
                    class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    id="close-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda yakin ingin keluar?</h3>
                    <div class="flex justify-center">
                        <form id="" method="GET" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya, Keluar
                            </button>
                        </form>

                        <button type="button" id="cancel-logout" data-modal-hide="default-modal-logout"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Tidak, Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
