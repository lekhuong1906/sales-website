$(document).ready(function () {
    $('a[data-event="product-delete"]').on('click', function () {
        let productID = $(this).data('id');

        $.ajax({
            url: `product-destroy/${productID}`,
            type: 'delete',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                location.reload();
            },
            error: function (xhr) {
                location.reload();
            }

        })
    })

    $('#product-detail').on('click',function(){
        $('#product-detail-container').removeClass('hidden');
    })
    $('#close-modal').on('click', function(){
        $('#product-detail-container').addClass('hidden');
    })
})