<?php
include('../config.php');
include('../session_start.php');
include('../call/be_interface_call.php');
include('../call/admin_detail_call.php');
include('../headers/admin_header.php');
?>
    <?php
if (!isset($row_Products['admin_id'])) {
  header('Location: index.php');
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

  $file_get = $_FILES['photo']['name'];
  $temp = $_FILES['photo']['tmp_name'];
  $file_to_saved = "../Images/" . $file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
  move_uploaded_file($temp, $file_to_saved);

  $insertSQL = sprintf(
    "INSERT INTO product (photo, Price, Productname, SKU, Active, description, Short_description, Variation, Category) VALUES ('$file_get', %s, %s, %s, %s, %s, %s, %s, %s)",
    GetSQLValueString($_POST['Price'], "double"),
    GetSQLValueString($_POST['Productname'], "text"),
    GetSQLValueString($_POST['SKU'], "text"),
    GetSQLValueString($_POST['Active'], "text"),
    GetSQLValueString($_POST['description'], "text"),
    GetSQLValueString($_POST['Short_description'], "text"),
    GetSQLValueString($_POST['Variation'], "text"),
    GetSQLValueString($_POST['Category'], "text")
  );

  mysqli_select_db($con, 'temp');
  $Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
  
  $insertGoTo = "../admin/be_interface.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header("Location: ../admin/admin_profile.php");
}
?>

            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <link href="CSS/style.css" rel="stylesheet" type="text/css" />
            </head>
            <div class="main-body-container">

                <body>
                    <div class="table-cover-container">
                        <h1>Add New Product</h1><a href ="https://kapada.smartindoors.com.au/admin/admin_profile.php"><p><i class="fa fa-arrow-left" aria-hidden="true">Go Back</i>
</p></a>
                        <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST" enctype="multipart/form-data">
                            <div class="main-table-add-new">

                                <product-title>Productname:</product-title>
                                <label>
            <input type="text" name="Productname" id="Productname" />
          </label>


                                <product-title> SKU:</product-title>

                                <label>
            <input name="SKU" type="text" id="SKU" size="50" />
          </label>


                                <product-title> Active:</product-title>

                                <label>
            <select name="Active" id="Active">
              <option value="Yes">Yes (To display in website)</option>
              <option value="No" selected="selected">No (Save as a draft)</option>
            </select>
          </label>



                                <product-title>Short Description:</product-title>

                                <label>
            <input name="Short_description" type="text" id="Short_description" size="50" />
          </label>



                                <product-title>Photo:</product-title>
                                <label>
            <input type="file" placeholder="insert Image" value="" name="photo" id="photo" />
          </label>
          
          <!-- Variation code -->
          <product-title>Variation name:</product-title>

                                <label>
            <input name="Variation" type="text" id="Variation" size="50" />
          </label>
          <!-- closing Variation code -->
                                <product-title>Price:</product-title>

                                <label>
            <input name="Price" type="double" id="Price" size="6" />
          </label>

                                <product-title>Category:</product-title>

                                <label>
            <select name="Category" id="Category">
              <?php
              include('../call/categories_call.php');
              ?>
              <?php do { ?>
                <option value="<?php echo $row_category['cat_name']; ?>"><?php echo $row_category['cat_name']; ?></option>
              <?php } while ($row_category = mysqli_fetch_assoc($category)); ?>
            </select>
          </label>

            <product-title>Description:</product-title>

            <label>
              <textarea name="description" cols="50" rows="6" id="description"></textarea>
            </label>
                                <label>
              <input class="button" type="submit" name="button" id="button" value="Submit" />
            </label>
                                <br />
                                <label>
              <input class="button" type="reset" name="button2" id="button2" value="Reset" />
            </label>
                            </div>
                            <input type="hidden" name="MM_insert" value="form1" />
                        </form>
                </body>
                </div>
            </div>
            <?php
include('../footers/footer.php');
?>
