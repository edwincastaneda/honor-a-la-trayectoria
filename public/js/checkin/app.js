(function () {

    $(document).keyup(function (e) {
        if (e.keyCode === 27) {
            $('.search input[type="text"]').val('');
        }
    });

    $(document).on("click", ".finalizar", function (event) {
        event.preventDefault();
        var codigo = $("#codigoBarras").val();
        var personas = $("#no_personas").val();

        $.post("../checkin/asistieron/" + codigo + "/" + personas,
                function (data, status) {
                    if (status == "success") {
                        $.get("../programa/refrescar/1");
                        console.log(codigo+personas);
                       window.location.href=url+"checkin";
                    }
                });
    });

})();