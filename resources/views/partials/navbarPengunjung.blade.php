<nav class="bg-white shadow-lg">
    <div class="max-w-screen-xl h-[60px] flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#beranda" class="pacifico-regular text-2xl text-[#656D4A] hover:text-black">Visit Jember</a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-default"
            aria-expanded="false">
            <span class="sr-only">Menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="/beranda"
                        class="{{ request()->is('beranda') ? 'text-black' : 'text-gray-400' }} block py-2 px-3 rounded hover:bg-gray-100 md:bg-transparent md:hover:text-blue-700 md:p-0"
                        aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="/wisata"
                        class="{{ request()->is('wisata') ? 'text-black' : 'text-gray-400' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Wisata</a>
                </li>
                <li>
                    <a href="/petaWilayah"
                        class="{{ request()->is('petaWilayah') ? 'text-black' : 'text-gray-400' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Peta Wilayah</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
