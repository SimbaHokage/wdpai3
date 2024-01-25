<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="public/style/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="left-container">

    </div>
    <div class="line"></div>
    <div class="right-container">
        <div class="a-form">
            <h1>Sign in</h1>
            <p class="sign-in-info">if you don't have an account register.</p>
            <p class="sign-in-info sign-in-info-second">You can <span class="register-span">Register here!</span></p>
            <form class="form" action="loginFunction" method="POST">
                <div class="message">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }?>
                </div>
                <p class="email-p">Email</p>
                <input class="email-input" name="email" type="text" placeholder="email@gmail.com">
                <p class="password-p">Password</p>
                <input class="password-input" name="password" type="password" placeholder="password">
                <button class="login-button" type="submit">
                    <p>Login</p>
                </button>
            </form>
            <p class="sign-in-info forgot-password">Forgot password? <span class="register-span forgot-password">Click here</span></p>
        </div>
    </div>
</div>

<div class="phone">
    <div class="right-container">
        <div class="a-form">
            <h1>Sign in</h1>
            <p class="sign-in-info">if you don't have an account register.</p>
            <p class="sign-in-info sign-in-info-second">You can <span class="register-span">Register here!</span></p>
            <form class="form" action="loginFunction" method="POST">
                <div class="message">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }?>
                </div>
                <p class="email-p">Email</p>
                <input class="email-input" name="email" type="text" placeholder="email@gmail.com">
                <p class="password-p">Password</p>
                <input class="password-input" name="password" type="password" placeholder="password">
                <button class="login-button" type="submit">
                    <p>Login</p>
                </button>
            </form>
            <p class="sign-in-info forgot-password">Forgot password? <span class="register-span forgot-password">Click here</span></p>
        </div>
    </div>
</div>

</body>
</html>