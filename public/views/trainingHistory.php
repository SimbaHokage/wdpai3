<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style/trainingHistory.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <title>history</title>
</head>

<body>

<div class="container">
    <div class="left-container left-container-disactive">
        <div class="left-first-container">
            <h1 class="title">Trainings to do</h1>

            <? foreach ($trainingsToDo as $trainingToDo) : ?>
                <div class="date-details-div">
                    <?php $thisTraining = $exerciseRepository->getTrainingByTrainingId($trainingToDo->getIdTraining()); ?>
                    <p class="difficult">x</p>
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
                    <p class="difficult">x</p>
                    <p class="date"><?= $training->getDate(); ?> </p>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <script src="/public/js/trainingHistory.js"></script>

</body>

</html>