import $ from 'jquery';
window.jQuery = window.$ = $;

var $csrfToken = '';
var $gForm = {};

$gForm.gLocked = false;
$gForm.formId = "form-data";
$gForm.errorsScope = null;

$gForm.onSuccess = function(response){
    if (response.data && typeof response.data.redirect_url != 'undefined') {
        window.location.href = response.data.redirect_url;
    }
};

$gForm.onError = function(response){
    console.log(response.errors)
    this.showErrors(response.errors);
};

$gForm.preventSubmit = false;
$gForm.beforeSubmit = function(){};

$gForm.putCsrfToken = function(){
    var self = this;
    if ($csrfToken == '') {
        $.ajax({
            type: 'GET',
            url: $apiUrl+'csrf-token',
            dataType: 'json',
            async: false,
            xhrFields: {
                withCredentials: true
            },
            success: function(response){
                if (response.status == "OK") {
                    $csrfToken = response.data;
                    $("#"+self.formId+" input[name='_token']").val($csrfToken);
                }
            }
        });
    } else {
        $("#"+self.formId+" input[name='_token']").val($csrfToken);
    }
};

$gForm.init = function(){
    var self = this;
    if (self.errorsScope == null) {
        self.errorsScope = $("#" + self.formId);
    }

    self.putCsrfToken();

    $("#"+self.formId).off().on('submit', function(){

        self.beforeSubmit();
        if (self.preventSubmit) {
            return false;
        }

        if (self.gLocked) {
            return false;
        }
        self.gLocked = true;
        self.disableForm();

        var method = $("#"+self.formId).attr('method');
        method = (typeof method == 'undefined') ? 'post' : method;
        $.ajax({
            url: $("#"+self.formId).attr('action'),
            type: method,
            data: $("#"+self.formId).serialize(),
            dataType: 'json',
            xhrFields: {
                withCredentials: true
            },
            success: function(response){
                if (!response.data || typeof response.data.redirect_url == 'undefined') {
                    self.enableForm();
                }
                if(response.status == 'OK'){
                    self.showErrors([]);
                    self.onSuccess(response);
                } else if(response.status == 'INVALID_DATA'){
                    self.onError(response);
                } else if (response.status == "RECAPTCHA_ERROR"){
                    $('.modal-title').html(response.modal.status);
                    $('.modal-body').html(response.modal.message);
                    $('#modal-alert').modal('show');
                } else {
                    self.showErrors([]);
                    self.processResponse(response);
                }
                self.gLocked = false;
            },
            error: function(response){
                var responseJson = response.responseJSON

                if(response.status == 'INVALID_DATA'){
                    self.onError(responseJson);
                } else {
                    // self.processResponse(responseJson);
                    // self.onError(responseJson);
                }
                self.enableForm();
                self.gLocked = false;
            }
        });
        return false;
    });

    $("#"+self.formId+" input").on("focus", self.cleanError);
    $("#"+self.formId+" select").on( "selectmenufocus", self.cleanError);
    $("#"+self.formId+" textarea").on( "focus", self.cleanError);
};

$gForm.cleanError =  function(){
    $(this).closest(".form-error").removeClass("form-error");
    $(".form-error-text", $(this).closest(".form-box")).hide().html('');
};

$gForm.showErrors = function(errors){
    $(".form-error-text", this.errorsScope).hide().html('');
    $(".form-box", this.errorsScope).removeClass('form-error');
    for(var i in errors){
        $(".form-error-" + i, this.errorsScope).html(errors[i]).fadeIn();
        $(".form-error-" + i, this.errorsScope).closest('.form-box').addClass('form-error');
    }
};

$gForm.processResponse = function(response){
    if (typeof response.redirect_url != 'undefined') {
        $("#action-error-modal").on('hidden.bs.modal', function(){
            window.location.href = response.redirect_url;
        });
    }
    var msg = '';

    if (typeof response.message != 'undefined') {
        msg = response.message;
    } else if (response.data) {
        if (typeof response.data.message != "undefined") {
            msg = response.data.message;
        }
    }
    $("#action-error-modal .modal__box-text").html(msg);
};

$gForm.enableForm = function(){
    var self = this;
    $(".submit-btn", $("#" + self.formId)).removeAttr('disabled').removeClass('loading');
};

$gForm.disableForm = function(){
    var self = this;
    $(".submit-btn", $("#" + self.formId)).attr('disabled', 'disabled').addClass('loading');
};

export default $gForm;
