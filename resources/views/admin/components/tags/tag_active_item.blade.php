<!-- Active Item Template -->
<div class="relative">
    <label id="abc" data-event="dropdown-tag-item" data-dropdown="{{ $id }}"
        class="form__label-dropdown form__label-dropdown--active" type="button">
        {{ $name }}
        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
        </svg>
    </label>
    <!-- Dropdown for Active Item -->
    <div data-parent-dropdown="{{ $id }}"
        class="absolute  hidden mt-1 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
        <ul class="py-3 text-sm text-gray-700">
            <li>
                <a data-event="tag-action" data-action="edit" data-tag-id="{{ $id }}"
                    class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">
                    Edit
                </a>
            </li>
            <li>
                <a data-event="tag-action" data-action="inactive" data-tag-id="{{ $id }}"
                    class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">
                    Inactive
                </a>
            </li>
            <li>
                <a data-event="tag-action" data-action="delete" data-tag-id="{{ $id }}"
                    class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">
                    Delete
                </a>
            </li>
            <li>
                <a data-event="tag-action" data-action="force-delete" data-tag-id="{{ $id }}"
                    class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">
                    Force Delete
                </a>
            </li>
        </ul>
    </div>
</div>
