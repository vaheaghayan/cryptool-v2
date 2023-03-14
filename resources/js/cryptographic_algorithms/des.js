let html = '' +
    '<div class="container my-4" style="padding-top: 15vh">\n' +
    '      <h1 class="mt-4">DES Encryption</h1>\n' +
    '      <div class="form-group mt-4">\n' +
    '        <label for="input-text">Input Text:</label>\n' +
    '        <textarea class="form-control" id="input-text" rows="3"></textarea>\n' +
    '      </div>\n' +
    '      <div class="form-group mt-4">\n' +
    '        <label for="key">Key:</label>\n' +
    '        <input type="text" class="form-control" id="key" placeholder="Enter key" value="0123456789ABCDEF">\n' +
    '      </div>\n' +
    '      <div class="form-check mt-4">\n' +
    '        <input class="form-check-input" type="radio" name="operation" id="encrypt-radio" value="encrypt" checked>\n' +
    '        <label class="form-check-label" for="encrypt-radio">\n' +
    '          Encrypt\n' +
    '        </label>\n' +
    '      </div>\n' +
    '      <div class="form-check">\n' +
    '        <input class="form-check-input" type="radio" name="operation" id="decrypt-radio" value="decrypt">\n' +
    '        <label class="form-check-label" for="decrypt-radio">\n' +
    '          Decrypt\n' +
    '        </label>\n' +
    '      </div>\n' +
    '      <div class="form-group mt-4">\n' +
    '        <label for="output-text">Output Text:</label>\n' +
    '        <textarea class="form-control" id="output-text" rows="3" readonly></textarea>\n' +
    '      </div>\n' +
    '      <button type="button" class="btn btn-primary mt-4" id="calculate-btn">Calculate</button>\n' +
    '    </div>' +
    '<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>'

$('#main-div').append(html);

$(document).ready(function() {
    $('#calculate-btn').click(function() {
        const inputText = $('#input-text').val();
        const key = CryptoJS.enc.Hex.parse($('#key').val());
        const operation = $('input[name=operation]:checked').val();
        let outputText;
        if (operation === 'encrypt') {
            outputText = CryptoJS.DES.encrypt(inputText, key, {
                mode: CryptoJS.mode.ECB,
                padding: CryptoJS.pad.Pkcs7
            }).toString();
        } else {
            outputText = CryptoJS.DES.decrypt(inputText, key, {
                mode: CryptoJS.mode.ECB,
                padding: CryptoJS.pad.Pkcs7
            }).toString(CryptoJS.enc.Utf8);
        }
        $('#output-text').val(outputText);
    });
});
