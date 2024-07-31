<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Moist</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .featured-in img {
            width: 100px;
            /* Set the desired width */
            height: auto;
            /* Maintain the aspect ratio */
        }
    </style>

</head>

<body>
    {{-- Navbar --}}
    <nav class="bg-white border-gray-200 dark:bg-blue-400">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <h1 class="text2xl font-extrabold text-gray-900 dark:text-white md:text-2xl lg:text-2xl"><span
                        class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-purple-400">Moist</span>
                    Skincare</h1>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="flex md:order-2">
                <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                    aria-expanded="false"
                    class="md:hidden text-gray-500 dark:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 me-1">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
                <div class="relative hidden md:block">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-900" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" id="search-navbar"
                        class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search...">
                </div>
                <button data-collapse-toggle="navbar-search" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-blue-400 dark:border-gray-700">
                    <li>
                        <a href="/"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="/katalog"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Products</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About
                            Us</a>
                    </li>
                    <li>
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Login
                            </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="overflow-hidden shadow-sm">
        @php
            $product = \App\Models\Product::get();
            $carousels = \App\Models\Banner::get();
            $carousel = \App\Models\Product::orderBy('created_at', 'desc')->take(4)->get();
        @endphp
        {{-- carousel --}}
        <div id="default-carousel" class="relative w-full h-auto mb-6 mt-6" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-90 overflow-hidden rounded-lg md:h-[32rem]">
                @foreach ($carousels as $index => $r)
                    <div class="hidden duration-700 ease-in-out {{ $index === 0 ? 'block' : '' }}" data-carousel-item>
                        <a href="#">
                            <img src="{{ asset('banner/' . $r->image) }}" class="mx-auto w-full h-full object-contain"
                                alt="">
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                @foreach ($carousels as $index => $r)
                    <button type="button" class="w-3 h-3 rounded-full"
                        aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                        data-carousel-slide-to="{{ $index }}"></button>
                @endforeach
            </div>

            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
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
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>


        {{-- Produk Best Seller --}}
        <h1 class="text-5xl text-center font-extrabold dark:text-gray-900 mb-2">Moist<small
                class="ms-2 font-semibold text-gray-500 dark:text-gray-900">Best Seller</small></h1>
        <div class="grid gap-6 mb-6 md:grid-cols-2 lg:grid-cols-4 m-2">
            @php
                use App\Models\Product;
                use Illuminate\Support\Facades\DB;

                $products = Product::select(
                    'products.id',
                    'products.name',
                    'products.price',
                    'products.image',
                    DB::raw('COUNT(order_items.product_id) as total_sales'),
                )
                    ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
                    ->groupBy('products.id', 'products.name', 'products.price', 'products.image')
                    ->orderBy('total_sales', 'desc')
                    ->take(4) // limit to the top 3 most bought products
                    ->get();
            @endphp

            @foreach ($products as $pr)
                <div class="room-card max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <a href="{{ route('products.show', $pr) }}">
                        <img class="rounded-t-lg" src="{{ asset('storage/' . $pr->image) }}"
                            alt="{{ $pr->name }}" />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('products.show', $pr) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $pr->name }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">{{ $pr->price }}</p>
                        <a href="{{ route('products.show', $pr) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300">
                            Show Details
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- About Section --}}
        <section class="bg-white dark:bg-blue-400">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    Moist Skincare</h1>
                <p class="mb-8 text-lg font-extrabold text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-900">
                    Tentang Kami</p>
                <p class="mb-8 text-md font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-900">
                    Selamat datang di MOIST SKINCARE, pusat belanja Anda untuk berbagai produk skincare dan kosmetik
                    dari banyak brand ternama. Kami bangga menjadi destinasi utama bagi para pecinta kecantikan yang
                    mencari produk berkualitas untuk perawatan kulit dan kecantikan.</p>
                <p class="mb-8 text-lg font-extrabold text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-900">
                    Misi Kami
                </p>
                <p class="mb-8 text-md font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-900">
                    Di MOIST SKINCARE, misi kami adalah menyediakan berbagai pilihan produk skincare dan kosmetik dari
                    brand-brand terbaik di dunia. Kami berkomitmen untuk membantu Anda menemukan produk yang sesuai
                    dengan kebutuhan dan jenis kulit Anda, sehingga Anda dapat merasa percaya diri dan tampil memukau
                    setiap hari.</p>
                <p class="mb-8 text-lg font-extrabold text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-900">
                    Kenapa Memilih Kami?
                </p>
                <p class="mb-8 text-md font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-900">
                    Ragam Brand Terbaik: Kami menawarkan produk dari berbagai brand ternama yang telah teruji
                    kualitasnya. Mulai dari brand lokal hingga internasional, kami memastikan Anda mendapatkan yang
                    terbaik.
                    Produk Asli dan Terjamin: Semua produk yang kami jual adalah 100% asli dan terjamin keasliannya.
                    Kami bekerja sama langsung dengan distributor resmi untuk memastikan Anda mendapatkan produk yang
                    aman dan berkualitas.
                    Layanan Pelanggan Terbaik: Kepuasan pelanggan adalah prioritas kami. Tim kami siap membantu Anda
                    dengan saran produk yang tepat dan layanan pelanggan yang ramah dan profesional.
                    Harga Kompetitif: Kami menawarkan harga yang kompetitif untuk semua produk kami. Kami percaya bahwa
                    perawatan kulit berkualitas tidak harus mahal, dan kami berusaha untuk menyediakan produk terbaik
                    dengan harga yang terjangkau.
                    Produk Kami

                    MOIST SKINCARE menawarkan berbagai produk mulai dari pembersih wajah, serum, pelembap, masker,
                    hingga makeup seperti foundation, lipstik, dan banyak lagi. Kami menyediakan produk untuk semua
                    jenis kulit dan kebutuhan, sehingga Anda dapat menemukan yang paling sesuai dengan Anda.p>
                    {{-- <div class="px-4 mx-auto text-center md:max-w-screen-md lg:max-w-screen-lg lg:px-36">
                    <span class="font-semibold text-gray-900 uppercase">FEATURED IN</span>
                    <div
                        class="flex flex-wrap justify-center items-center mt-8 text-gray-500 sm:justify-between featured-in">
                        <a href="#" class="mr-5 mb-5 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-900">
                            <img src="asset/kahf.png" alt="kahf">
                        </a>
                        <a href="#" class="mr-5 mb-5 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-900">
                            <img src="asset/wardah.png" alt="wardah">
                        </a>
                        <a href="#" class="mr-5 mb-5 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-900">
                            <img src="asset/tokopedia.png" alt="tokopedia">
                        </a>
                    </div>
                </div> --}}

            </div>
        </section>

        {{-- Produk Terbaru --}}
        <h1 class="text-5xl text-center font-extrabold dark:text-gray-900 mb-2 mt-6">Moist<small
                class="ms-2 font-semibold text-gray-500 dark:text-gray-900">New Product</small></h1>
        <div class="grid gap-6 mb-6 md:grid-cols-2 lg:grid-cols-4 m-2">
            @foreach ($carousel as $pr)
                <div class="room-card max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <a href="{{ route('products.show', $pr) }}">
                        <img class="rounded-t-lg" src="{{ asset('storage/' . $pr->image) }}"
                            alt="{{ $pr->name }}" />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('products.show', $pr) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $pr->name }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">{{ $pr->price }}</p>
                        <a href="{{ route('products.show', $pr) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300">
                            Show Details
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Footer --}}
        <footer class="bg-white dark:bg-blue-400">
            <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="https://flowbite.com/" class="flex items-center">
                            <h1 class="text2xl font-extrabold text-gray-900 dark:text-white md:text-2xl lg:text-2xl">
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-purple-400">Moist</span>
                                Skincare
                            </h1>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources
                            </h2>
                            <ul class="text-gray-500 dark:text-gray-900 font-medium">
                                <li class="mb-4">
                                    <a href="/products" class="hover:underline">Products</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us
                            </h2>
                            <ul class="text-gray-500 dark:text-gray-900 font-medium">
                                <li class="mb-4">
                                    <a href="https://github.com/aimlesson" class="hover:underline ">Github</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                            <ul class="text-gray-500 dark:text-gray-900 font-medium">
                                <li class="mb-4">
                                    <a href="{{ route('dashboard') }}" class="hover:underline">Administrator</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-900">© 2024 <a
                            href="https://flowbite.com/" class="hover:underline">Moist™</a>. All Rights Reserved. ||
                        Jl. Raya Dukuhwaluh No.38, Dusun II, Dukuhwaluh, Kec. Kembaran, Kabupaten Banyumas,
                        Jawa Tengah 53182
                    </span>
                    <div class="flex mt-4 sm:justify-center sm:mt-0">
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 8 19">
                                <path fill-rule="evenodd"
                                    d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Facebook page</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 21 16">
                                <path
                                    d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                            </svg>
                            <span class="sr-only">Discord community</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 17">
                                <path fill-rule="evenodd"
                                    d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Twitter page</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">GitHub account</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Dribbble account</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>


        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
