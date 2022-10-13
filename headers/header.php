<?php

if (isset($_SESSION['loggedin'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/kapada/call/cart_count.php';
} else {
}

?>
<html lang="en">

<head>
    <script src="../JS/script.js">
    </script>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapada
    </title>
</head>
<div class="main-wide-container">
    <div class="header">
        <div class="left-right-header">
            <div class="left-side-header">
                <a href="index.php">
                    <div class="logo">
                        <div class="logo-container">
                            <img src="Images/kapada.jpg" class="w3-circle">
                </a>
            </div>
        </div>
    </div>
    <div class="search">
        <div class="search-header">
            <form action="search.php" method="GET">
                <input type="text" name="query" />
                <input type="submit" value="Search" />
            </form>
        </div>
    </div>
    <div class="right-side-header">
        <div class="Login_bar" type="button" onclick="openForm()">Login</div>
        <div class="Signup_bar" type="button" onclick="signupForm()">Sign Up</div>
        <div class="cart"><a href="../cart_page.php">
                <i class="fa" style="font-size:24px">&#xf07a;</i>
                <span class='badge badge-warning' id='lblCartCount'>
                    <?php
                    echo $row_Products["count"] ?? "";
                    ?> </span>
            </a></div>
    </div>
</div>
<?php include("nav-header-bar.php"); ?>
</div>


<div class="form-popup" id="myForm">
    <form class="form-container" action="login.php" method="post">
        <h1>Login</h1>

        <label for="username"><b>UserName</b></label>
        <input type="text" placeholder="Enter Username" value="" name="username" id="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" value="" name="password" placeholder="Password" id="password" required>

        <button class="btn" type="submit" value="submit">Login</button>
        <button type="button" class="btn cancel" onclick="closethisForm()">Close</button>
    </form>
</div>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closethisForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
<!-- Sign_up form-->
<div class="form-popup" id="signupForm">
    <form class="form-container" action="signup.php" method="post">
        <h1>Login</h1>
        <label for="username"><b>FullName</b></label>
        <input type="text" placeholder="Enter Fullname" value="" name="fullname" id="fullname" required>

        <label for="email"><b>Email</b></label>
        <input type="text" name="email" placeholder="email" id="email" required>


        <label for="username"><b>UserName</b></label>
        <input type="text" placeholder="Enter Username" value="" name="username" id="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" value="" name="password" placeholder="Password" id="password" required>

        <button class="btn" type="submit" value="submit">SignUp</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>

<script>
    function signupForm() {
        document.getElementById("signupForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("signupForm").style.display = "none";
    }
</script>

</html>
</div>