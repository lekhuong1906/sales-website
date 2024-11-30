$(document).ready(function () {
    $('#product-edit__tag-list label').on('click', function () {
        const input = $(this).siblings('input[type="checkbox"]');
        const isChecked = input.is(':checked');

        input.trigger('change', function () {
            $(this).prop('checked', !isChecked)
        })
        $(this).toggleClass('form__label-tag--active');
    })

    const previewContainer = $('#preview-image-container');

    $('#product-edit__add-new-img img').sortable();
    $('#image-upload').on('change', function(event) {
        const files = event.target.files;

        // Duyệt qua tất cả các file mới và thêm vào cuối danh sách
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
    });
})