import $ from 'jquery';
import $gForm from '../gform';
window.jQuery = window.$ = $;

var $passwordReset = $.extend({}, $gForm);
$passwordReset.formId = "password-reset-form";

$(document).ready(function(){
    $passwordReset.init();
});
