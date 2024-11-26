@extends('admin.index')
@section('admin_content')
    <div class="p-4 mb-6 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="title title--primary">Tag List</h1>
    </div>

    <div class="mx-auto">
        <!-- List tag valid -->
        <div class="mb-5 w-full">
            <label class="form__label" for="user_avatar">
                Tags Hiển Thị
            </label>
            <div
                class="flex gap-2 items-center flex-wrap p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-200">
                @if (count($data['valid']) > 0)
                    @foreach ($data['valid'] as $tag_id => $tag)
                        @include('admin.components.tags.tag_active_item', [
                            'id' => $tag->_id,
                            'name' => $tag->name,
                        ])
                    @endforeach
                @else
                    <p class="text-nomal text-slate-300">Empty item</p>
                @endif
            </div>
        </div>

        <div class="mb-5 w-full">
            <label class="form__label" for="user_avatar">
                Tags Đã Ẩn
            </label>

            <div
                class="flex gap-2 items-center flex-wrap p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-200">
                @if (count($data['invalid']) > 0)
                    @foreach ($data['invalid'] as $tag)
                        @include('admin.components.tags.tag_inactive_item', [
                            'id' => $tag->_id,
                            'name' => $tag->name,
                        ])
                    @endforeach
                @else
                    <p class="text-nomal text-slate-300">Empty item</p>
                @endif
            </div>
        </div>

        <div class="mb-5 w-full">
            <label class="form__label" for="user_avatar">
                Tags Đã Xóa
            </label>
            <div
                class="flex gap-2 items-center flex-wrap p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-200">
                @if (count($data['trash']) > 0)
                    @foreach ($data['trash'] as $tag_id => $tag)
                        @include('admin.components.tags.tag_deleted_item', [
                            'id' => $tag->_id,
                            'name' => $tag->name,
                        ])
                    @endforeach
                @else
                    <p class="text-nomal text-slate-300">Empty item</p>
                @endif
            </div>
        </div>

        <button type="button" data-toggle="show-modal" class="form__button form__button--primary toggle">
            Add New Tag
        </button>
    </div>

    @include('admin.components.tags.tag_add')

    <!-- For Edit item -->
    <div id="tag__edit-container"></div>

    @vite('resources/js/tag_list.js')
@endsection
