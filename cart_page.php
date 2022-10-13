<?php
include('session_start.php');
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
include('config.php');
include ('main_header.php'); 

?>
<?php 
require_once ('call/cart_page_call.php');
?>
<html>

<head>
    <title>Cart Page</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<div class="main-body-container">
    <div class="main-wide-container">

        <body>

            <tr>
                <td height="205" colspan="2" valign="top">
                    <h2>SHOPPING CART</h2>
                    <table width="100%" cellpadding="4">
                        <tr>
                            <td width="20%"><strong>Product Ordered</strong></td>
                            <td width="10%"><strong>Name</strong></td>
                            <td width="10%"><strong>Quantity</strong></td>
                            <td width="20%"><strong>Unit Price</strong></td>
                            <td width="20%" align="right"><strong>Cost</strong></td>
                            <td width="10%" align="right"><strong>Delete</strong></td>
                        </tr>
                        <?php
                        $grand = 0;
                        do { ?>

                            <?php $row_Products['cart_id']; ?>
                            <tr>
                                <td>
                                    <img width=100 height=100 src="Images/<?php echo $row_Products['photo']; 
                                                                            ?>" />
                                    <br />Size:
                                    <?php
                                    echo $row_Products["Size"] ?? "";
                                    ?>
                                </td>
                                <td><?php
                                    echo $row_Products["Productname"];
                                    ?></td>


                                <td><?php
                                    echo $row_Products["quantity"];
                                    ?></td>
                                <td>

                                    <?php
                                    echo $row_Products["Price"];
                                    ?></td>
                                <td align="right">

                                    $ <?php
                                        $cost = $row_Products["Price"] * $row_Products['quantity'];
                                        echo number_format($cost, 2);
                                        ?>
                                </td>
                                <td>
                                    <a href="delete_add_to_cart.php?cart_id=<?php echo $row_Products['cart_id'] . '&product_id=' . $row_Products['product_id']; ?>" onclick="return confirm('Are You Sure ?\rIt will delete the file Permanently!')">
                                        <spam class="w3-xxxlarge"><i class="fa fa-close"></i></spam>
                                    </a>
                                </td>
                            </tr>

                            <?php
                            $grand = $cost + $grand;
                            ?>

                        <?php } while ($row_Products = mysqli_fetch_assoc($Products)); ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="right"><strong>Grand Total</strong></td>
                            <td align="right">

                                $ <?php
                                    $grand = $grand;
                                    echo number_format($grand, 2);
                                    ?> </td>
                        </tr>
                    </table>
                    <a href="checkout-page.php">
                        <div class="cart_Checkout_button">
                            <button type="button" class="button">CHECKOUT</button>
                        </div>
                    </a>
    </div>
</div>
<?php
include('footers/footer.php');
?>