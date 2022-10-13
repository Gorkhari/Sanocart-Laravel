<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/login-signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>
<bodyreg>
    <div class="main_div_box">
        <div class="title">Login Form</div>
        <form action="login.php" method="post">
            <div class="input_box">
                <input type="text" placeholder="Enter Username" value="" name="username" id="username" required>
                <div class="icon"><i class="fas fa-user"></i></div>
            </div>
            <div class="input_box">
                <input type="password" value="" name="password" placeholder="Password" id="password" required>
                <div class="icon"><i class="fas fa-lock"></i></div>
            </div>
            <div class="option_div">
                <div class="check_box">
                    <input type="checkbox">
                    <span>Remember me</span>
                </div>
                <div class="forget_div">
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <div class="input_box button">
                <input type="submit" value="Login">
            </div>
            <div class="sign_up">
                Not a member? <a href="registration-form.php">Signup now</a>
            </div>
        </form>
    </div>

    </body>

</html>