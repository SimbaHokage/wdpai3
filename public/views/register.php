<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="public/style/register.css">
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
            <div class="former">

                <div class="a-form">
                    <p class="welcome">Welcome!</p>
                    <h1>Sign up</h1>
                    <p class="sign-in-info">if you already have an account</p>
                    <p class="sign-in-info sign-in-info-second">you can <span class="register-span">login here!</span>
                    </p>
                    <form class="register" action="register" method="POST">
                        <div class="message">
                            <?php if(isset($messages)) {
                                foreach ($messages as $message) {
                                    echo $message;
                                }
                            }?>
                        </div>
                        <p class="email-p">Email</p>
                        <input class="email-input" name="email" type="text" placeholder="Enter your email address">
                        <p class="username-p">Username</p>
                        <input class="username-input" name="username" type="text" placeholder="Enter your username">
                        <p class="password-p">Password</p>
                        <input class="password-input" name="password" type="password" placeholder="Enter your password">
                        <p class="password-p">Confirm password</p>
                        <input class="password-input" name="confirmPassword" type="password"
                            placeholder="Confirm your password">
                        <button class="login-button" type="submit">
                            <p>Register</p>
                        </button>
                    </form>
<!--                    <button class="login-button">-->
<!--                        <p>Register</p>-->
<!--                    </button>-->
                    <p class="sign-in-info forgot-password">If you have an account <span
                            class="register-span forgot-password">login here</span></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>