$(document).ready(function () {
    $('#product__tag-list label').on('click', function () {
        const input = $(this).siblings('input[type="checkbox"]');
        const isChecked = input.is(':checked');

        input.trigger('change', function () {
            $(this).prop('checked', !isChecked)
        })
        $(this).toggleClass('form__label-tag--active');
    })
    $('#image-upload').on('change', function (event) {
        const files = event.target.files;
        console.log(files);

        const previewContainer = $('#preview-image-container');
        previewContainer.empty();
        if (files.length === 0) {
            previewContainer.html('<p class="text-gray-400">No image upload</p>')
            return;
        }

        Array.from(files).forEach((file, index) => {
            // if (file.type.startWith('image/')) {
            //     toast.warning(`File ${file.name} is not a valid image.`)
            //     return;
            // }

            const imageURL = URL.createObjectURL(file);
            previewContainer.append(`<div class="inline-block mr-2">
                <img src="${imageURL}" alt="Preview ${index + 1}" class="max-w-[150px] max-h-[150px] block">
            </div>`)

            previewContainer.sortable();
        })
    })
})