let html = '<div class="container " style="padding-top: 20vh">\n' +
    '      <h1 ">Vigenère Cipher</h1>\n' +
    '      \n' +
    '      <form id="form">\n' +
    '        <div class="form-group mt-4">\n' +
    '          <label for="text">Text:</label>\n' +
    '          <input type="text" class="form-control" id="text" placeholder="Enter text">\n' +
    '        </div>\n' +
    '        <div class="form-group mt-4">\n' +
    '          <label for="key">Key:</label>\n' +
    '          <input type="text" class="form-control" id="key" placeholder="Enter key">\n' +
    '        </div>\n' +
    '        <div class="form-group mt-4">\n' +
    '          <div class="form-check form-check-inline">\n' +
    '            <input class="form-check-input" type="radio" name="mode" id="encrypt-radio" value="encrypt" checked>\n' +
    '            <label class="form-check-label" for="encrypt-radio">Encrypt</label>\n' +
    '          </div>\n' +
    '          <div class="form-check form-check-inline">\n' +
    '            <input class="form-check-input" type="radio" name="mode" id="decrypt-radio" value="decrypt">\n' +
    '            <label class="form-check-label" for="decrypt-radio">Decrypt</label>\n' +
    '          </div>\n' +
    '        </div>\n' +
    '        <button type="button" id="calculate-btn" class="btn btn-primary mt-4 " >Calculate</button>\n' +
    '      </form>\n' +
    '\n' +
    '        <div class="form-group mt-4">\n' +
    '          <input type="text" class="form-control" id="result" placeholder="Result">\n' +
    '        </div>\n' +
    '    </div>'

$('#main-div').append(html);


import {encrypt, decrypt} from "../algorithms_logic/vigenere";




$('#calculate-btn').click(function () {
    const text = $("#text").val();
    const key = $("#key").val();
    let mode = $('input[name=mode]:checked').val();
    let result;

    if (mode === "encrypt") {
        result = encrypt(text, key);
    } else {
        result = decrypt(text, key)
    }

    $("#result").val(result);
})



