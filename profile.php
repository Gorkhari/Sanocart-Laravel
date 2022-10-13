<?php

include('session_start.php');
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>
<?php
mysqli_select_db($con, 'temp');
$query_orders = "SELECT * FROM product_order WHERE username = '{$_SESSION['username']}' ORDER BY order_time DESC";
$orders = mysqli_query($con, $query_orders);
$row_orders = mysqli_fetch_assoc($orders);
$totalRows_orders = mysqli_num_rows($orders);
?>

<?php include ('main_header.php');  ?>
<div class="main-body-container">
    <div class="main-wide-container">
        </nav>
        <div class="content">
            <div class="profile_update">
                <b>Your account details are below:</b>
                <div>
                    Username:<?php
                                include('call/user_detail_call.php');

                                echo $row_users['username']; ?>
                    <br /> Fullname:
                    <?php
                    echo $row_users['Fullname']; ?>
                    <br />
                    <?php Email:
                    echo $row_users['Email']; ?>
                    <br />
                    <div class="button">
                        <a href="Pos/pos-main.php">POS System</a>
                    </div>
                     <br />
                    <br />
                    <div class="button">
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </div>
                </div>
            </div>
            <div class="order-history-header">
                <b>Order History</b>
                <?php
                if ($row_orders['cart_id'] ?? "" > 0) { ?>
                    <div class="profile-main-order-detail">
                        <?php
                        do { ?>
                            <div class="profile-main-order-info">
                                <div class="profile-order-info">
                                    Order Date:<?php echo $row_orders['order_time'] ?? ""; ?> <br />
                                    Order No:<?php echo $row_orders['order_id'] ?? ""; ?> <br />
                                    Payment: <img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20" />
                                    <br />
                                    Shiping Address: <?php echo $row_orders['address'] ?? ""; ?> <br />
                                    <?php echo $row_orders['state'] ?? ""; ?>
                                    <?php echo $row_orders['country'] ?? ""; ?>
                                    <?php echo $row_orders['zip'] ?? ""; ?>
                                </div>
                                <br />
                                <div class="profile-product-info">
                                    <div class="profile-product-info-image">
                                        <td width="20%"> <img src="Images/<?php echo $row_orders['photo'] ?? ""; ?>" width="90">
                                        </td>
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
                                </div>
                            </div>
                        <?php } while ($row_orders = mysqli_fetch_assoc($orders) ?? ""); ?>
                    </div>
                <?php } else {
                    echo "<br/>	 You haven't order yet! That's Bad";
                } ?>
            </div>
        </div>
    </div>
</div>
<?php
include('footers/footer.php');
?>