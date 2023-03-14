
export function encrypt(plaintext, key) {
    const alphabet = "abcdefghijklmnopqrstuvwxyz";
    let ciphertext = "";
    let j = 0;

    for (let i = 0; i < plaintext.length; i++) {
        const plainChar = plaintext[i];
        const keyChar = key[j % key.length];

        if (alphabet.includes(plainChar.toLowerCase())) {
            const plainIndex = alphabet.indexOf(plainChar.toLowerCase());
            const keyIndex = alphabet.indexOf(keyChar.toLowerCase());
            const encryptedIndex = (plainIndex + keyIndex) % 26;
            const encryptedChar = alphabet[encryptedIndex];

            if (plainChar === plainChar.toUpperCase()) {
                ciphertext += encryptedChar.toUpperCase();
            } else {
                ciphertext += encryptedChar;
            }

            j++;
        } else {
            ciphertext += plainChar;
        }
    }

    return ciphertext;
}

export function decrypt(ciphertext, key) {
    const alphabet = "abcdefghijklmnopqrstuvwxyz";
    let plaintext = "";
    let j = 0;

    for (let i = 0; i < ciphertext.length; i++) {
        const cipherChar = ciphertext[i];
        const keyChar = key[j % key.length];

        if (alphabet.includes(cipherChar.toLowerCase())) {
            const cipherIndex = alphabet.indexOf(cipherChar.toLowerCase());
            const keyIndex = alphabet.indexOf(keyChar.toLowerCase());
            const decryptedIndex = (cipherIndex - keyIndex + 26) % 26;
            const decryptedChar = alphabet[decryptedIndex];

            if (cipherChar === cipherChar.toUpperCase()) {
                plaintext += decryptedChar.toUpperCase();
            } else {
                plaintext += decryptedChar;
            }

            j++;
        } else {
            plaintext += cipherChar;
        }
    }

    return plaintext;
}



