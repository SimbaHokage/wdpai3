<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);
Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('trainingsToBe', 'ExerciseController');
Routing::get('welcomeScreen', 'DefaultController');
Routing::get('trainingHistory', 'TrainingController');
Routing::get('addTraining', 'TrainingController');
Routing::post('addExercise', 'ExerciseController');
Routing::post('loginFunction', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('addTrainingDatabase', 'TrainingController');

Routing::run($path);
