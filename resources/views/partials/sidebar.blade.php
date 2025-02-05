@php
    use Illuminate\Support\Facades\DB;
    $countWisata = DB::table('data_wisata')->count();
    $countKuliner = DB::table('data_kuliner')->count();
    $countEvent = DB::table('data_event')->count();
@endphp

<div class="h-full  px-3 pb-4 overflow-y-auto bg-white    ">
    <ul class="space-y-2 font-medium ">
        <li class="">
            <a href="{{ route('dashboard') }}"
            class="flex items-center p-2 rounded-lg text-[#5C7AFF] hover:text-white hover:bg-[#5C7AFF] focus:text-white active:text-white focus:outline-none {{ request()->is('admin/dashboard') ? 'bg-[#5C7AFF] text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hover:text-white {{ request()->is('admin/dashboard') ? 'text-white' : '' }} transition duration-75"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        viewBox="0 0 24 24">
                        <path d="M3 3v16a2 2 0 0 0 2 2h16" />
                        <path d="M18 17V9" />
                    <path d="M13 17V5" />
                    <path d="M8 17v-3" />
                </svg>
                <span class="poppins-semibold ms-3 hover:text-white {{ request()->is('admin/dashboard') ? 'text-white' : '' }}">Dashboard</span>
            </a>
        </li>
        <li class="">
            <a href="{{ route('kategori.index') }}"
            class="flex items-center p-2 rounded-lg text-[#5C7AFF] hover:text-white hover:bg-[#5C7AFF] {{ request()->is('admin/kategori') ? 'bg-[#5C7AFF] text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chart-bar-stacked">
                    <path d="M11 13v4" />
                    <path d="M15 5v4" />
                    <path d="M3 3v16a2 2 0 0 0 2 2h16" />
                    <rect x="7" y="13" width="9" height="4" rx="1" />
                    <rect x="7" y="5" width="12" height="4" rx="1" />
                </svg>
                <span class="ms-3  hover:text-white">Kategori</span>
            </a>
        </li>
        <li class="group">
            <a href="{{ route('wisata.index') }}"
            class="flex items-center p-2 rounded-lg text-[#5C7AFF] hover:bg-[#5C7AFF] hover:text-white {{ request()->is('admin/wisata*') ? 'bg-[#5C7AFF] text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-map-pinned">
                    <path
                        d="M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0" />
                    <circle cx="12" cy="8" r="2" />
                    <path
                        d="M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712" />
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Data Wisata</span>
                <span
                    class="inline-flex items-center justify-center w-auto px-2 h-auto ms-3 text-sm font-medium bg-[##4A8FE7] rounded-full group-hover:bg-white group-hover:text-[#4A8FE7] {{ request()->is('admin/wisata*') ? 'bg-white text-[#4A8FE7]' : 'text-white' }}">
                    {{ $countWisata }}
                </span>
            </a>
        </li>
        <li class="group">
            <a href="{{ route('kuliner.index') }}"
            class="flex items-center p-2 rounded-lg text-[#5C7AFF] hover:bg-[#5C7AFF] hover:text-white {{ request()->is('admin/kuliner*') ? 'bg-[#5C7AFF] text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-utensils">
                    <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                    <path d="M7 2v20" />
                    <path d="M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Data Kuliner</span>
                <span
                    class="inline-flex items-center justify-center w-auto px-2 h-auto ms-3 text-sm font-medium bg-[#4A8FE7] rounded-full group-hover:bg-white group-hover:text-[#4A8FE7] {{ request()->is('admin/kuliner*') ? 'bg-white text-[#4A8FE7]' : 'text-white' }}">
                    {{ $countKuliner }}
                </span>
            </a>
        </li>
        <li class="group">
            <a href="{{ route('event.index') }}"
            class="flex items-center p-2 rounded-lg text-[#5C7AFF] hover:bg-[#5C7AFF] hover:text-white {{ request()->is('admin/event*') ? 'bg-[#5C7AFF] text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-book-image">
                    <path d="m20 13.7-2.1-2.1a2 2 0 0 0-2.8 0L9.7 17" />
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                    <circle cx="10" cy="8" r="2" />
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Data Event</span>
                <span
                    class="inline-flex items-center justify-center w-auto px-2 h-auto ms-3 text-sm font-medium bg-[#4A8FE7] rounded-full group-hover:bg-white group-hover:text-[#4A8FE7] {{ request()->is('admin/event*') ? 'bg-white text-[#4A8FE7]' : 'text-white' }}">
                    {{ $countEvent }}
                </span>
            </a>
        </li>

        <li>
            <a href="#"
                class="flex items-center p-2  rounded-lg text-[#4A8FE7] hover:bg-[#4A8FE7] hover:text-white ">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-user-cog">
                    <circle cx="18" cy="15" r="3" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                    <path d="m21.7 16.4-.9-.3" />
                    <path d="m15.2 13.9-.9-.3" />
                    <path d="m16.6 18.7.3-.9" />
                    <path d="m19.1 12.2.3-.9" />
                    <path d="m19.6 18.7-.4-1" />
                    <path d="m16.8 12.3-.4-1" />
                    <path d="m14.3 16.6 1-.4" />
                    <path d="m20.7 13.8 1-.4" />
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Pengaturan</span>
            </a>
        </li>
        <li>
            <button data-modal-target="default-modal-logout" data-modal-toggle="default-modal-logout" type="button"
                id="logout-button"
                class="flex items-center p-2 w-full rounded-lg text-[#4A8FE7] hover:bg-[#4A8FE7] hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-log-out">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" x2="9" y1="12" y2="12" />
                </svg>
                <span class="flex ms-3 whitespace-nowrap">Log Out</span>
            </button>
        </li>
    </ul>
</div>
