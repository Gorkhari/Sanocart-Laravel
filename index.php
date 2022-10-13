<?php
include('config.php');
?>
<?php
if (!isset($_SESSION)) {
  session_start();
   if (!isset($_SESSION['loggedin'])) {
        header('Location: registration-form-login.php');
        exit;
    }
}
?>

<?php
  include('main_header.php');
?>
<head>
    <link href="CSS/style.css" rel="stylesheet" type="text/css">
    </head>
</head>
<div class="main-body-container">
    <div class="main-wide-container">

        <!--Slider - start-->
        <div class="Silde-container">
            <img class="mySlides" src="Images/17.jpg">
            <img class="mySlides" src="Images/12.jpg">
            <img class="mySlides" src="Images/bot_1.jpg">
            <img class="mySlides" src="Images/16.jpg">
        </div>
        <div class="New Products">
            <H1 class="Heading1_for_main">
                <Text>New Products</Text>
            </H1>
            <?php
            include("Reccently_added_items.php");
            ?>
        </div>
    </div>
</div>
<?php
include('footers/footer.php');
?>

</head>

</body>

</html>


<!--Slider - end -->
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>