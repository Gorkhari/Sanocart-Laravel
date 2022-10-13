<?php 
include('../config.php');
?>

<head>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a5ff85;" >
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Shop By Categories
        </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php
mysqli_select_db($con, 'temp');
$query_category_nav = "SELECT * FROM categories WHERE Active = 'Yes'";
$category_nav = mysqli_query($con, $query_category_nav) or die(mysqli_error($con));
$row_category_nav = mysqli_fetch_assoc($category_nav);
$totalRows_category_nav = mysqli_num_rows($category_nav);
?>
                        <?php do { ?>
                        <a class="dropdown-item" href="../categories-details-call.php?Category=<?php echo $row_category_nav['cat_name'];?>">
                            <?php echo $row_category_nav['cat_name']; ?>
                        </a>
                        <?php } while ($row_category_nav = mysqli_fetch_assoc($category_nav)); ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?php linkmain() ?>single-product-details.php">Clearance Sale <span class="sr-only ">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?php linkmain() ?>aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?php linkmain() ?>contactus.php">Contact Us</a>
            </li>
        </ul>
    </div>
</nav>