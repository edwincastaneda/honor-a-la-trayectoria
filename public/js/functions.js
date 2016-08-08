$(window).load(function () {
    $(".loading").fadeOut("slow");
    $("#wrapper").fadeIn("slow");
});

(function () {



    $(".menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        if ($(this).html() == '<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>') {
            $(this).html('<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>');
        } else {
            $(this).html('<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>');
        }
    });


    $("#refrescar, #refrescar2").click(function () {
        $.get("programa/refrescar/1",
                function (data, status) {
                    if (status == "success") {
                        $('#alert_auto_guardado2').fadeIn('fast', function () {
                            $(this).delay(1500).fadeOut(3000);
                        });
                    }
                });
    });






})();