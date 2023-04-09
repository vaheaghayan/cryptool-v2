//!!!!!!!!Don't forget to remove csrf verification for upload action!!!!!!!!!!

$gUploader = {};

$gUploader.beforeUpload = function(self){};
$gUploader.afterUpload = function(self){};

$gUploader.onX = function(self){
    $(".g-upload-x", self.closest(".g-upload-container")).click(function(){
        $(this).closest(".g-uploaded").remove();
    });
};

$gUploader.onSuccess = function(response, self){
    for (var i in response.data) {
        $(".g-uploaded-list", self.closest(".g-upload-container")).html(
            '<div class="progress-box pr g-uploaded">' +
            '    <button class="progress-box__close sprite g-upload-x" type="button"></button>' +
            '    <p class="progress-box__title fs16">' + response.data[i].label + '</p>' +
            '    <input type="hidden" name="' + self.attr('name') + '" value="' + response.data[i].file_name + '" />' +
            '</div>'
        );
    }
};

$gUploader.onError = function(response, self) {
    $(".form-error-files", self.closest(".g-upload-container")).text(response.message);
};

$gUploader.onCustomResponse = function(response, self){
    if (typeof response.message != 'undefined') {
        $(".form-error-files", self.closest(".g-upload-container")).text(response.message);
    } else {
        $(".form-error-files", self.closest(".g-upload-container")).text("Something went wrong");
    }
};

$gUploader.init = function(){
    var uploader = this;
    $(".g-upload").on('change', function(e) {
        var self = $(this);

        uploader.beforeUpload(self);
        self.attr('disabled', 'disabled');
        $(".uploader-loading", self.closest(".g-upload-box")).show();

        var data = new FormData();
        $.each(self[0].files, function(i, file){
            data.append('files['+i+']',  file);
        });

        data.append('conf', self.data('conf'));
        $.ajax({
            data: data,
            url: self.data('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            xhrFields: {
                withCredentials: true
            },
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    myXhr.upload.addEventListener('progress', function(e){
                        $gUploader.progress(e, self);
                    }, false);
                }
                return myXhr;
            },
            beforeSend: function(){
                $(".g-uploaded-list", self.closest(".g-upload-container")).html(
                    '<div class="progress-box pr g-uploaded">' +
                    // '    <button class="progress-box__close sprite g-upload-x" type="button"></button>' +
                    '    <p class="progress-box__title fs16">' + e.target.files[0].name + '</p>' +
                    '    <div class="progress-box__line">' +
                    '        <div class="progress-box__line-inner progress-bar" style="width: 0%;"></div>' +
                    '    </div>' +
                    '</div>'
                );
            },
            success: function (response) {
                $(self).removeAttr('disabled');

                if (response.status == 'OK') {
                    uploader.onSuccess(response, self);
                } else if (response.status == 'INVALID_DATA') {
                    uploader.onError(response, $(self));
                } else {
                    uploader.onCustomResponse(response, self);
                }
                self.val('');
                uploader.onX(self);
                $(".uploader-loading", self.closest(".g-upload-box")).hide();
                uploader.afterUpload(self);
            },
            error: function(response){
                $(self).removeAttr('disabled');
                $(".uploader-loading", self.closest(".g-upload-box")).hide();
                uploader.onCustomResponse(response, self);
            }
        });

        $gUploader.onX(self);
    });
};

$gUploader.progress = function (e, self){

    var self = $(this);
    if(e.lengthComputable){
        var max = e.total;
        var current = e.loaded;

        var percentage = (current * 100) / max;
        $('.g-uploaded-list .progress-box .progress-bar', self.closest(".g-upload-container")).css('width', percentage + '%');
        if (percentage >= 100) {
            $('.g-uploaded-list .progress-box .progress-bar', self.closest(".g-upload-container")).fadeOut().remove();
        }
    }
}

$(document).ready(function(){
    $gUploader.init();
    $('.g-upload').each(function(){
        $gUploader.onX($(this));
    });

});