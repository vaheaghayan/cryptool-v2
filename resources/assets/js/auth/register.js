import $ from 'jquery';
import $gForm from '../gform';
window.jQuery = window.$ = $;

var $registerForm = $.extend({}, $gForm);
$registerForm.formId = "register-form";

$(document).ready(function(){
    $registerForm.init();
});
