<?php
if(!function_exists('verificar'))
{
    function verificar($texto, $hash_openssl){
        $hash_bcrypt = openssl_decrypt(base64_decode($hash_openssl), OPENSSL_METHOD, OPENSSL_PASSWORD, OPENSSL_OPCIONES, OPENSSL_IV);
        if (password_verify($texto, $hash_bcrypt)) 
            return TRUE;            
        return FALSE;
    }
}
if(!function_exists('encriptar'))
{
 function encriptar($texto){
        $opciones = [
            'cost' => HASH_COST,
        ];
        $hash_bcrypt = password_hash($texto, PASSWORD_BCRYPT, $opciones);
        $hash_openssl = openssl_encrypt($hash_bcrypt, OPENSSL_METHOD, OPENSSL_PASSWORD, OPENSSL_OPCIONES, OPENSSL_IV);
        return base64_encode($hash_openssl);
 }
}
