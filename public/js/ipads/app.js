
(function () {

  

    //MODAL SOBRE MESA
    $(document).on("click", ".contenedor_mesa", function () {
        var id = $(this).attr('id').split('-');
        var data = new Object();
        $("#tabla_sillas_mesa").bootstrapTable('removeAll');
        arrayInvitados.forEach(function (arr, index, object) {
            if (arr.mesa === id[0]) {
                $("#tabla_sillas_mesa").bootstrapTable('append', arr);
            }
        });
        $("#descripcion_mesas_modal").modal("show");
        $("#descripcion_mesas_titulo").html("Mesa: " + id[0]);
    });


   


})();