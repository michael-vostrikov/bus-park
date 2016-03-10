$(document).ready(function() {

    $('.driver-index .toggle-is-active').click(function () {
        var $btn = $(this);

        $.post($btn.data('url'))
            .success(function () {
                $btn.toggleClass('active');
            })
            .error(function() {
                alert('Error while changing state');
            });
    });

});
