 <?php
    include('config.php');
    include('main_header.php');
    ?>
 <html>

 <head>
     <link href="CSS/style.css" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
 </head>
 <?php
    mysqli_select_db($con, 'temp');
    $query_Products = "SELECT * FROM product WHERE Category = 'Women'";
    $Products = mysqli_query($con, $query_Products) or die(mysqli_error($con));
    $row_Products = mysqli_fetch_assoc($Products);
    $totalRows_Products = mysqli_num_rows($Products);
    ?>


 <div class="main-body-container">
     <div class="main-wide-container">

         <div class="content">
             <h2>Women Clothing</h2>
             <div class="main-body-container">

                 <body>

                     <div class="left">
                         <?php do { ?>
                             <div class="products_thumb">
                                 <div class="zoom">
                                     <a href="product_detail.php?id=<?php echo $row_Products['product_id']; ?>">

                                         <div class="products_thumb_image">
                                             <img width=270 height=300 src="images/<?php echo $row_Products['photo']; ?>" />
                                         </div>
                                         <div class="products_thumb_productname">
                                             <?php echo $row_Products['Productname']; ?>
                                         </div>
                                         <div class="products_thumb_productprice">
                                             $<?php echo $row_Products['Price']; ?>
                                         </div>
                                 </div>

                                 </a>
                             </div>

                         <?php } while ($row_Products = mysqli_fetch_assoc($Products)); ?>
                     </div>
             </div>
         </div>
     </div>
 </div>
 <?php
    include('footers/footer.php');
    ?>