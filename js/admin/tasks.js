'use strict';
(function($){
    $(document).ready(function() {

        $('.updateStatus').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            if (confirm('Вы точно хотите отметить запрос?')) {
                var request = $.ajax({
                    url: "../../php/admin/updateStatus.php",
                    type: "POST",
                    data: {id: $(this).data('id')},
                    dataType: "json"
                })
                    .done(function (msg) {
                        if (msg.status == 'ok') {
                            location.reload();
                        } else {
                            alert('error')
                            console.log(msg.message);
                        }

                    })
                    .fail(function (jqXHR, textStatus) {
                        alert("Request failed: " + textStatus);
                    });
            }
        });

        $('.deleteRequest').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            if (confirm('Вы точно хотите удалить запрос?')) {
                var request = $.ajax({
                    url: "../../php/admin/deleteRequest.php",
                    type: "POST",
                    data: {id: $(this).data('id')},
                    dataType: "json"
                })
                    .done(function (msg) {
                        if (msg.status == 'ok') {
                            location.reload();
                        } else {
                            alert('error')
                            console.log(msg.message);
                        }

                    })
                    .fail(function (jqXHR, textStatus) {
                        alert("Request failed: " + textStatus);
                    });
            }
        });

    });
})(jQuery);