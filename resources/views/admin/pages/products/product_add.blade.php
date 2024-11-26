@extends('admin.index')
@section('admin_content')
    <div class="p-4 mb-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="title title--primary">Product Add</h1>
    </div>

    <form class="mx-auto" enctype="multipart/form-data" method="POST" action="{{ route('admin.product-store') }}">
        @csrf
        <div class="flex gap-4 items-center">
            <div class="w-1/2 flex flex-col items-center gap-4">
                <div class="mb-5 w-full">
                    <label for="product__name--en" class="form__label">
                        Product Name (English)
                    </label>
                    <input class="form__input" type="text" id="product__name--en" name="name[en]"
                        value="{{ old('name["en"]') }}" placeholder="Enter your name product" required />
                </div>
                <div class="mb-5 w-full">
                    <label for="product__des--en" class="form__label">
                        Product Description (English)
                    </label>
                    <textarea id="message" rows="4" id="product__des--en" class="form__textarea" name="description[en]"
                        placeholder="Leave a comment...">{{ old('description["en"]') }}</textarea>
                </div>
            </div>

            <div class="w-1/2 flex flex-col items-center gap-4">
                <div class="mb-5 w-full">
                    <label for="product__name--vi" class="form__label">
                        Product Name (Vietnamese)
                    </label>
                    <input type="text" id="product__name--vi" class="form__input" name="name[vi]"
                        value="{{ old('name["vi"]') }}" placeholder="name@flowbite.com" required />
                </div>
                <div class="mb-5 w-full">
                    <label for="product__des--vi" class="form__label">Product Description (Vietnamese)</label>
                    <textarea id="message" rows="4" id="product__des--vi" class="form__textarea" name="description[vi]">{{ old('name["en"]') }}</textarea>
                </div>
            </div>

        </div>
        <div class="mb-5 w-full flex gap-4 justify-between">
            <div class="w-full">
                <label for="product__price" class="form__label">
                    Price
                </label>
                <input type="text" id="product__price" class="form__input" name="price" placeholder="name@flowbite.com"
                    value="{{ old('price') }}" pattern="^\d+$" required />
            </div>
            <div class="w-full">
                <label for="product__stock" class="form__label">
                    Stock
                </label>
                <input type="text" id="product__stock" class="form__input" name="stock" placeholder="name@flowbite.com"
                    value="{{ old('stock') }}" pattern="^\d+$" required />
            </div>
            <div class="w-full">
                <label for="product__status" class="form__label">
                    Status
                </label>
                <select id="product__status" name="status" class="form__select">
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>

        <div class="mb-5 w-full">
            <label for="user_avatar" class="form__label">
                Tags
            </label>
            <div id="product__tag-list"
                class="flex gap-2 items-center flex-wrap p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-200">
                @foreach ($data['tags'] as $tag)
                    <div class="flex">
                        <input type="checkbox" id="product__tag--{{ $tag->_id }}" value="{{ $tag->_id }}"
                            name="tags[]" hidden>
                        <label for="product__tag--{{ $tag->_id }}" class="form__label-tag">
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
                Upload file
            </label>
            <input class="form__input form__input-file cursor-pointer mb-2" name="images[]" id="image-upload" type="file"
                multiple>
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-200"
                id="preview-image-container">
                <span class="text-gray-400">No Image upload</span><br>
            </div>
        </div>

        <button type="submit" class="form__button form__button--primary">
            Add New Product
        </button>
    </form>

    <div id="product__tag-add-new">
        @include('admin.components.tags.tag_add')
    </div>

    @vite('resources/js/product_add.js')
@endsection
