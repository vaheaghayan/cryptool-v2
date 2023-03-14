let html = '' +
    '<div style="width: 70%; margin:auto; padding-top: 200px">' +
        '<h1 style="text-align: center; margin-bottom: 50px">Atbash</h1>' +
        '<div id="algorithm">' +
            '<div class="form-group mt-3"><label for="plaintext">Plaintext</label>' +
                '<textarea id="plaintext" class="form-control" rows="4" spellCheck="false">'+
    'The quick brown fox jumps over the lazy dog.</textarea>' +
            '</div>' +

            '<div class="row">' +
                '<div id="direction" class="w-100 text-center ">' +
                    '<svg id="enc-btn" role="button" viewBox="0 0 50 50" width="50" height="50">' +
                        '<polyline points="0,20 15,20 15,0 35,0 35,20 50,20 25,50"></polyline>' +
                    '</svg>' +
                '</div>' +
            '</div>' +

            '<div class="form-group ml-auto mr-auto"><label for="ciphertext">Encrypted text</label>' +
                '<textarea id="cipher-text" class="form-control" rows="4" spellCheck="false"> </textarea>' +
            '</div>' +
        '</div>' +
    '</div>';

$('#main-div').append(html);

import {encrypt} from "../algorithms_logic/atbash";

$('#enc-btn').click(function () {
    let plaintext = $('#plaintext').val();
    let encrypted = encrypt(plaintext);
    $('#cipher-text').val(encrypted);
});




