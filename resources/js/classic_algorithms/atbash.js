import {encrypt} from "../algorithms_logic/atbash";

$('#enc-btn').click(function () {
    let plaintext = $('#plaintext').val();
    let encrypted = encrypt(plaintext);
    $('#cipher-text').val(encrypted);
});




