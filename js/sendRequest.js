'use strict';

function clearFields() {
    $('input[name=name]').val("");
    $('input[name=phone]').val("");
    $('textarea[name=service]').val("");
}

(function($){
    $(document).ready(function() {
        $('#requests_form').submit(function (e) {
            e.preventDefault();
            e.stopPropagation();


            var request = $.ajax({
                url: "../php/saveRequest.php",
                type: "POST",
                data: $('#requests_form').serialize(),
                dataType: "json"
            })
            .done(function(msg) {
                if (msg.status == 'ok')
                {
                    clearFields();
                    $('#status').text(msg.message);
                    $('#status').removeClass('hidden');
                    setTimeout( function() {
                        $('#status').addClass('hidden');
                    }, 5000);
                } else{
                    if (msg.message.name !== undefined)
                    {
                        $('#name-error').text(msg.message.name);
                        $('#name-error').removeClass('hidden');
                    }
                    if (msg.message.phone !== undefined)
                    {
                        $('#phone-error').text(msg.message.phone);
                        $('#phone-error').removeClass('hidden');
                    }
                    if (msg.message.service !== undefined)
                    {
                        $('#service-error').text(msg.message.service);
                        $('#service-error').removeClass('hidden');
                    }
                }

            })
            .fail(function(jqXHR, textStatus) {
                alert( "Request failed: " + textStatus );
            });
        });

    });
})(jQuery);

