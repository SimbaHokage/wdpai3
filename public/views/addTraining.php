<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style/addTraining.css">
    <link rel="stylesheet" href="public/style/hamburger.css">
    <title>Document</title>
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
        </div>
    </div>
    <div class="links">
        <a href="welcomeScreenLoggeIn" class="link style-link">Widok startowy</a>
        <a href="trainingHistory" class="link style-link">Historia treningów</a>
        <form class="form" action="logout" method="POST">
            <button class="logout-button">Wyloguj się</button>
        </form>
    </div>
</header>


<nav class="nav nav-desktop">
    <a href="welcomeScreenLoggeIn" class="link style-link">Widok startowy</a>
    <a href="trainingHistory" class="link style-link">Historia treningów</a>
    <form class="form" action="logout" method="POST">
        <button class="logout-button">Wyloguj się</button>
    </form>
</nav>


<div class="add-training-form">
    <h1>Add training</h1>
    <form action="addTrainingDatabase" method="POST">
        <p class="alert"></p>
        <div class="add-training-div">
            <p class="enter-date">Date</p>
            <label>
                <input type="date" name="training" placeholder="(dd/mm/yyyy)" class="date-input">
            </label>
        </div>
        <button class="add-training-button">submit</button>
    </form>
</div>

<script src="public/js/addTraining.js"></script>
</body>
</html>