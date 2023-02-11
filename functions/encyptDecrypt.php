<?php



function encryptString($string)
{
    $output = false;
  
    $encrypt_method = 'AES-256-CBC';                // Default
    $secret_key = 'Some#Random_Key!';               // Change the key!
    $secret_iv = '!IV@_$2';  // Change the init vector!
    
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
    
    return $output;
}

function decryptString($string)
{
    $output = false;
  
    $encrypt_method = 'AES-256-CBC';                // Default
    $secret_key = 'Some#Random_Key!';               // Change the key!
    $secret_iv = '!IV@_$2';  // Change the init vector!
    
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    
    return $output;
}

function decryption($jsonString){
    $passphrase='Yroa';
    $jsondata = json_decode($jsonString,true);
    try {
        $salt = hex2bin($jsondata["s"]);
        $iv  = hex2bin($jsondata["iv"]);
    } catch(Exception $e) { return null; }
    $ct = base64_decode($jsondata["ct"]);
    $concatedPassphrase = $passphrase.$salt;
    $md5 = array();
    $md5[0] = md5($concatedPassphrase, true);
    $result = $md5[0];
    for ($i = 1; $i < 3; $i++) {
        $md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);
        $result .= $md5[$i];
    }
    $key = substr($result, 0, 32);
    $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
    return json_decode($data, true);
}
?>