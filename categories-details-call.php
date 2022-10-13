<?php
include ('config.php');
include ('session_start.php');
include ('main_header.php');
?>

    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <script src="http://nicesnippets.com/demo/jsCarousel-2.0.0.js" type="text/javascript"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="CSS/style.css" rel="stylesheet" type="text/css">
        <link href="CSS/Pos.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>

    <?php
$colname_theCategory = "-1";
if (isset($_GET['Category'])) {
  $colname_theCategory = $_GET['Category'];
}
mysqli_select_db($con, 'temp');
$query_theCategory = "SELECT * FROM product Where Category = '{$_GET['Category']}'";
$theCategory = mysqli_query($con, $query_theCategory);
$row_theCategory = mysqli_fetch_assoc($theCategory);
$totalRows_theCategory = mysqli_num_rows($theCategory);
?>
<div class="main-body-container">
  <div class="main-wide-container">
    <div class="left">
        <?php do { ?>
        <div class="products_thumb">
            <div class="zoom" id="zoom">
                <a href="product_detail.php?id=<?php echo $row_theCategory['product_id'];?>">

                    <div class="products_thumb_image">
                        <img width=100% height= 250 src="Images/<?php echo $row_theCategory['photo']; ?>" />
                    </div>
            </div>
            <div class="products_thumb_productname">
                <?php echo $row_theCategory['Productname']; ?>
            </div>
            <div class="products_thumb_productprice">
                $
                <?php echo $row_theCategory['Price']; ?>
            </div>
            </a>
            <input name="quantity" type="hidden" id="quantity<?php echo $row_theCategory['product_id']; ?>" value="1" />
            <input name="username" type="hidden" id="username<?php echo $row_theCategory['product_id']; ?>" value="<?php include ('call/user_detail_call.php'); echo $row_users['username']; ?>" />
            <input name="photo" type="hidden" id="photo<?php echo $row_theCategory['product_id']; ?>" value="<?php echo $row_theCategory['photo']; ?>" />
            <input name="Productname" type="hidden" id="Productname<?php echo $row_theCategory['product_id']; ?>" value="<?php echo $row_theCategory['Productname']; ?>" />
            <input name="Price" type="hidden" id="Price<?php echo $row_theCategory['product_id']; ?>" value="<?php echo $row_theCategory['Price']; ?>" />
            <input name="product_id" type="hidden" id="product_id<?php echo $row_theCategory['product_id']; ?>" value="<?php echo $row_theCategory['product_id']; ?>" />
            <input type="submit" class="addToCart" name="button" id="<?php echo $row_theCategory['product_id']; ?>" value="Add to Cart" />
        </div>

        <?php } while ($row_theCategory = mysqli_fetch_assoc($theCategory)); ?>
         </div>
          </div>
           </div>
        <?php
include ('../footers/footer.php');
?>

         
<!-- ajax add to cart-->
<script>
$(document).ready(function(){
    $('.addToCart').click(function()
    {
        var cartNo = $(this).attr('id');
        // console.log(cartNo);
        var Productname = $('#Productname' + cartNo).val(); 
        var Price = $('#Price' + cartNo).val();
        var quantity = $('#quantity' + cartNo).val();
        var product_id = $('#product_id' + cartNo).val();
        var username = $('#username' + cartNo).val();
        var photo = $('#photo' + cartNo).val();
        $.ajax({
            url: 'send/add-to-cart-send.php',
            type: 'POST',
            data: { Productname:Productname, Price:Price, quantity:quantity, product_id:product_id, username:username, photo:photo},
            success: function(data)
            {
                window.alert("Done");
            }
        })
        
    });
});

</script>