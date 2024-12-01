$(document).ready(function () {
    $('.tag-group').on('click', function (e) {
        e.stopPropagation();
        initActions($(this));
    })

    const initActions = (container) => {
        let tagID = container.attr('id');
        let dropdown = container.find('.dropdown-container')
        $('.dropdown-container').not(dropdown).addClass('hidden');
        dropdown.toggleClass('hidden');

        dropdown.find('.tag-action').on('click', function (e) {
            let action = $(this).data('action');

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
        })

        // $(document).on('click', function () {
        //     console.log(123);
        //     $('.dropdown-container').addClass('hidden');
        // });
    }

    // Ẩn dropdown khi click ra ngoài
    // $(document).on('click', function () {
    //     $('.dropdown-container').addClass('hidden');
    // });


    const ajaxEditTag = async function (tagID) {
        $.ajax({
            url: `tag-edit/${tagID}`, // Action
            type: 'GET',
            success: function (response) {
                $('#tag__edit-container').append(response.view);
                $('#tag__edit-close-btn').on('click', function () {
                    $('#tag__edit-container').empty();
                })
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON.message)
            }
        });
    }

    const ajaxTagActiveTag = async function (tagID) {
        $.ajax({
            url: 'tag-active',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                id: tagID
            },
            success: function (response) {
                //Notify
                console.log('Active');
                
                toastr.success(response.message);

                //Update item to container
                $('#' + tagID).remove();
                $('#tag__items-active').append(response.view);

                //Init action
                let container = $('#tag__items-active .tag-group').last();
                container.on('click', function (e) {
                    e.stopPropagation();
                    initActions($(this))
                })
            },
            error: function (xhr) {
                console.log(xhr);
                toastr.error('Something went wrong!')
                // location.reload();
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
                //Notify 
                toastr.success(response.message);

                //Update new item to container
                $('#' + tagID).remove();
                $('#tag__items-inactive').append(response.view);

                //Init action
                let container = $('#tag__items-inactive .tag-group').last();
                container.on('click', function (e) {
                    e.stopPropagation();
                    initActions($(this))
                })
            },
            error: function (xhr) {
                console.log(xhr);
                toastr.error('Something went wrong!')
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
                //Notify
                toastr.success(response.message)

                //Update new item to container
                $('#' + tagID).remove();
                $('#tag__items-destroy').append(response.view);

                //Init action
                let container = $('#tag__items-destroy .tag-group').last();
                container.on('click', function (e) {
                    e.stopPropagation();
                    initActions($(this))
                })
            },
            error: function (xhr) {
                console.log(xhr);
                toastr.error(xhr.responseJSON.message)
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
                //Notify
                toastr.success(response.message);

                //Update item to container
                $('#' + tagID).remove();

                if (response.status) {
                    $('#tag__items-active').append(response.view);
                } else {
                    $('#tag__items-inactive').append(response.view);
                }

                //Init action
                let container = $('#' + tagID);
                container.on('click', function (e) {
                    e.stopPropagation();
                    initActions($(this))
                })

            },
            error: function (xhr) {
                // console.log(xhr.responseJSON.message);
                toastr.error(xhr.responseJSON.message)
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
                //Notify
                toastr.success(response.message);

                //Update item to container
                $('#' + tagID).remove();
            },
            error: function (xhr) {
                toastr.error(xhr.responseJSON.message)
            }
        });
    }

})