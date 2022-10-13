<?php
include ('../config.php');
include ('../session_start.php');
include ('../call/be_interface_call.php');
include ('../call/admin_detail_call.php');
include ('../headers/admin_header.php');
?>

<?php
if (!isset($row_Products['admin_id'])) {
    header('Location: ../index.php');
    exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
    {
        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
    $updateSQL = sprintf(
        "UPDATE product SET photo=%s, Price=%s, Productname=%s, SKU=%s, Active=%s, description=%s, Short_description=%s, Category=%s WHERE product_id=%s",
        GetSQLValueString($_POST['photo'], "text"),
        GetSQLValueString($_POST['Price'], "double"),
        GetSQLValueString($_POST['Productname'], "text"),
        GetSQLValueString($_POST['SKU'], "text"),
        GetSQLValueString($_POST['Active'], "text"),
        GetSQLValueString($_POST['description'], "text"),
        GetSQLValueString($_POST['Short_description'], "text"),
        GetSQLValueString($_POST['Category'], "text"),
        GetSQLValueString($_POST['product_id'], "int")
    );

    mysqli_select_db($con, 'temp');
    $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

    $updateGoTo = "../admin/be_interface.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header("Location: ../admin/admin_profile.php");
}

$colname_theProduct = "-1";
if (isset($_GET['product_id'])) {
    $colname_theProduct = $_GET['product_id'];
}
mysqli_select_db($con, 'temp');
$query_theProduct = sprintf("SELECT * FROM product WHERE product_id = %s", GetSQLValueString($colname_theProduct, "int"));
$theProduct = mysqli_query($con, $query_theProduct) or die(mysqli_error($con));
$row_theProduct = mysqli_fetch_assoc($theProduct);
$totalRows_theProduct = mysqli_num_rows($theProduct);
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Update Page</title>
    <link href="CSS/style.css" rel="stylesheet" type="text/css" />
</head>

<div class="main-body-container">

    <body>
        <div class="table-cover-container">
            <h1>Update Product</h1>
            <a href ="https://kapada.smartindoors.com.au/admin/admin_profile.php"><p><i class="fa fa-arrow-left" aria-hidden="true">Go Back</i>
</p></a>
            <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">

                <div class="main-table-add-new">

                    <product-title>Productname</product-title>
                    <input name="Productname" type="text" id="Productname" value="<?php echo $row_theProduct['Productname']; ?>" />
                    <input name="product_id" type="hidden" id="product_id" value="<?php echo $row_theProduct['product_id']; ?>" />
                    </label>


                    <product-title> SKU</product-title>

                    <label>
                        <input name="SKU" type="text" id="SKU" value="<?php echo $row_theProduct['SKU']; ?>" size="50" />
                    </label>


                    <product-title>Active</product-title>

                    <label>
                        <select name="Active" id="Active">
                            <option value="Yes" <?php if (!(strcmp("Yes", $row_theProduct['Active']))) {
                                                    echo "selected=\"selected\"";
                                                } ?>>
                                Yes</option>
                            <option value="No" <?php if (!(strcmp("No", $row_theProduct['Active']))) {
                                                    echo "selected=\"selected\"";
                                                } ?>>
                                No</option>
                        </select>
                    </label>


                    <product-title>Short_description</product-title>

                    <label>
                        <input name="Short_description" type="text" id="Short_description" value="<?php echo $row_theProduct['Short_description']; ?>" size="50" />
                    </label>


                    <product-title>Photo</product-title>

                    <label>
                        <input name="photo" type="text" id="photo" value="<?php echo $row_theProduct['photo']; ?>" size="20" />
                    </label>

                    <product-title>Size:</product-title>
                    <label>
                        <div class="Login_bar" type="button" onclick="openForm()">Add Size</div>
                    </label>

                    <product-title>Price</product-title>

                    <label>
                        <input name="Price" type="double" id="Price" value="<?php echo $row_theProduct['Price']; ?>" size="6" />
                    </label>

<product-title>Category:</product-title>
                    <label>
                        
            <select name="Category" id="Category">
                <option selected="selected">
                   <u> <?php echo $row_theProduct['Category']; ?></u>
                    
                </option>
              <?php
              include('../call/categories_call.php');
              ?>
              <?php do { ?>
                <option value="<?php echo $row_category['cat_name']; ?>"><?php echo $row_category['cat_name']; ?></option>
              <?php } while ($row_category = mysqli_fetch_assoc($category)); ?>
            </select>
          </label>

                    <product-title>Description</product-title>

                    <label>
                        <textarea name="description" cols="50" rows="6" id="description"><?php echo $row_theProduct['description']; ?></textarea>
                    </label>


                    <label>
                        <input type="submit" name="button" id="button" value="Submit" />
                    </label>
                    <label>
                        <input type="reset" name="button2" id="button2" value="Reset" />
                    </label>

                </div>



                <input type="hidden" name="MM_update" value="form1" />
            </form>
        </div>
        <
</div>
</body>

</html>
<?php
mysqli_free_result($theProduct);
include('../footers/footer.php');
?>
<div class="form-popup" id="myForm">
    <form class="form-container" action="../send/size_insert.php" method="post">
        <h1>Insert the size:</h1>
        <input name="product_id" type="hidden" id="product_id" value="<?php echo $row_theProduct['product_id']; ?>" />

        <label for="size"><b>Size</b></label>
        <input type="text" placeholder="Enter Size" value="" name="size" id="size" required>


        <button class="btn" type="submit" value="submit">Insert</button>
        <button type="button" class="btn cancel" onclick="closethisForm()">Close</button>
    </form>
</div>

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closethisForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>