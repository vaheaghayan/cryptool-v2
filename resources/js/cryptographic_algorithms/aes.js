let html = '<div class="container mt-5"  style="padding-top: 15vh">\n' +
    '\t\t<h2 class="mb-4 mt-5">AES Encryption and Decryption</h2>\n' +
    '\t\t<div class="form-group">\n' +
    '\t\t\t<label for="message">Enter your message:</label>\n' +
    '\t\t\t<textarea class="form-control" id="message" rows="3"></textarea>\n' +
    '\t\t</div>\n' +
    '\t\t<div class="form-group mt-5">\n' +
    '\t\t\t<label for="key">Enter your secret key:</label>\n' +
    '\t\t\t<input type="text" class="form-control" id="key">\n' +
    '\t\t</div>\n' +
    '\t\t<div class="form-group mt-5">\n' +
    '\t\t\t<label for="output">Output:</label>\n' +
    '\t\t\t<textarea class="form-control" id="output" rows="3" readonly></textarea>\n' +
    '\t\t</div>\n' +
    '\t\t<button type="button" class="btn btn-primary mt-5" id="encrypt-btn">Encrypt</button>\n' +
    '\t\t<button type="button" class="btn btn-secondary mt-5" id="decrypt-btn">Decrypt</button>\n' +
    '\t</div>';

$('#main-div').append(html);

