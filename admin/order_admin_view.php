<?php
include ('../config.php');
include ('../call/admin_detail_call.php');
include ('../call/admin_checkout_call.php');
?>
<?php
if (!isset($row_Products['admin_id'])) {
    header('Location: index.php');
    exit;
}
?>
<div class="order-admin-details">

    <div class="content">
        <h2>Order According To Order date</h2>
    </div>
    <!-- Order -->
    <?php
    do { ?>
        <button type="button" class="collapsible-single-product-page ">Order
            Date:<?php echo $row_orders['order_time'] ?? ""; ?> | Order No:<?php echo $row_orders['order_id'] ?? ""; ?>
        </button>
        <div class="content-admin-profile-page">
            <ul>
                <li>
                    <div class="admin_order-history-header">
                        <b>Order History</b>
                        <div class="admin_profile-main-order-detail">
                            <div class="admin_profile-main-order-info">
                                <div class="admin_profile-order-info">
                                    <form id="form2" name="form2" method="post" action="order_done_send.php">
                                        Fullname: <?php echo $row_orders['username'] ?? ""; ?> <br />
                                        Order Date:<?php echo $row_orders['order_time'] ?? ""; ?> |
                                        :<?php echo $row_orders['order_day'] ?? ""; ?> <br />
                                        Order No:<?php echo $row_orders['order_id'] ?? ""; ?> <br />
                                        Payment: <img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20" /> <br />
                                        Shiping Address: <?php echo $row_orders['address'] ?? ""; ?> <br />
                                        <?php echo $row_orders['state'] ?? ""; ?>
                                        <?php echo $row_orders['country'] ?? ""; ?>
                                        <?php echo $row_orders['zip'] ?? ""; ?>
                                </div>
                                <br />
                                <div class="profile-product-info">
                                    <div class="profile-product-info-image">
                                        <td width="20%"> <img src="../Images/<?php echo $row_orders['photo'] ?? ""; ?>" width="90"> </td>
                                        <div class="profile-product-info-details">
                                            <td width="60%"> <span class="font-weight-bold"><?php echo $row_orders['Productname'] ?? ""; ?>
                                                    <br />
                                                    <div class="product-qty"> <span class="d-block">Quantity:
                                                            <?php echo $row_orders['quantity'] ?? ""; ?> </div>
                                                    <div class="product-qty"> <span class="d-block">$
                                                            <?php echo $row_orders['Price'] ?? ""; ?> </div>
                                            </td>
                                        </div>
                                    </div>
                                    <!-- datas -->
                                    <input type='hidden' id='order_id' name='order_id' value='<?php echo $row_orders['order_id']; ?>' />
                                    <input name="photo" type="hidden" id="photo" value="<?php echo $row_orders['photo']; ?>" />
                                    <input name="Productname" type="hidden" id="Productname" value="<?php echo $row_orders['Productname']; ?>" />
                                    <input name="product_id" type="hidden" id="product_id" value="<?php echo $row_orders['product_id']; ?>" />
                                    <input name="cart_id" type="hidden" id="cart_id" value="<?php echo $row_orders['cart_id']; ?>" />
                                    <input name="Price" type="hidden" id="Price" value="<?php echo $row_orders["Price"]; ?>" />
                                    <input type='hidden' id='order_time' name='order_time' value='<?php echo $row_orders['order_time']; ?>' />
                                    <input type='hidden' id='username' name='username' value='<?php echo $row_orders['username']; ?>' />
                                    <input type='hidden' id='quantity' name='quantity' value='<?php echo $row_orders['quantity']; ?>' />
                                    <input type='hidden' id='email' name='email' value='<?php echo $row_orders['email']; ?>' />
                                    <input type='hidden' id='address' name='address' value='<?php echo $row_orders['address']; ?>' />
                                    <input type='hidden' id='country' name='country' value='<?php echo $row_orders['country']; ?>' />
                                    <input type='hidden' id='state' name='state' value='<?php echo $row_orders['state']; ?>' />
                                    <input type='hidden' id='zip' name='zip' value='<?php echo $row_orders['zip']; ?>' />
                                    <input type='hidden' id='paymentMethod' name='paymentMethod' value='<?php echo $row_orders['paymentMethod']; ?>' />

                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="add-new-ittem-button" type="submit">Order Completed</button>
                </li>
            </ul>
        </div>
    <?php } while ($row_orders = mysqli_fetch_assoc($orders) ?? ""); ?>
</div>
</div>
</div>
</form>

<script>
    var coll = document.getElementsByClassName("collapsible-single-product-page ");
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