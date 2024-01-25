<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style/hamburger.css">
    <link rel="stylesheet" href="public/style/hambMenu.css">
    <link rel="stylesheet" href="public/style/trainingHistory.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <title>history</title>
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

<div class="container">
    <div class="left-container">
        <div class="left-first-container">
            <h1 class="title">Trainings to do</h1>

            <? foreach ($trainingsToDo as $trainingToDo) : ?>
                <div class="date-details-div">
                    <?php $thisTraining = $exerciseRepository->getTrainingByTrainingId($trainingToDo->getIdTraining()); ?>
                    <button class="difficult">x</button>
                    <p class="date"><?= $trainingToDo->getDate(); ?> </p>
                    <div class="activated off">
                        <? foreach($thisTraining as $thisT) : ?>
                            <p class="date"><?= $thisT->getName(); ?> <?= $thisT->getSets(); ?> x <?= $thisT->getReps() ?> RPE: <?= $thisT->getRPE() ?></p>
                        <?php endforeach; ?>
                    </div>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="left-first-container">
            <h1 class="title">Done</h1>

            <? foreach ($trainings as $training) : ?>
                <div class="date-details-div">
                    <?php $thisTraining = $exerciseRepository->getTrainingByTrainingId($training->getIdTraining()); ?>
                    <button class="difficult">x</button>
                    <p class="date"><?= $training->getDate(); ?> </p>
                    <div class="activated off">
                        <? foreach($thisTraining as $thisT) : ?>
                            <p class="date"><?= $thisT->getName(); ?> <?= $thisT->getSets(); ?> x <?= $thisT->getReps() ?> RPE: <?= $thisT->getRPE() ?></p>
                        <?php endforeach; ?>
                    </div>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <script src="/public/js/trainingHistory.js"></script>
    <script src="/public/js/hamburger.js"></script>

</body>

</html>