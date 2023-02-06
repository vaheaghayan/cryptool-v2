import {encrip} from "../algorithms_logic/vigenere";

$('#cipher-btn').click(function () {
    $('#description').hide();
    $('#algorithm').show();
});

$('#desc-btn').click(function () {

    $('#description').show();
    $('#algorithm').hide();
});


$('#enc-btn').click(function () {

    let plaintext = $('#plaintext');
    let key = $('#key');
    let cipher = $('#ciphertext');
    let encrypted = encrip(plaintext, key, cipher);
});


