<?php
include ('../config.php');
include ('../session_start.php');
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
        "UPDATE categories SET image=%s, cat_name=%s, Active=%s, cat_description=%s WHERE cat_id=%s",
        GetSQLValueString($_POST['image'], "text"),
        GetSQLValueString($_POST['cat_name'], "text"),
        GetSQLValueString($_POST['Active'], "text"),
        GetSQLValueString($_POST['cat_description'], "text"),
        GetSQLValueString($_POST['cat_id'], "int")
    );

    mysqli_select_db($con, 'temp');
    $Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

    $updateGoTo = "be_interface.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
        $updateGoTo .= $_SERVER['QUERY_STRING'];
    }
    header("Location: admin_profile.php");
}

$colname_category = "-1";
if (isset($_GET['cat_id'])) {
    $colname_category = $_GET['cat_id'];
}
mysqli_select_db($con, 'temp');
$query_category = sprintf("SELECT * FROM categories WHERE cat_id = %s", GetSQLValueString($colname_category, "int"));
$category = mysqli_query($con, $query_category) or die(mysqli_error($con));
$row_category = mysqli_fetch_assoc($category);
$totalRows_category = mysqli_num_rows($category);
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
            <h1>Update Product</h1><a href ="https://kapada.smartindoors.com.au/admin/admin_profile.php"><p><i class="fa fa-arrow-left" aria-hidden="true">Go Back</i>
</p></a>
            <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">

                <div class="main-table-add-new">

                    <product-title>Category name</product-title>
                    <input name="cat_name" type="text" id="cat_name" value="<?php echo $row_category['cat_name']; ?>" />
                    <input name="cat_id" type="hidden" id="cat_id" value="<?php echo $row_category['cat_id']; ?>" />
                    </label>

                    <product-title>Active</product-title>

                    <label>
                        <select name="Active" id="Active">
                            <option value="Yes" <?php if (!(strcmp("Yes", $row_category['Active']))) {
                                                    echo "selected=\"selected\"";
                                                } ?>>
                                Yes</option>
                            <option value="No" <?php if (!(strcmp("No", $row_category['Active']))) {
                                                    echo "selected=\"selected\"";
                                                } ?>>
                                No</option>
                        </select>
                    </label>

                    <product-title>Photo</product-title>

                    <label>
                        <input name="image" type="text" id="image" value="<?php echo $row_theProduct['image']; ?>" size="20" />
                    </label>

                    <label>
                        <textarea name="cat_description" cols="50" rows="6" id="cat_description"><?php echo $row_category['cat_description']; ?></textarea>
                    </label>

                    <label>
                        <input type="submit" name="button" id="button" value="Submit" />
                    </label>
                    

                </div>



                <input type="hidden" name="MM_update" value="form1" />
            </form>
        </div>
</div>
</body>

</html>
<?php
include ('../footers/footer.php');
?>
