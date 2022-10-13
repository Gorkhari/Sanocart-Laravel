<?php
include ('call/cart_count.php');
?>
<?php
function linkmain() {
    echo "//kapada.smartindoors.com.au/";
}
?>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/script.js">
    </script>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapada</title>
    
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
        <div class="Login_bar"> <a href= "<?php linkmain() ?>profile.php"><i class='fas fa-user-circle' style='font-size:35px;'></i></a>
        </div>
        <div class="cart"><a href="<?php linkmain() ?>cart_page.php"><br />
                <i class="fa" style="font-size:24px">&#xf07a;</i>
                <span class='badge badge-warning' id='lblCartCount'><?php echo $row_Products['count'];?></span>
            </a></div>
    </div>
</div>
<?php include("headers/nav-header-bar.php"); ?>
</div>

</html>
</div>
