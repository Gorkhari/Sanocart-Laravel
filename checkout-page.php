<?php
include('session_start.php');
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
include("main_header.php");
include('config.php');

?>

<html lang="en">

<head>
    <link href="CSS/form-validation.css" rel="stylesheet">
    <title>Checkout Page</title>

    <!-- Bootstrap core CSS -->
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style><!-- Custom styles for this template -->

</head>

<div class="main-body-container">
    <div class="main-wide-container">
        <h2>Checkout Page</h2>

        <body class="bg-light">
            <div class="container">


                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>

                        </h4>
                        <form id="form2" name="form2" method="post" action="send/checkout_page_send.php">
                            <?php
                            include('call/cart_page_call.php');
                            $grand = 0;
                            do { ?>
                                <?php

                                $row_Products['cart_id']; ?>

                                <ul class="list-group mb-3">
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <img width=50 height=50 src="Images/<?php
                                                                                echo $row_Products["photo"];
                                                                                ?>" />
                                            <input name="photo" type="hidden" id="photo" value="<?php echo $row_Products['photo']; ?>" />
                                            <h6 class="my-0"><?php echo $row_Products["Productname"]; ?> </h6>
                                            <input name="Productname" type="hidden" id="Productname" value="<?php echo $row_Products['Productname']; ?>" />
                                            <input name="product_id" type="hidden" id="product_id" value="<?php echo $row_Products['product_id']; ?>" />
                                            <input name="cart_id" type="hidden" id="cart_id" value="<?php echo $row_Products['cart_id']; ?>" />
                                            <input name="single_price" type="hidden" id="single_price" value="<?php echo $row_Products["Price"]; ?>" />
                                            <!-- Day -->
                                            <input type='hidden' id='order_day' name='order_day' value='<?php echo date("l") ?>' />

                                            <!--  -->
                                            <input type='hidden' id='order_time' name='order_time' value='<?php echo date("Y-m-d H:i:s"); ?>' />
                                            <small class="text-muted">Quantity:
                                                <?php echo $row_Products["quantity"]; ?></small>
                                            <input name="quantity" type="hidden" id="quantity" value="<?php echo $row_Products['quantity']; ?>" />
                                        </div>
                                        <span class="text-muted">$<?php echo $row_Products["Price"]; ?></span>
                                    </li>
                                    <?php
                                    $cost = $row_Products["Price"] * $row_Products['quantity'];
                                    $grand = $cost + $grand;
                                    ?>
                                <?php } while ($row_Products = mysqli_fetch_assoc($Products)); ?>

                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (USD)</span>
                                    <strong>$ <?php
                                                $grand = $grand;
                                                echo number_format($grand, 2);
                                                ?>
                                    </strong>
                                </li>
                                </ul>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Billing address</h4>
                        <form class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Full name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="<?php
                                                                                                                    include('call/user_detail_call.php');
                                                                                                                    echo $row_users['Fullname']; ?>" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input name="username" class="form-control" type="text" id="username" value="<?php echo $row_users['username']; ?>" required />
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email <span class="text-muted"></span></label>

                                <input name="email" type="text" class="form-control" id="email" value="" required />
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input name="address" type="text" class="form-control" id="address" value="" required />
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">Country</label>
                                    <select class="custom-select d-block w-100" id="country" name="country" required>
                                        <option value="">Choose...</option>
                                        <option>Australia</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">State</label>
                                    <select class="custom-select d-block w-100" id="state" name="state" required>
                                        <option value="">Choose...</option>
                                        <option>NSW</option>
                                        <option>ACT</option>
                                        <option>NA</option>
                                        <option>TSA</option>
                                        <option>SA</option>
                                        <option>WA</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">
                                <label class="custom-control-label" for="same-address">Shipping address is the same as
                                    my billing address</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Save this information for next
                                    time</label>
                            </div>
                            <hr class="mb-4">

                            <h4 class="mb-3">Payment</h4>

                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="paymentMethod" name="paymentMethod" type="radio" value="Credit card" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                    <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback">
                                        Name on card is required
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Credit card number</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Credit card number is required
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="month" class="form-control" id="cc-expiration" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Expiration date required
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-cvv">CVV</label>
                                    <input type="password" class="form-control" id="cc-cvv" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Security code required
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Checkout</button>

                        </form>
                    </div>
                </div>

            </div>
            </form>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script>
                window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
            </script>
            <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
            <script src="https://getbootstrap.com/docs/4.3/examples/checkout/form-validation.js"></script>
        </body>

</html>


<?php
include('footers/footer.php');
?>