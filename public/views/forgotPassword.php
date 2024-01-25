<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="public/style/forgotPassword.css">
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
                <h1>Forgot password?</h1>
                <p class="sign-in-info">Enter mail and new password.</p>
                </p>
                <form class="form" action="forgotPassword" method="POST">
                    <div class="message">
                        <?php if(isset($messages)) {
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }?>
                    </div>
                    <p class="email-p">Email</p>
                    <input class="email-input" name="email" type="text" placeholder="Enter your email address">
                    <p class="password-p">Password</p>
                    <input class="password-input" name="password" type="password" placeholder="Enter your password">
                    <p class="password-p">Confirm password</p>
                    <input class="password-input" name="confirmPassword" type="password"
                           placeholder="Confirm your password">
                    <button class="login-button">
                        <p>Send</p>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="phone">
    <div class="right-container">
        <div class="former">

            <div class="a-form">
                <h1>Forgot password?</h1>
                <p class="sign-in-info">Enter mail and new password.</p>
                </p>
                <form>
                    <p class="email-p">Email</p>
                    <input class="email-input" name="email" type="text" placeholder="Enter your email address">
                    <p class="password-p">Password</p>
                    <input class="password-input" name="password" type="password" placeholder="Enter your password">
                    <p class="password-p">Confirm password</p>
                    <input class="password-input" name="password" type="password"
                           placeholder="Confirm your password">
                </form>
                <button class="login-button">
                    <p>Send</p>
                </button>
            </div>
        </div>
    </div>
</div>
</body>

</html>