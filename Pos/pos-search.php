<?php
include '../config.php'; // being the MySQLi_ API
if (!empty($_GET['q'])) {
  $q = mysqli_real_escape_string($con, $_GET['q']);
  $query = mysqli_query($con, "SELECT * FROM product WHERE (`SKU` LIKE '%" . $q . "%')") or die(mysqli_error($con));
  if (mysqli_num_rows($query) > 0) { // if one or more rows are returned do following
    while ($results = mysqli_fetch_array($query)) { ?>
        <div class="products_thumb">
            <a href="../product_detail.php?id=<?php echo $results['product_id']; ?>">
        <div class="products_thumb_image">
                <img width=100 height=100 src="../Images/<?php echo $results['photo']; ?>" />
              </div>
          <div class="products_thumb_productname">
            <?php echo $results['Productname']; ?>
          </div>
          <div class="products_thumb_productprice">
            $<?php echo $results['Price']; ?>
          </div>
          </a>
          <input name="quantity" type="Show" id="quantity<?php echo $results['product_id']; ?>" value="1" />
          <input name="photo" type="hidden" id="photo<?php echo $results['product_id']; ?>" value="<?php echo $results['photo']; ?>" />
          <input name="Productname" type="hidden" id="Productname<?php echo $results['product_id']; ?>" value="<?php echo $results['Productname']; ?>" />
          <input name="Price" type="hidden" id="Price<?php echo $results['product_id']; ?>" value="<?php echo $results['Price']; ?>" />
          <input name="product_id" type="hidden" id="product_id<?php echo $results['product_id']; ?>" value="<?php echo $results['product_id']; ?>" />
          <input type="submit" class="addToCartS" name="button" id="<?php echo $results['product_id']; ?>" value= "Add to Cart" autofocus="autofocus"/>
        </div>
<?php      // posts results gotten from database(title and text) you can also show id ($results['id'])
    }
  } else { // if there is no matching rows do following
    echo "No results";
  }
} else { // if query length is less than minimum
  echo "Minimum length is " . $min_length;
}
?>
<!-- ajax add to cart-->
<script>
  $(document).ready(function() {
    $('.addToCartS').click(function() {
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
          window.alert("Done");
        }
      })

    });
  });
</script>