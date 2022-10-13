<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="CSS/login-signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>
<bodyreg>
    <div class="containerreg">
        <div class="title">Registration</div>
        <div class="content">
            <form action="signup.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" placeholder="Enter Fullname" value="" name="fullname" id="fullname" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter Username" value="" name="username" id="username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" name="email" placeholder="email" id="email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" value="" name="password" placeholder="Password" id="password" required>
                    </div>

                </div>

        </div>
        <div class="login-reg">
            Already a member? <a href="registration-form-login.php">Login now</a>
        </div>
        <div class="input_box button">
            <input type="submit" value="Register">
        </div>
        </form>
    </div>
    </div>

    </body>

</html>