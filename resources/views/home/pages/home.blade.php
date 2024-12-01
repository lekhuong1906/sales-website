@extends('home.home_layout')
@section('content')
    <div class="mx-auto">
        <!-- Carousel -->
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://tuoitrebariavungtau.vn/wp-content/uploads/2023/08/chon-loc-25-anh-meo-chibi-cute_9.png"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://img.tripi.vn/cdn-cgi/image/width=700,height=700/https://gcs.tripi.vn/public-tripi/tripi-feed/img/474111kDQ/anh-dep-nhat-the-gioi-trong-tu-nhien_041753399.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://tuoitrebariavungtau.vn/wp-content/uploads/2023/08/chon-loc-25-anh-meo-chibi-cute_9.png"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://img.tripi.vn/cdn-cgi/image/width=700,height=700/https://gcs.tripi.vn/public-tripi/tripi-feed/img/474111kDQ/anh-dep-nhat-the-gioi-trong-tu-nhien_041753399.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://tuoitrebariavungtau.vn/wp-content/uploads/2023/08/chon-loc-25-anh-meo-chibi-cute_9.png"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                    data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        <div class="flex flex-col items-center gap-16 my-32">
            <p class="text-4xl font-bold text-center">
                Cảm ơn bạn đã ghé đến gian hàng của Mĩ Diên xinh đẹp <br>
                Chúc bạn có một buổi mua hàng thật vui vẻ 💜
            </p>
            <div class="flex gap-2 bg-orange-200 w-fit p-4 rounded-xl hover:bg-orange-400 cursor-pointer">

                <a href="{{ route('products') }}" class="underline-offset-0 text-xl text-orange-600">Shopping cùng Mĩ
                    Diên</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </div>
        </div>
        <!-- end of Carousel -->

        <hr class="mt-10">

        <div class="mx-auto my-10 text-center">
            <h1 class="text-3xl font-bold p4">🔥 Sản Phẩm Supper Cháy Hàng 🔥</h1>
            <div class="flex gap-2 items-center justify-center mt-6">
                <span class="text-xl font-bold">Kết thúc sau:</span>
                <div class="flex justify-between items-center gap-2">
                    <span class="text-xl rounded-2xl p-4 bg-orange-200">23</span>
                    :
                    <span class="text-xl rounded-2xl p-4 bg-orange-200">50</span>
                    :
                    <span class="text-xl rounded-2xl p-4 bg-orange-200">56</span>
                </div>
            </div>
        </div>

        <div class="my-16 grid grid-flow-col grid-cols-4 gap-4">
            @for ($i = 0; $i < 4; $i++)
                <div
                    class="col-span-1 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative">
                    {{-- <div class="h-auto w-10 left-0 absolute text-center bg-red-400" id="sale">
                        <span class="text-xl">Sale</span>
                    </div> --}}


                    <div class="h-fit w-fit right-0 absolute bg-orange-400 rounded-md">
                        <a href="#" class="dark:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-10 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </a>
                    </div>
                    <a href="{{ route('product-detail', 1) }}" class="underline-offset-0 cursor-pointer">
                        <img class="p-8 rounded-t-lg"
                            src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/1/5/15_2_7_2_5.jpg"
                            alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="{{ route('product-detail', 1) }}"
                            class="underline-offset-0  hover:underline-offset-0 cursor-pointer">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Apple Watch
                                Series 7
                                GPS, Aluminium Case, Starlight Sport</h5>
                        </a>
                        <div class="flex items-center mt-2.5 mb-5">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                            </div>
                            <span
                                class="bg-orange-100 text-white text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>
                            <a href="#"
                                class="text-white bg-orange-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                to cart</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        <div class="flex justify-end mb-5">
            <a href="{{ route('products') }}"
                class="flex gap-2 items-center border-1 rounded-xl border-orange-400 bg-orange-300 py-2 px-4 text-xl font-bold text-slate-50 underline-offset-0">Xem
                tất cả
                <div class="p-1 w-fit bg-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6 text-orange-400">
                        <path fill-rule="evenodd"
                            d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
        </div>

        <hr />

        <div class="mx-auto text-center">
            <h1 class="font-xl text-4xl p-4 text-orange-400">Về Chúng Tôi</h1>
            <h5 class="font-xl p-4">Cửa hàng bán thực phẩm sạch</h5>
            <p class="text-xl px-16 py-6">
                Năm 2011, thời điểm mà nền kinh tế Việt Nam đang trong giai đoạn khủng hoảng, những người sáng lập DaLaVi
                ngày nay đã mò mẫm đi tìm sản phẩm, dịch vụ để cung cấp cho thị trường. Khác với nhiều đơn vị tìm đến những
                thành phố sầm uất như Hà Nội, TPHCM hay Đà Nẵng, chúng tôi đã quyết định về vùng đất xa xôi: Lạc Dương – Lâm
                Đồng để khởi nghiệp. Lạc Dương cách trung tâm TP Đà Lạt 12km về phía Bắc, có khí hậu ôn hòa, thiên nhiên hữu
                tình cùng đất đai màu mỡ. Với cơ sở là hàng chục Hecta đất trồng nông nghiệp trước đó, với hàng ngàn gốc
                Cafe và Hồng Đà Lạt, chúng tôi đã bắt đầu xây dựng thương hiệu và đi tìm hướng ra cho sản phẩm.
                DacsanDaLat.com.vn chính thức được khởi động sau đó một năm (16/09/2012), đây cũng là dự án đầu tiên mà
                DaLaVi chính thức đầu tư.
                Đà Lạt là vùng đất trù phú, được thiên nhiên ưu ái ban tặng nhiều cảnh đẹp, làm say đắm biết bao lòng người,
                hiếm hoi trên đất Việt và cũng là vùng đất của cỏ cây, rau sạch và đặc sản. Nhiều loại đặc sản đã trở thành
                biểu tượng trong ẩm thực của người Việt. Lợi thế là vậy, tuy nhiên nhiều cơ sở, hộ nông dân cá thể với hàng
                chục mẫu đất trồng vẫn có thể bị thua lỗ do chưa tìm được đầu ra tốt cho sản phẩm. Vào mùa thu hoạch những
                sản phẩm cho sản lượng tốt như: cafe, quả hồng, khoai lang, atiso, dâu tây…. vẫn có thể bị các thương lái ép
                giá và vì sự khốc liệt của thị trường hàng Trung Quốc đổ bộ vào.
            </p>
        </div>

    </div>

    @vite('resources/js/home/home.js')
@endsection
