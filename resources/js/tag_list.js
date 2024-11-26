$(document).ready(function () {

    $('label[data-event="dropdown-tag-item"]').on('click', function (e) {
        e.stopPropagation();

        let dataDropdownVal = $(this).data("dropdown");
        let dropDownContainer = $('div[data-parent-dropdown="' + dataDropdownVal + '"]');

        // Ẩn tất cả các dropdown khác
        $('div[data-parent-dropdown]').not(dropDownContainer).addClass('hidden');

        // Toggle dropdown hiện tại
        dropDownContainer.toggleClass('hidden');
    });

    // Xử lý các hành động bên trong dropdown
    $(document).on('click', 'a[data-event="tag-action"]', function (e) {
        e.stopPropagation();

        let action = $(this).data('action');
        let tagID = $(this).data('tag-id');

        // Gọi các hàm xử lý dựa trên hành động
        switch (action) {
            case 'edit':
                ajaxEditTag(tagID);
                break;
            case 'delete':
                ajaxTagDestroy(tagID);
                break;
            case 'restore':
                ajaxTagRestore(tagID);
                break;
            case 'force-delete':
                ajaxTagForceDelete(tagID);
                break;
            case 'active':
                ajaxTagActiveTag(tagID);
                break;
            case 'inactive':
                ajaxTagInactiveTag(tagID);
                break;
        }
    });

    // Ẩn dropdown khi click ra ngoài
    $(document).on('click', function () {
        $('div[data-parent-dropdown]').addClass('hidden');
    });


    const ajaxEditTag = async function (tagID) {
        $.ajax({
            url: `tag-edit/${tagID}`, // Action
            type: 'GET',
            success: function (response) {
                $('#tag__edit-container').append(response.view);
                $('#tag__edit-close-btn').on('click', function(){
                    $('#tag__edit-container').empty();
                })

                // location.reload();
            },
            error: function (xhr) {
                // location.reload();
            }
        });
    }

    const ajaxTagActiveTag = async function (tagID) {
        $.ajax({
            url: 'tag-active', // Đường dẫn xử lý yêu cầu
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                id: tagID
            },
            success: function (response) {
                location.reload();
            },
            error: function (xhr) {
                location.reload();
            }
        });
    }

    const ajaxTagInactiveTag = async function (tagID) {
        $.ajax({
            url: 'tag-inactive', // Đường dẫn xử lý yêu cầu
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                id: tagID
            },
            success: function (response) {
                location.reload();
            },
            error: function (xhr) {
                location.reload();
            }
        });
    }

    const ajaxTagDestroy = async function (tagID) {
        $.ajax({
            url: 'tag-destroy', // Đường dẫn xử lý yêu cầu
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                id: tagID
            },
            success: function (response) {
                location.reload();
            },
            error: function (xhr) {
                console.log(xhr);

                location.reload();
            }
        });
    }

    const ajaxTagRestore = async function (tagID) {
        $.ajax({
            url: 'tag-restore', // Đường dẫn xử lý yêu cầu
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                id: tagID
            },
            success: function (response) {
                location.reload();
            },
            error: function (xhr) {
                location.reload();
            }
        });
    }

    const ajaxTagForceDelete = async function (tagID) {
        $.ajax({
            url: 'tag-force-delete', // Đường dẫn xử lý yêu cầu
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                id: tagID
            },
            success: function (response) {
                location.reload();
            },
            error: function (xhr) {
                location.reload();
            }
        });
    }

})