'use strict';

(function($){
    $(document).ready(function() {
        $('#doAuth').submit(function (e) {
            e.preventDefault();
            e.stopPropagation();

            var request = $.ajax({
                url: "../php/login.php",
                type: "POST",
                data: $('#doAuth').serialize(),
                dataType: "json"
            })
            .done(function(msg) {
                if (msg.status == 'ok')
                {
                    location.replace(location.protocol+"//" + location.hostname + "/servicepage.php");
                } else {
                    if (msg.message.username !== undefined)
                    {
                        $('#username-error').text(msg.message.username);
                        $('#username-error').removeClass('hidden');
                        
                        $('#password-error').text('');
                    }
                    if (msg.message.password !== undefined)
                    {
                        $('#password-error').text(msg.message.password);
                        $('#username-error').text('');
                        $('#password-error').removeClass('hidden');
                        

                    }
                }

            })
            .fail(function(jqXHR, textStatus) {
                alert( "Request failed: " + textStatus );
            });
        });

    });
})(jQuery);
