<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
</head>
<?php include('pos-products-call.php');
  ?>
<?php do { ?>
<div class="products_thumb">
    <div class="zoom" id="zoom">
        
            <div class="products_thumb_image">
                <img width=270 height=300 src="../Images/<?php echo $row_Products['photo']; ?>" />
            </div>
    </div>
    <div class="products_thumb_productname">
        <?php echo $row_Products['Productname']; ?> <br />
        <?php echo $row_Products['SKU']; ?><br />
        <?php echo $row_Products['Category']; ?>
    </div>

    <div class="products_thumb_productprice">
        $
        <?php echo $row_Products['Price']; ?>
    </div>
    <input name="quantity" type="Show" id="quantity<?php echo $row_Products['product_id']; ?>" value="1" />
    <input name="username" type="hidden" id="username<?php echo $row_Products['product_id']; ?>" value="<?php include ('../call/user_detail_call.php'); echo $row_users['username']; ?>" />
    <input name="photo" type="hidden" id="photo<?php echo $row_Products['product_id']; ?>" value="<?php echo $row_Products['photo']; ?>" />
    <input name="Productname" type="hidden" id="Productname<?php echo $row_Products['product_id']; ?>" value="<?php echo $row_Products['Productname']; ?>" />
    <input name="Price" type="hidden" id="Price<?php echo $row_Products['product_id']; ?>" value="<?php echo $row_Products['Price']; ?>" />
    <input name="product_id" type="hidden" id="product_id<?php echo $row_Products['product_id']; ?>" value="<?php echo $row_Products['product_id']; ?>" />
    <input type="submit" class="addToCartP" name="button" id="<?php echo $row_Products['product_id']; ?>" value="Add to Cart" />
</div>
<?php } while ($row_Products = mysqli_fetch_assoc($Products)); ?>
<!-- ajax add to cart-->
<script>
    $(document).ready(function() {
        $('.addToCartP').click(function() {
            var cartNo = $(this).attr('id');
            // console.log(cartNo);
            var Productname = $('#Productname' + cartNo).val();
            var Price = $('#Price' + cartNo).val();
            var quantity = $('#quantity' + cartNo).val();
            var product_id = $('#product_id' + cartNo).val();
            var username = $('#username' + cartNo).val();
            var photo = $('#photo' + cartNo).val();
            $.ajax({
                url: 'pos_add_to_cart_send.php',
                type: 'POST',
                data: {
                    Productname: Productname,
                    Price: Price,
                    quantity: quantity,
                    product_id: product_id,
                    username: username,
                    photo: photo
                },
                success: function(data) {
                    window.location.reload();
                }
            })

        });
    });
</script>