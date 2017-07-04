define([
    'jquery',
    'jquery/ui'
], function ($) {
    $.widget("learn9.test", {
        _create: function () {
            $.ajax({
                url: this.options.ajaxurl,
                type: 'POST',
                showLoader: true,
                dataType: 'json',
                data: $('#custom-form').serialize(),
                success: function (response) {
                    alert(response['message']);
                }
            });
        }
    });
    return $.learn9.test;
});