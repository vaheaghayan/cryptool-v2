let html = '' +
    '<div class="container" style="padding-top: 15vh">\n' +
    '\t\t<h1 class="text-center">MD5 Hash Generator</h1>\n' +
    '\t\t<form>\n' +
    '\t\t\t<div class="form-group mt-4">\n' +
    '\t\t\t\t<label for="message">Enter a message:</label>\n' +
    '\t\t\t\t<input type="text" class="form-control" id="message" placeholder="Enter message">\n' +
    '\t\t\t</div>\n' +
    '\t\t\t<button type="button" class="btn btn-primary mt-5" id="generate-btn">Generate Hash</button>\n' +
    '\t\t</form>\n' +
    '\t\t<div class="form-group mt-5">\n' +
    '\t\t\t<label for="hash">MD5 Hash:</label>\n' +
    '\t\t\t<input type="text" class="form-control" id="hash" readonly>\n' +
    '\t\t</div>\n' +
    '\t</div>\n'+
    '<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>'


$('#main-div').append(html);

function generateHash() {
    var message = $('#message').val();
    var hash = CryptoJS.MD5(message).toString(CryptoJS.enc.Hex);
    $('#hash').val(hash);
}

$('#generate-btn').click(function (){
   generateHash();
});
