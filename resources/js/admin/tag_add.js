$(document).ready(function () {

    $('.toggle[data-toggle="show-modal"]').click(() => {
        $('#authentication-modal').removeClass('hidden');
    })

    $('#close-modal').click(() => {
        $('#authentication-modal').addClass('hidden');
    })

})