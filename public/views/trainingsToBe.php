<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainings to be</title>
    <link rel="stylesheet" href="public/style/trainingsToBe.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <button class="add">+</button>
    <div class="container">
        <div class="left-container left-container-disactive">
            <div class="left-first-container">
                <h1 class="title">Trainings to do</h1>

                <div class="date-details-div">
                    <p class="difficult">x</p>
                    <p class="date">Date: dd/mm/yyyy</p>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>

                <div class="date-details-div">
                    <p class="difficult">x</p>
                    <p class="date">Date: dd/mm/yyyy</p>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>
                <div class="date-details-div">
                    <p class="difficult">x</p>
                    <p class="date">Date: dd/mm/yyyy</p>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>
                <div class="date-details-div">
                    <p class="difficult">x</p>
                    <p class="date">Date: dd/mm/yyyy</p>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>
                <div class="date-details-div">
                    <p class="difficult">x</p>
                    <p class="date">Date: dd/mm/yyyy</p>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>
            </div>
            <div class="left-first-container">
                <h1 class="title">Done</h1>

                <div class="date-details-div">
                    <p class="difficult">x</p>
                    <p class="date">Date: dd/mm/yyyy</p>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>

                <div class="date-details-div">
                    <p class="difficult">x</p>
                    <p class="date">Date: dd/mm/yyyy</p>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>
                <div class="date-details-div">
                    <p class="difficult">x</p>
                    <p class="date">Date: dd/mm/yyyy</p>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>
                <div class="date-details-div">
                    <p class="difficult">x</p>
                    <p class="date">Date: dd/mm/yyyy</p>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>
                <div class="date-details-div">
                    <p class="difficult">x</p>
                    <p class="date">Date: dd/mm/yyyy</p>
                    <button class="details">Details</button>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="right-container">
            <div class="element-of-right-container">
                <ul class="list"></ul>
            </div>
            <div class="element-of-right-container">
                <h1 class="title">Add Exercise</h1>
                <!-- <form class="add-exercise-form" action="addExercise" method="POST"> -->
                    <p class="alert"></p>
                    <div class="add-exercise-div">
                        <p class="parameter-p">Exercise</p>
                        <p class="difficult">x</p>
                        <input type="text" placeholder="Enter name of exercise." class="input-parameters name-of-exercise-input inputs">
                        <div class="line"></div>
                    </div>
                    <div class="add-exercise-div">
                        <p class="parameter-p">Reps</p>
                        <p class="difficult">x</p>
                        <input type="text" placeholder="Enter number of reps." class="input-parameters reps-input inputs">
                        <div class="line"></div>
                    </div>
                    <div class="add-exercise-div">
                        <p class="parameter-p">Sets</p>
                        <p class="difficult">x</p>
                        <input type="text" placeholder="Enter number of sets" class="input-parameters sets-input inputs">
                        <div class="line"></div>
                    </div>
                    <div class="add-exercise-div">
                        <p class="parameter-p">RPE</p>
                        <p class="difficult">x</p>
                        <input type="text" placeholder="Enter RPE (1-10)" class="input-parameters rpe-input inputs">
                        <div class="line"></div>
                    </div>
                    <button class="add-exercise" type="submit">Add</button>
                <!-- </form> -->
            </div>
        </div>
    </div>

    <script src="public/js/trainingsToBeScript.js"></script>
</body>

</html>