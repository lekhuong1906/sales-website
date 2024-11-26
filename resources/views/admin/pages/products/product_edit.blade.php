@extends('admin.index')
@section('admin_content')
    <div class="p-4 mb-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="title title--primary">Product Edit</h1>
    </div>

    <form class="mx-auto" enctype="multipart/form-data" method="POST" action="{{ route('admin.product-update', $id) }}">
        @csrf
        <input name="_method" value="PUT" hidden>
        {{-- @dd($data['product']->name) --}}
        <div class="flex gap-4 items-center">
            <div class="w-1/2 flex flex-col items-center gap-4">
                <div class="mb-5 w-full">
                    <label for="product__name--en" class="form__label">
                        Product Name (English)
                    </label>
                    <input class="form__input" type="text" id="product__name--en" name="name[en]"
                        value="{{ $data['product']->name['en'] }}" placeholder="Enter your name product" required />
                </div>
                <div class="mb-5 w-full">
                    <label for="product__des--en" class="form__label">
                        Product Description (English)
                    </label>
                    <textarea id="message" rows="4" id="product__des--en" class="form__textarea" name="description[en]"
                        placeholder="Leave a comment...">{{ $data['product']->description['en'] }}</textarea>
                </div>
            </div>

            <div class="w-1/2 flex flex-col items-center gap-4">
                <div class="mb-5 w-full">
                    <label for="product__name--vi" class="form__label">
                        Product Name (Vietnamese)
                    </label>
                    <input type="text" id="product__name--vi" class="form__input" name="name[vi]"
                        value="{{ $data['product']->name['vi'] }}" placeholder="name@flowbite.com" required />
                </div>
                <div class="mb-5 w-full">
                    <label for="product__des--vi" class="form__label">Product Description (Vietnamese)</label>
                    <textarea id="message" rows="4" id="product__des--vi" class="form__textarea" name="description[vi]">{{ $data['product']->description['en'] }}</textarea>
                </div>
            </div>

        </div>
        <div class="mb-5 w-full flex gap-4 justify-between">
            <div class="w-full">
                <label for="product__price" class="form__label">
                    Price
                </label>
                <input type="text" id="product__price" class="form__input" name="price" placeholder="name@flowbite.com"
                    value="{{ $data['product']->price }}" pattern="^\d+$" required />
            </div>
            <div class="w-full">
                <label for="product__stock" class="form__label">
                    Stock
                </label>
                <input type="text" id="product__stock" class="form__input" name="stock" placeholder="name@flowbite.com"
                    value="{{ $data['product']->stock }}" pattern="^\d+$" required />
            </div>
            <div class="w-full">
                <label for="product__status" class="form__label">
                    Status
                </label>
                <select id="product__status" name="status" class="form__select">
                    <option value="1" {{ $data['product']->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$data['product']->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <div class="mb-5 w-full">
            <label for="user_avatar" class="form__label">
                Tags
            </label>
            <div id="product-edit__tag-list"
                class="flex gap-2 items-center flex-wrap p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-200">
                @foreach ($data['tags'] as $tag)
                    <div class="flex">
                        <input type="checkbox" id="product__tag--{{ $tag->_id }}" value="{{ $tag->_id }}"
                            name="tags[]" hidden {{ in_array($tag->_id, $data['product']->tags) ? 'checked' : '' }}>
                        <label for="product__tag--{{ $tag->_id }}"
                            class="form__label-tag {{ in_array($tag->_id, $data['product']->tags) ? 'form__label-tag--active' : '' }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach

                {{-- <div class="flex">
                    <label for="tag-1" class="form__label-tag form__label-tag--active">
                        Trong ngày
                    </label>
                    <input type="checkbox" id="tag-1" name="tag-1" hidden>
                </div> --}}

                <a data-toggle="show-modal" class="form__label-tag text-gray-500 bg-slate-200 toggle">
                    + Add New Tag
                </a>

            </div>
        </div>

        <div class="mb-5 w-full">
            <label for="image-upload" class="form__label">
                Images
            </label>
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-200 flex flex-wrap gap-4">
                <div class="flex gap-4 flex-wrap" id="preview-image-container">
                    @if (count($data['product']->images) > 0)
                        @foreach ($data['product']->images as $key => $img)
                            <div class="relative">
                                <img class="max-w-[150px] max-h-[150px]" src="{{ $img }}" alt=""
                                    data-id="{{ $key }}">
                                <input type="text" name="images[{{ $key }}]" value="{{ $img }}"
                                    hidden>
                                <span data-close="product__edit__close-img"
                                    class="absolute -top-2 -right-2 p-1 bg-red-300 rounded-full cursor-pointer hover:bg-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </span>
                            </div>
                        @endforeach
                    @else
                        <span class="text-gray-400">No Image upload</span><br>
                    @endif
                </div>
                <div>
                    <label for="image-upload"
                        class="w-[150px] h-[150px] flex flex-col items-center justify-center text- p-2 border-2 border-dashed rounded-lg border-gray-400 cursor-pointer text-sm text-gray-400"
                        id="product-edit__add-new-img">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path
                                d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                        </svg>
                        Add another image
                    </label>
                    <input class="form__input form__input-file cursor-pointer mb-2 file:hidden !hidden" name="images[]"
                        id="image-upload" type="file" multiple>
                </div>
            </div>

        </div>

        <button type="submit" class="form__button form__button--primary">
            Update Product
        </button>

    </form>

    <div id="product__tag-add-new">
        @include('admin.components.tags.tag_add')
    </div>

    @vite('resources/js/product_edit.js')
@endsection
