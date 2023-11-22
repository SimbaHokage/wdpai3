<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function login() {
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }

    public function trainingsToBe() {
        $this->render('trainingsToBe');
    }

    public function welcomeScreen() {
        $this->render('welcomeScreen');
    }
}