<?php
mysqli_select_db($con, 'temp');
$query_Products = "SELECT * FROM add_to_cart WHERE username = '{$_SESSION['username']}'";
$Products = mysqli_query($con, $query_Products) or die("Unable to connect to $con");
$row_Products = mysqli_fetch_assoc($Products);
$totalRows_Products = mysqli_num_rows($Products);
?>
<head>
    <link href="../CSS/style.css" rel="stylesheet" type="text/css" />
    <link href="../CSS/pos.css" rel="stylesheet" type="text/css" />
</head>

    <div class="pos-main-wide-container">
            <tr>
                    <table width="100%" cellpadding="4">
                        <tr>
                            <td width="10%"><strong>Product Ordered</strong></td>
                            <td width="20%"><strong>Name</strong></td>
                            <td width="5%"><strong>QTY</strong></td>
                            <td width="10%"><strong>Price</strong></td>
                            <td width="10%" align="right"><strong>Cost</strong></td>
                            <td width="5%" align="right"><strong>Delete</strong></td>
                        </tr>
                        <?php
                        $grand = 0;
                        $cartCount = 0;
                        do { ?>

                            <?php $row_Products['cart_id']; ?>
                            <tr>
                                <td>
                                    <img width=40px height=40px src="../Images/<?php echo $row_Products['photo']; ?>" />
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
                                   <?php $totalQty = $row_Products["quantity"];
                                   ?>
                                    
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
                    <input name="cart_id" type="hidden" id="cart_id" value="<?php echo $row_Products['cart_id']; ?>" />
                    <input name="product_id" type="hidden" id="product_id" value="<?php echo $row_Products['product_id']; ?>" />
                                <td>
                                     <a href="../Pos/pos-add-to-cart-delete.php?cart_id=<?php echo $row_Products['cart_id'] . '&product_id=' . $row_Products['product_id']. '&tbl_id=' . $row_Products['tbl_id'];; ?>" onclick="return confirm('Are You Sure ?\rIt will delete the file Permanently!')">
                                        <spam class="w3-xxlarge"><i class="fa fa-close"></i></spam>
                                    </a>
                                    </a>
                                </td>
                            </tr>

                            <?php
                            $grand = $cost + $grand;
                            $cartCount = $totalQty + $cartCount;
                            ?>
                           

                        <?php } while ($row_Products = mysqli_fetch_assoc($Products)); ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td><b>Total QTY:</b></td>
                            <td><?php
                                    $cartCount = $cartCount;
                                    echo number_format($cartCount);
                                    ?> </td>
                            <td align="right"><strong>Grand Total</strong></td>
                            <td align="right">

                                $ <?php
                                    $grand = $grand;
                                    echo number_format($grand, 2);
                                    ?> </td>
                        </tr>
                    </table>
                    <a href="../checkout-page.php">
                        <div class="cart_Checkout_button">
                            <button type="button" class="button">CHECKOUT</button>
                        </div>
                    </a>
    </div>