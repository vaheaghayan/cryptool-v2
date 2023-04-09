import $ from 'jquery';
import $gForm from '../gform';
window.jQuery = window.$ = $;

var $loginForm = $.extend({}, $gForm);
$loginForm.formId = "login-form";

$(document).ready(function(){
    $loginForm.init();
});
