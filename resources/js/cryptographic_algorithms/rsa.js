let html = '<div class="container mt-5" style="padding-top: 15vh">\n' +
    '\t\t<h2 class="mb-4">RSA Encryption and Decryption</h2>\n' +
    '\t\t<div class="form-group mt-4">\n' +
    '\t\t\t<label for="message">Enter your message:</label>\n' +
    '\t\t\t<textarea class="form-control" id="message" rows="3"></textarea>\n' +
    '\t\t</div>\n' +
    '\t\t<div class="form-group mt-4">\n' +
    '\t\t\t<label for="public-key">Enter the public key:</label>\n' +
    '\t\t\t<textarea class="form-control" id="public-key" rows="3"></textarea>\n' +
    '\t\t</div>\n' +
    '\t\t<div class="form-group mt-4">\n' +
    '\t\t\t<label for="private-key">Enter the private key:</label>\n' +
    '\t\t\t<textarea class="form-control" id="private-key" rows="3"></textarea>\n' +
    '\t\t</div>\n' +
    '\t\t<div class="form-group mt-4">\n' +
    '\t\t\t<label for="output">Output:</label>\n' +
    '\t\t\t<textarea class="form-control" id="output" rows="3" readonly></textarea>\n' +
    '\t\t</div>\n' +
    '\t\t<button type="button" class="btn btn-primary mt-4" id="encrypt-btn">Encrypt</button>\n' +
    '\t\t<button type="button" class="btn btn-secondary mt-4" id="decrypt-btn">Decrypt</button>\n' +
    '\t</div>' +
    '<script src="https://cdnjs.cloudflare.com/ajax/libs/jsencrypt/3.0.0-rc.1/jsencrypt.min.js"></script>'

$('#main-div').append(html);

function encrypt() {
    var message = document.getElementById("message").value;
    var publicKey = document.getElementById("public-key").value;
    var encrypt = new JSEncrypt();
    encrypt.setPublicKey(publicKey);
    var encryptedMessage = encrypt.encrypt(message);
    document.getElementById("output").value = encryptedMessage;
}

function decrypt() {
    var message = document.getElementById("message").value;
    var privateKey = document.getElementById("private-key").value;
    var decrypt = new JSEncrypt();
    decrypt.setPrivateKey(privateKey);
    var decryptedMessage = decrypt.decrypt(message);
    document.getElementById("output").value = decryptedMessage;
}

document.getElementById("encrypt-btn").addEventListener("click", encrypt);
document.getElementById("decrypt-btn").addEventListener("click", decrypt);
