<?php
require ('../config.php');
require ('../session_start.php');
require ('../call/checkout_call.php');
?>
<?php
   unset($_SESSION['cart_id']);
?>
<link href="../CSS/order.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-left logo p-2 px-5"> <img src="../Images/kapada.jpg" width="50"> </div>
                <div class="invoice p-5">
                    <h5>Your order Confirmed!</h5> <span class="font-weight-bold d-block mt-4">Hello,
                        <?php echo $row_orders['username']; ?>
                    </span> <span>You order has been confirmed and will be shipped in next two days!</span>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order Date</span>
                                            <span><?php echo $row_orders['order_time']; ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order No</span>
                                            <span><?php echo $row_orders['order_id']; ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Payment</span> <span><img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20" /></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Shiping Address</span>
                                            <span><?php echo $row_orders['address']; ?>
                                                <br />
                                                <?php echo $row_orders['state']; ?>
                                                <?php echo $row_orders['country']; ?>
                                                <?php echo $row_orders['zip']; ?>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><?php
                            $grand = 0;
                            do { ?>
                        <div class="product border-bottom table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <input name="product_id" type="hidden" id="product_id" value="<?php echo $row_Products['product_id']; ?>" />
                                        <td width="20%"> <img src="../Images/<?php echo $row_orders['photo']; ?>" width="90">
                                        </td>
                                        <td width="60%"> <span class="font-weight-bold"><?php echo $row_orders['Productname']; ?></span>
                                            <div class="product-qty"> <span class="d-block">Quantity:
                                                    <?php echo $row_orders['quantity']; ?></span> </div>
                                        </td>
                                        <td width="20%">
                                            <div class="text-right"> <span class="font-weight-bold">
                                                $<?php require ('../call/product-details-call.php');
                                                 echo $row_orders['Price']; ?></span> </div>
                                            <?php
                                            $cost = $row_orders["Price"] * $row_orders['quantity'];
                                            $grand = $cost + $grand;
                                            ?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } while ($row_orders = mysqli_fetch_assoc($orders)); ?>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                    <tr>
                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-left"> <span class="font-weight-bold">Subtotal</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="font-weight-bold">$ <?php
                                                                                                        $grand = $grand;
                                                                                                        echo number_format($grand, 2);
                                                                                                        ?> </span> </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                    <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Kapada Team</span>
                </div>
                <a href="../index.php">Go back to homepage </a>
            </div>
        </div>
    </div>
</div>