
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



    [].forEach.call(byId('wrapper').getElementsByClassName('silla'), function (el) {
        Sortable.create(el, {
            group: 'sillas',
            animation: 150
        });
    });

    [].forEach.call(byId('wrapper').getElementsByClassName('secciones_mesas'), function (el) {
        Sortable.create(el, {
            group: 'mesas',
            animation: 150
        });
    });


    $('[data-toggle="tooltip"]').tooltip();
    $('.invitados').popover();


    $(document).on("click", ".clickeable", function () {
        $('#mesas_modal').modal('show');
            $('#avisos_modal_titulo').html('¡Duplicidad!');
            $('#avisos_modal_mensaje').html('Ya utilizó el nombre <strong>' + descripcion + '</strong> para identificar una ubicación.');
       
    });


/*

    < form class = "col-lg-12" style = "display:none;" >
            < div class = "form-group" >
            < label for = "numero_mesas" > Número de Mesa * < /label>
            < input type = "number" class = "form-control" id = "numero_mesas"value = "0" required = "required" >
            < /div>
            < div class = "form-group" >
            < label for = "numero_sillas" > Número de Sillas * < /label>
            < input type = "number" class = "form-control" id = "numero_sillas" value = "8" required = "required" >
            < /div>
            < button id = "agrega_mesas" type = "button" class = "btn btn-primary btn-sm btn-block" > Guardar < /button>
            < /form>

*/





})();