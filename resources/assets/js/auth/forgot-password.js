import $ from 'jquery';
import $gForm from '../gform';
window.jQuery = window.$ = $;

var $forgotPasswordForm = $.extend({}, $gForm);
$forgotPasswordForm.formId = "forgot-password-form";

$(document).ready(function(){
    $forgotPasswordForm.init();
});
