@extends('home.home_layout')
@section('content')
    <div class="mx-auto">
        <div class="my-16 text-center text-3xl text-orange-600">Toàn Bộ Gia Sản</div>
        <div class="flex gap-6">
            <div class="bg-white h-fit w-1/3">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-bold bg-orange-400 text-white rounded-t-xl py-4 px-6">Category</h1>
                    <ul class="p-6 rounded-b-xl">
                        @foreach ($data['tags'] as $tag)
                            <li class="flex gap-4 px-2 py-1 text-xl">
                                <a href="#">
                                    {{ $tag->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="w-2/3 p-4">
                <form class="">
                    <div class="flex gap-4 justify-between max-w-full py-4 mx-auto">
                        <div class="flex h-auto max-w-md justify-start gap-4">
                            <select
                                class="px-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>

                        <div class="flex gap-2">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="default-search"
                                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search Mockups, Logos..." required />

                            </div>
                            <button type="submit"
                                class="text-white end-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="grid grid-cols-3 grid-flow-row-dense gap-4">
                    @foreach ($data['products'] as $product)
                        <div class="col-span-1 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow relative">

                            <!-- Playlist -->
                            <div class="h-fit w-fit right-0 absolute bg-orange-400 rounded-md">
                                <a href="#" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-10 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </a>
                            </div>

                            <!-- Img product -->
                            <a href="{{ route('product-detail', $product->_id) }}">
                                <img class="p-8 rounded-t-lg" src="{{ $product->images[0] }}" alt="product image" />
                            </a>
                            <div class="px-5 pb-5">
                                <a href="#">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $product->name }}</h5>
                                </a>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <div class="flex items-center w-full justify-between space-x-1 rtl:space-x-reverse">

                                        <div class="flex justify-start gap-1">
                                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <span
                                                class="bg-orange-100 text-orange-800 text-xs font-semibold px-2.5 py-0.5 rounded">5.0</span>
                                        </div>

                                        <span class="text-lg font-bold text-orange-800">
                                            {{ number_format($product->price) }} vnđ
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 items-start justify-start">
                                    <a href="#"
                                        class="w-full text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-10">
                    <button class="px-6 py-2 bg-orange-400 text-xl text-white font-normal rounded-md">Xem them</button>
                </div>

            </div>

        </div>
    </div>
@endsection
