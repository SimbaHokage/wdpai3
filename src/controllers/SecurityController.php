<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    public function loginFunction()
    {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            $user = $userRepository->getUser($email);
        } catch (NotFoundException $exception) {
            return $this->render('login', ['messages' => ['User with this email not exist.']]);
        }

//        if($user->getEmail() !== $email) {
//            return $this->render('login', ['messages' => ['User with this email not exist.']]);
//        }

//        if($user->getPassword() !== $password) {
//            return $this->render('login', ['messages' => ['Wrong password!']]);
//        }

        if(!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        $this->setCookie($email);
//        return $this->render('welcomeScreen'); xxxxxxxxxxxxxxxxxxx
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/welcomeScreen");
    }

    public function register() {

        if(!$this->isPost()) {
            $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $confirmPassword = $_POST['confirmPassword'];

        if($confirmPassword !== $password) {
            return $this->render('register', ['messages' => ['Difference between passwords.']]);
        }

        $user = new UserRepository();

        $user->addUser($email, $username, $password);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function logout() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->removeCookie();

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        } else {
            http_response_code(405);
            echo 'Invalid operation';
        }
    }

    private function setCookie(string $email) {
        $encryptionKey = '2w5z8eAF4lLknKmQpSsVvYy3cd9gNjRm';
        $iv = '1234567891011121';
        $cipher = "aes-256-cbc";
        $expire = time() + (60 * 60 * 24);
        $encryptedData = openssl_encrypt($email, $cipher, $encryptionKey, 0, $iv);
        setcookie('loggedUser', $encryptedData, $expire, '/', '', true, true);
    }

    private function removeCookie() {
        setcookie('loggedUser', '', time() - 3600, '/');
    }
}