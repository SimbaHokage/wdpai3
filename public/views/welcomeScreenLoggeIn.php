<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcomeScreen</title>
    <link rel="stylesheet" href="public/style/hambMenu.css">
    <link rel="stylesheet" href="public/style/welcomeScreen.css">
    <link rel="stylesheet" href="public/style/hamburger.css">
</head>

<body>

<div class="header">
    <button class="hamburger hamburger--emphatic" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
    </button>
</div>

<header class="phone">
    <div class="img-phone">
        <div class="text">
            <h1>Work hard</h1>
            <p>Win easier</p>
        </div>
    </div>
    <div class="links">
        <a href="addTraining" class="link style-link">Dodaj trening</a>
        <a href="trainingHistory" class="link style-link">Historia treningów</a>
        <form class="form" action="logout" method="POST">
            <button class="logout-button">Wyloguj się</button>
        </form>
    </div>
</header>

<header class="img">
    <nav class="nav nav-desktop">
        <a href="addTraining" class="link style-link">dodaj trening!</a>
        <a href="trainingHistory" class="link style-link">historia treningów</a>
        <form class="form" action="logout" method="POST">
            <button class="logout-button">Wyloguj się</button>
        </form>
    </nav>
    <div class="text">
        <h1>Have I not commanded you?</h1>
        <p>Be strong and courageous. Do not be afraid; do not be discouraged, for the Lord your God will be with you
            wherever you go. Jz 1:9</p>
    </div>
    <div class="shadow"></div>
</header>

<script src="public/js/hamburger.js"></script>
</body>

</html>