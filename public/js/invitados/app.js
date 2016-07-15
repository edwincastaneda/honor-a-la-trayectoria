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

})();