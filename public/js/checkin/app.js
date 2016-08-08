(function () {

    $(document).keyup(function (e) {
        if (e.keyCode === 27) {
            $('.search input[type="text"]').val('');
        }
    });

})();