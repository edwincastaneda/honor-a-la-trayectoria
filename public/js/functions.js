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

})();