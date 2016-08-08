(function () {



    $(".chk").change(function () {
        var estado = 0;
        var codigo = $(this).attr("id");

        if ($(this).is(':checked') == true) {
            estado = 1;
        } else {
            estado = 0;
        }

        $.post("programa/registrar/" + codigo + "/" + estado,
                function (data, status) {
                    if (status == "success") {
                        $('#alert_auto_guardado').fadeIn('fast', function () {
                            $(this).delay(1500).fadeOut('fast');
                        });
                    }
                });
    });



    $(document).ready(function () {
        setInterval(function () {
            cache_clear()
        }, 500);
    });

    function cache_clear()
    {
        $.get("programa/autorefresh",
                function (data, status) {
                    if (status == "success") {
                        if (data.valor == 1) {

                            $.get("programa/refrescar/0",
                                    function (data, status) {
                                        if (status == "success") {
                                                window.location.reload(true);
                                        }
                                    });

                            window.location.reload(true);
                        }
                    }
                });
    }



})();