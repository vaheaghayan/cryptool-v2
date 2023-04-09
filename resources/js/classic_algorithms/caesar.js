let html = '<div class="container my-4" style="padding-top: 15vh">\n' +
    '      <h1>Caesar Cipher</h1>\n' +
    '      <div class="form-group mt-4">\n' +
    '        <label for="input-text">Input Text:</label>\n' +
    '        <textarea class="form-control" id="input-text" rows="3"></textarea>\n' +
    '      </div>\n' +
    '      <div class="form-group mt-4">\n' +
    '        <label for="key">Key:</label>\n' +
    '        <input type="number" class="form-control" id="key" placeholder="Enter key" value="3">\n' +
    '      </div>\n' +
    '      <div class="form-check mt-4">\n' +
    '        <input class="form-check-input" type="radio" name="operation" id="encrypt-radio" value="encrypt" checked>\n' +
    '        <label class="form-check-label" for="encrypt-radio">\n' +
    '          Encrypt\n' +
    '        </label>\n' +
    '      </div>\n' +
    '      <div class="form-check mt-4">\n' +
    '        <input class="form-check-input" type="radio" name="operation" id="decrypt-radio" value="decrypt">\n' +
    '        <label class="form-check-label" for="decrypt-radio">\n' +
    '          Decrypt\n' +
    '        </label>\n' +
    '      </div>\n' +
    '      <div class="form-group mt-4">\n' +
    '        <label for="output-text">Output Text:</label>\n' +
    '        <textarea class="form-control" id="output-text" rows="3" readonly></textarea>\n' +
    '      </div>\n' +
    '      <button type="button" class="btn btn-primary" id="calculate-btn">Calculate</button>\n' +
    '    </div>';

$('#main-div').append(html);

function encrypt(text, key) {
    let result = '';
    for (let i = 0; i < text.length; i++) {
        let charCode = text.charCodeAt(i);
        if (charCode >= 65 && charCode <= 90) {
            result += String.fromCharCode((charCode - 65 + key) % 26 + 65);
        } else if (charCode >= 97 && charCode <= 122) {
            result += String.fromCharCode((charCode - 97 + key) % 26 + 97);
        } else {
            result += text.charAt(i);
        }
    }
    return result;
}

function decrypt(text, key) {
    return encrypt(text, 26 - key);
}

$(document).ready(function() {
    $('#calculate-btn').click(function() {
        const inputText = $('#input-text').val();
        const key = parseInt($('#key').val());
        const operation = $('input[name=operation]:checked').val();
        let outputText;
        if (operation === 'encrypt') {
            outputText = encrypt(inputText, key);
        } else {
            outputText = decrypt(inputText, key);
        }
        $('#output-text').val(outputText);
    });
});
