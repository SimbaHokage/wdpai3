<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);
Routing::get('login', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('trainingsToBe', 'DefaultController');
Routing::get('welcomeScreen', 'DefaultController');
Routing::post('login', 'SecurityController');

Routing::run($path);
