(function () {

    $('#drag-and-drop-zone').dmUploader({
        url: host + 'invitados/subirXLS',
        maxFiles: 1,
        onInit: function () {
            console.log('Plugin initialized correctly');
        },
        onBeforeUpload: function (id) {
            console.log('Starting the upload of #' + id);
            console.log('Uploading...');
        },
        onUploadProgress: function (id, percent) {
            var percentStr = percent + '%';
            console.log(id, percentStr);
        },
        onUploadSuccess: function (id, data) {
            $('#uploader-succes').html(data).fadeIn('slow', function () {
                $(this).delay(15500).fadeOut('slow');
            });
        },
        onUploadError: function (id, message) {
            console.log("error message", message);

            console.log('Failed to Upload file #' + id + ': ' + message);
        },
        onFileTypeError: function (file) {
            console.log('File \'' + file.name + '\' cannot be added: must be an image');
        },
    });


    $(document).on("click", ".cambiarEstadoPin", function () {

        var codigo = $(this).attr('id');
        var estado = 0;

        if ($(this).attr('name') == 0) {
            estado = 1;
            $(this).attr('name', "1");
            $(this).removeClass("btn btn-xs glyphicon glyphicon-play btn-primary cambiarEstadoPin").addClass("btn btn-xs glyphicon glyphicon-stop btn-success cambiarEstadoPin");
        } else {
            estado = 0;
            $(this).attr('name', "0");
            $(this).removeClass("btn btn-xs  glyphicon glyphicon-stop btn-success cambiarEstadoPin").addClass("btn btn-xs glyphicon glyphicon-play btn-primary cambiarEstadoPin");
        }

        $.post("programa/registrar/" + codigo + "/" + estado,
                function (data, status) {
                    if (status == "success") {
                        $.get("programa/refrescar/1");
                        $('#alert_auto_guardado').fadeIn('fast', function () {
                            $(this).delay(1500).fadeOut('fast');
                        });
                    }
                });
    });


    $(document).on("click", "#cambiarEntregador", function () {

        $('#modalCambiaEntregador').modal("show");
        $("#codigoBarrasModal").html($(this).attr("name"));

    });

    $(document).on("click", "#cambiarEntregadorModal", function () {
        codigo = $("#codigoBarrasModal").html();
        entrega = $("#perfilEntregadorModal").val();
        entregaHtml = $("#perfilEntregadorModal option:selected").text();

        $("#entregador-" + codigo).html(entregaHtml);
        $.post("invitados/cambiarEntregador/" + codigo + "/" + entrega,
                function (data, status) {
                    if (status == "success") {
                        $.get("programa/refrescar/1");
                        $('#modalCambiaEntregador').modal("hide");
                        $('#alert_auto_guardado').fadeIn('fast', function () {
                            $(this).delay(1500).fadeOut('fast');
                        });
                    }
                });
    });


    $(document).keyup(function (e) {
        if (e.keyCode === 27) {
            $('.search input[type="text"]').val('');
            $('.search input[type="text"]').focus();
        }
    });

    $(document).on("click", ".confirmar", function () {

        var codigo = $(this).attr('id');
        var estado = 0;

        if ($(this).attr('name') == 0) {
            estado = 1;
            $(this).attr('name', "1");
            $(this).removeClass("btn btn-xs glyphicon glyphicon-remove btn-danger confirmar").addClass("btn btn-xs glyphicon glyphicon-ok btn-success confirmar");
        } else {
            estado = 0;
            $(this).attr('name', "0");
            $(this).removeClass("btn btn-xs  glyphicon glyphicon-ok btn-success confirmar").addClass("btn btn-xs glyphicon glyphicon-remove btn-danger confirmar");
        }

      $.post("programa/confirmar/" + codigo + "/" + estado,
                function (data, status) {
                    if (status == "success") {
                        $.get("programa/refrescar/1");
                        $('#alert_auto_guardado').fadeIn('fast', function () {
                            $(this).delay(1500).fadeOut('fast');
                        });
                    }
                });
    });



})();