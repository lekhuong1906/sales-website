<!-- Add new Tag Model template -->
<div data-tag-id="{{ $tag->_id }}"
    class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-fit max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Tag
                </h3>
                <button type="button" id="tag__edit-close-btn"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="{{ route('admin.tag-update', $tag->_id) }}" method="POST">
                    @csrf
                    <input name="_method" value="PUT" hidden>
                    <div class="flex gap-4 items-center">
                        <div class="w-1/2 flex flex-col items-center gap-4">
                            <div class="mb-5 w-full">
                                <label for="tag__edit-name--en" class="form__label">
                                    Tag Name (English)
                                </label>
                                <input type="text" id="edit__tag-name--en" class="form__input" name="name[en]"
                                    placeholder="name@flowbite.com" value="{{ $tag->name['en'] }}" required />
                            </div>
                            <div class="mb-5 w-full">
                                <label for="tag__edit-des--en" class="form__label">
                                    Tag Description (English)
                                </label>
                                <textarea id="tag__edit-des--en" rows="4" class="form__textarea" name="description[en]"
                                    placeholder="Leave a comment...">{{ $tag->description['en'] }}</textarea>
                            </div>
                        </div>

                        <div class="w-1/2 flex flex-col items-center gap-4">
                            <div class="mb-5 w-full">
                                <label for="tag__edit-name--vi" class="form__label">
                                    Tag Name (Vietnamese)
                                </label>
                                <input type="text" id="tag__edit-name--vi" class="form__input" name="name[vi]"
                                    placeholder="name@flowbite.com" value="{{ $tag->name['vi'] }}" required />
                            </div>
                            <div class="mb-5 w-full">
                                <label for="tag__edit-des--vi" class="form__label">
                                    Tag Description (Vietnam)
                                </label>
                                <textarea id="tag__edit-des--vi" rows="4" class="form__textarea" name="description[vi]"
                                    placeholder="Leave a comment...">{{ $tag->description['vi'] }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5 w-full">
                        <label for="tag__edit-status" class="form__label">
                            Tag Status
                        </label>
                        <select id="tag__edit-status" class="form__select" name="status">
                            <option value="1" {{ $tag->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $tag->status == 0 ? 'selected' : '' }}>InActive</option>
                        </select>
                    </div>
                    <button type="submit" class="form__button form__button--primary">
                        Update Tag
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
