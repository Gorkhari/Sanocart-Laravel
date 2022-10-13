<html>

<head>
    <script src="JS/script.js">
    </script>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="admin-login-form">
        <form class="form-container" action="admin/admin_login.php" method="post">
            <h1>Login</h1>

            <label for="username"><b>UserName</b></label>
            <input type="text" placeholder="Enter Username" value="" name="username" id="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" value="" name="password" placeholder="Password" id="password" required>

            <button class="btn" type="submit" value="submit">Login</button>

        </form>
    </div>
</body>

</html>