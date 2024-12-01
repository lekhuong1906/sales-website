@extends('home.home_layout')
@section('content')
    <div class="my-16 text-center text-3xl text-orange-600">Gia Sản Thứ {{ $product->_id }}</div>
    <div class="flex gap-4 justify-between p-4">
        <div class="w-1/2 flex flex-col gap-4">
            <div class="w-full h-auto">
                <img src="{{$product->images[0]}}"
                    alt="">
            </div>

            <!-- Carousel -->

        </div>
        <div class="w-1/2 flex flex-col gap-2">
            <h1 class="text-3xl font-bold text-orange-700">{{ $product->name }}</h1>
            <p class="text-xl my-6">
                Hồng treo gió Đà Lạt công nghệ Nhật Bản Hoshigaki là sản phẩm cao cấp của DaLaVi, được sản xuất theo công
                nghệ được chuyển giao trực tiếp từ Nhật Bản. Từ những trái hồng vàng ươm căng mọng còn chát biến thành những
                trái hồng vỏ se khô mỏng dính, ruột đặc quánh, vị chát được thay bằng vị ngọt thanh, thơm nhẹ mùi hồng chín.
            </p>
            <div class="flex justify-start gap-2 flex-wrap mb-6">
                @foreach ($product->tags as $tag)
                    <span class="w-fit px-4 py-2 rounded-full border-spacing-1 border-gray-300 bg-slate-200">
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>
            <div class="flex justify-start gap-2 mb-6">
                <span class="p-2 text-2xl rounded-md text-orange-600 w-fit">{{ $product->price }} vnđ</span>
                <div class="relative flex items-center max-w-[8rem]">
                    <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input"
                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h16" />
                        </svg>
                    </button>
                    <input type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="999" required />
                    <button type="button" id="increment-button" data-input-counter-increment="quantity-input"
                        class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex gap-2 mb-10">
                <button class="w-fit p-4 bg-orange-300 rounded-xl">Them vao gio hang</button>
                <button class="w-fit p-4 bg-orange-300 rounded-xl">Mua ngay</button>
            </div>
        </div>
    </div>

    <hr>
    <div class="my-10 text-center">
        <h1 class="text-3xl font-bold text-orange-600 mb-6">Mô tả gia sản</h1>
        <div class="text-xl text-left font-normal ">
            <p>
                Hồng treo gió Đà Lạt công nghệ Nhật Bản Hoshigaki là sản phẩm cao cấp của DaLaVi, được sản xuất theo công
                nghệ được chuyển giao trực tiếp từ Nhật Bản. Từ những trái hồng vàng ươm căng mọng còn chát biến thành những
                trái hồng vỏ se khô mỏng dính, ruột đặc quánh, vị chát được thay bằng vị ngọt thanh, thơm nhẹ mùi hồng chín.
                Hồng treo gió Đà Lạt công nghệ Nhật Bản Hoshigaki là sản phẩm cao cấp của DaLaVi, được sản xuất theo công
                nghệ được chuyển giao trực tiếp từ Nhật Bản. Từ những trái hồng vàng ươm căng mọng còn chát biến thành những
                trái hồng vỏ se khô mỏng dính, ruột đặc quánh, vị chát được thay bằng vị ngọt thanh, thơm nhẹ mùi hồng chín.
            </p>
        </div>
    </div>

    <hr>

    <div class="flex flex-col gap-1 p-4 w-full mb-6">
        <div class="flex gap-2 justify-start">
            <div class="w-20 h-auto">
                <img class="rounded-full bg-center"
                    src="https://dacsandalat.com.vn/wp-content/uploads/2024/06/hong-treo-gio-dalavi-20221.jpg"
                    alt="">
            </div>
            <div class="flex flex-col justify-start gap-1">
                <div class="flex gap-1">
                    @for ($i = 0; $i < 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>
                    @endfor
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 hidden">
                        <path fill-rule="evenodd"
                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex justify-start gap-1">
                    <p>Cuong</p>
                    <p>-05/10/2024</p>
                </div>
                <div class="">
                    <p>Hàng hoá chất lượng sạch đẹp sang trọng</p>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <hr>
    <div class="flex gap-4 justify-between mt-6">
        <form class="w-3/5">
            <div class="mb-5">
                <input type="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com" required />
            </div>
            <div class="mb-5">
                <textarea id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>

            </div>

            <button type="submit"
                class="text-white bg-orange-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-blue-700 dark:focus:ring-orange-800">Submit</button>
        </form>
        <div class="w-2/5 flex flex-col gap-4 items-center text-center flex-wrap border-l-2 border-l-slate-400">
            <p class="text-xl">
                Nhớ đánh giá 5 sao cho Shop của MiDien cute nhé ạ <br>
                MiDien xin cảm ơn bạn rất nhiều
            </p>
            <div class="w-32 h-auto flex items-center">
                <img src="https://cdn.kona-blue.com/upload/kona-blue_com/post/images/2024/09/28/511/meo-cute-chibi-3.jpg"
                    alt="">
            </div>
        </div>
    </div>
@endsection
