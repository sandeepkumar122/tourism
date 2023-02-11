var CryptoJSAesJson = {
    stringify: function (cipherParams) {
        var j = {ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64)};
        if (cipherParams.iv) j.iv = cipherParams.iv.toString();
        if (cipherParams.salt) j.s = cipherParams.salt.toString();
        return JSON.stringify(j).replace(/\s/g, '');
    },
    parse: function (jsonStr) {
        var j = JSON.parse(jsonStr);
        var cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Base64.parse(j.ct)});
        if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv);
        if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s);
        return cipherParams;
    }
}

//AES encryption ..
function encrypt(txt){
    var TheSecret = 'Yroa';
    var encrypted = CryptoJS.AES.encrypt(JSON.stringify(txt), TheSecret, {format: CryptoJSAesJson}).toString();
    return encrypted;
}

//AES decryption
function decrypt(txt){
    var decrypted = CryptoJS.AES.decrypt(txt,'Yroa');
    return decrypted.toString(CryptoJS.enc.Utf8);
}


