<!-- Active Item Template -->
<div id="{{ $id }}" class="relative tag-group">
    <label class="form__label-dropdown form__label-dropdown--active" type="button">
        {{ $name }}
        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
        </svg>
    </label>
    <!-- Dropdown for Active Item -->
    <div class="absolute  hidden mt-1 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dropdown-container">
        <ul class="py-3 text-sm text-gray-700">
            <li>
                <a data-event="tag-action" data-action="edit"
                    class="block px-4 py-2 hover:bg-gray-100 cursor-pointer tag-action">
                    Edit
                </a>
            </li>
            <li>
                <a data-event="tag-action" data-action="inactive"
                    class="block px-4 py-2 hover:bg-gray-100 cursor-pointer tag-action">
                    Inactive
                </a>
            </li>
            <li>
                <a data-event="tag-action" data-action="delete"
                    class="block px-4 py-2 hover:bg-gray-100 cursor-pointer tag-action">
                    Delete
                </a>
            </li>
            <li>
                <a data-event="tag-action" data-action="force-delete"
                    class="block px-4 py-2 hover:bg-gray-100 cursor-pointer tag-action">
                    Force Delete
                </a>
            </li>
        </ul>
    </div>
</div>
