<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style/addTraining.css">
    <title>Document</title>
</head>
<body>


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


</body>
</html>