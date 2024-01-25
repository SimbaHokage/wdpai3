<?php

require_once 'AppController.php';
class AuthenticationController
{

    private static function isUserLogged() {
        return isset($_COOKIE['loggedUser']);
    }

    public function getDecryptedEmail()
    {
        $encryptionKey = '2w5z8eAF4lLknKmQpSsVvYy3cd9gNjRm';
        $iv = '1234567891011121';

        return openssl_decrypt($_COOKIE['loggedUser'], 'aes-256-cbc', $encryptionKey, 0, $iv);
    }

    public static function checkIsUserLogged() {
        if(!self::isUserLogged()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        } else {
            return true;
        }
    }
}