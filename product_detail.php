<?php
require_once('config.php');
?>
<?php
if (!isset($_SESSION)) {
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: registration-form-login.php');
        exit;
    }
}
?>
<?php
include("call/product-details-call.php");
?>
<?php include ('main_header.php');  ?>

<html>

<head>
    <link href="CSS/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<div class="main-body-container">
    <div class="product-single-details">
        <div class="product-single-details-image">
            <img src="Images/<?php echo $row_theProduct['photo']; ?>" width="100%" height="auto" />
        </div>
        <div class="product-single-details-summary">
            <div class="product-single-details-summary-main">
                <u>
                    <div class="product-single-Category">Category>
                        <?php echo $row_theProduct['Category']; ?>
                    </div>
                </u>
                <div class="product-single-name">
                    <?php echo $row_theProduct['Productname']; ?>
                </div>
                <div class="product-single-Price">
                    $<?php echo $row_theProduct['Price']; ?>
                </div>
                <div class="product-single-Short_description">
                    <?php echo $row_theProduct['Short_description']; ?>
                </div>
                
                    <div class="product-single-quantity">
                        <strong>Quantity</strong>
                    </div>
                    <div class="product-single-quantity-amount">
                        <input name="quantity" type="text" id="quantity" value="1" size="5" />
                    </div>
                    <div class="product-single-add-to-cart">
                        <input type="submit" name="button2" id="button2" value="Add to Cart" />
                    </div> 
                    <strong>Total Price: <div class="product-single-quantity" id="total-price"></div></strong>
                    <input name="Productname" type="hidden" id="Productname" value="<?php echo $row_theProduct['Productname']; ?>" />
                    <input name="Price" type="hidden" id="Price" value="<?php echo $row_theProduct['Price']; ?>" />
                    <input name="photo" type="hidden" id="photo" value="<?php echo $row_theProduct['photo']; ?>" />
                    <input name="product_id" type="hidden" id="product_id" value="<?php echo $row_theProduct['product_id']; ?>" />
                    <input name="username" type="hidden" id="username" value="<?php
                                                                                include('call/user_detail_call.php');
                                                                                echo $row_users['username'];
                                                                                ?>" />
                
            </div>
        </div>
    </div>


    <div class="product-single-details-information-tab-main">

        <div class="product-single-details-information-tab-description">

            <button type="button" class="collapsible-single-product-page">Description</button>
            <div class="content-single-product-page">
                <ul>
                    <li><?php echo $row_theProduct['description']; ?></li>
                </ul>
            </div>
        </div>
        <!-- <div class="product-single-details-information-tab-features">
     <button type="button" class="collapsible-single-product-page">Features</button>
<div class="content-single-product-page">
  <ul>
	<li><?php echo $row_theProduct['Short_description']; ?></li>
</ul>
</div>
</div> -->
        <h2>Similar Products</h2>
        <?php
        include('Reccently_added_items.php');
        ?>
    </div>
</div>
</div>
</div>

<?php
include('footers/footer.php');
?>


<!-- ajax add to cart-->
<script>
$(document).ready(function(){
    $('#button2').click(function()
    {
        var Productname = $('#Productname').val();
        var Price = $('#Price').val();
        var quantity = $('#quantity').val();
        var product_id = $('#product_id').val();
        var username = $('#username').val();
        var photo = $('#photo').val();

        $.ajax({
            url: 'send/add-to-cart-send.php',
            type: 'POST',
            data: { Productname:Productname, Price:Price, quantity:quantity, product_id:product_id, photo:photo, username:username },
            success: function(data)
            {
                window.alert("Done");
                // var cartCounter = parseInt($(".cart").find('#lblCartCount').html());
                // console.log(cartCounter);
                // cartCounter +=  parseInt(quantity);
                // console.log(cartCounter);
                // document.getElementById("lblCartCount").innerHTML = cartCounter;
                
                
            }
        })
    });
});
</script>
<!--calculated total price-->
<script>
$(document).ready(function(){
$(".product-single-quantity-amount").bind("change", function(){
    var value1 = document.getElementById('quantity').value;
    var value2 = document.getElementById('Price').value;
    
    document.getElementById("total-price").innerHTML = value1 * value2;
});
});
</script>
<script>
    var coll = document.getElementsByClassName("collapsible-single-product-page");
    var i;
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>

