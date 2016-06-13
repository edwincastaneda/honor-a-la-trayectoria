
(function () {
    
    'use strict';

    var byId = function (id) {
        return document.getElementById(id);
    },
            loadScripts = function (desc, callback) {
                var deps = [], key, idx = 0;

                for (key in desc) {
                    deps.push(key);
                }

                (function _next() {
                    var pid,
                            name = deps[idx],
                            script = document.createElement('script');

                    script.type = 'text/javascript';
                    script.src = desc[deps[idx]];

                    pid = setInterval(function () {
                        if (window[name]) {
                            clearTimeout(pid);

                            deps[idx++] = window[name];

                            if (deps[idx]) {
                                _next();
                            } else {
                                callback.apply(null, deps);
                            }
                        }
                    }, 30);

                    document.getElementsByTagName('head')[0].appendChild(script);
                })()
            },
            console = window.console;
            
            
    function preparaTexto(text) {
        var acentos = "ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÑñÇç `´¨*?¿+[¡!]{$}&(%)";
        var original = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc-------------------";
        for (var i = 0; i < acentos.length; i++) {
            text = text.replace(acentos.charAt(i), original.charAt(i));
        }
        return text;
    }

    function activaSorted() {
        [].forEach.call(byId('wrapper').getElementsByClassName('seccion_tabla'), function (el) {
            Sortable.create(el, {
                group: 'localidades',
                animation: 150,
                ghostClass: "ghost",
                onEnd: function (evt) {

                    var actual = evt.item.childNodes[2].className;
                    var padre = evt.item.parentNode.id;


                    arrayTablas.forEach(function (arr) {
                        if (arr.descripcion === actual) {
                            arr.padre = padre;
                        }
                    });

                    autoGuardar();
                }
            });
        });
    }

    activaSorted();

    var count = 1;

    $("#agrega_tabla").click(function () {
        var columnas = $("#columnas_tabla").val();
        var filas = $("#filas_tabla").val();
        var descripcion = preparaTexto($("#descripcion_tabla").val());
        var mesas = 0;

        if ($('#mesas_tabla').is(":checked")) {
            mesas = 1;
        }

        if (descripcion == "") {
            descripcion = "sin_titulo" + count;
            count++;
        }


        var continuar = true;
        arrayTablas.forEach(function (arr) {

            if (arr.descripcion === descripcion) {
                continuar = false;
            }

        });

        if (continuar) {
            var objeto = {};
            objeto["descripcion"] = descripcion;
            objeto["columnas_filas"] = columnas + "-" + filas;
            objeto["padre"] = "mapa_localidades";
            objeto["mesas"] = mesas;

            arrayTablas.push(objeto);



            if (columnas != '' && filas != '') {

                var tabla = "<div class='tabla_localidad'>" +
                        "<span class='borrar_tabla'>✖</span>" +
                        "<span class='titulo_tabla'>" + descripcion + "</span>" +
                        "<table class='" + descripcion + "'>";

                for (var i = 0; i < filas; i++) {
                    tabla += "<tr>";
                    for (var j = 0; j < columnas; j++) {
                        tabla += "<td class='seccion_tabla mesas_" + mesas + "' id='" + descripcion + "-" + (j + 1) + "-" + (i + 1) + "'></td>";
                    }
                    tabla += "</tr>";
                }
                tabla += "</table></div>";
                $("#mapa_localidades").append(tabla);


                activaSorted();
                autoGuardar();

            } else {

                $('#avisos_modal').modal('show');
                $('#avisos_modal_titulo').html('Falta Información');
                $('#avisos_modal_mensaje').html('Debe de agregar todos los campos requeridos.');

            }
        } else {
            $('#avisos_modal').modal('show');
            $('#avisos_modal_titulo').html('¡Duplicidad!');
            $('#avisos_modal_mensaje').html('Ya utilizó el nombre <strong>' + descripcion + '</strong> para identificar una ubicación.');
        }
    });

    $(document).on("click", ".borrar_tabla", function () {
        $(this).parent().remove();
        var remove = $(this).parent().children(2)[2].className;
        arrayTablas.forEach(function (item, index, object) {
            if (item.descripcion === remove) {
                object.splice(index, 1);
            }
        });

        autoGuardar();

    });


    function autoGuardar() {
        var values = {};
        values.arrayTablas = {};

        arrayTablas.forEach(function (item, index) {
            var cf = item.columnas_filas.split("-");
            var padre = item.padre.split("-");
            values.arrayTablas[index] = item.descripcion + "," + cf[0] + ","
                    + cf[1] + "," + padre[0] + "," + padre[1] + "," + padre[2] + "," + item.mesas;
        });

        $.post("localidades/agregar",
                {
                    params: values
                },
                function (status) {
                    if (status != "success") {
                        $('#alert_auto_guardado').fadeIn('fast', function () {
                            $(this).delay(1500).fadeOut('fast');
                        });
                    }
                });

    }



})();