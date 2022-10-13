<?php
include('../headers/admin_header.php');
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {

  $file_get = $_FILES['image']['name'];
  $temp = $_FILES['image']['tmp_name'];
  $file_to_saved = "../Images/" . $file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
  move_uploaded_file($temp, $file_to_saved);

  $insertSQL = sprintf(
    "INSERT INTO categories (image, cat_name, cat_description, Active) VALUES ('$file_get', %s, %s, %s)",
    GetSQLValueString($_POST['cat_name'], "text"),
    GetSQLValueString($_POST['cat_description'], "text"),
    GetSQLValueString($_POST['Active'], "text")
  );

  mysqli_select_db($con, 'temp');
  $Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));

  $insertGoTo = " ../admin/admin_profile.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header("Location: ../admin/admin_profile.php");
}
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="../CSS/style.css" rel="stylesheet" type="text/css" />
</head>
<div class="main-body-container">

  <body>
    <div class="table-cover-container">
      <h1>Add New Category</h1><a href ="https://kapada.smartindoors.com.au/admin/admin_profile.php"><p><i class="fa fa-arrow-left" aria-hidden="true">Go Back</i>
</p></a>
      <form action="<?php echo $editFormAction; ?>" id="form2" name="form2" method="POST" enctype="multipart/form-data">
        <div class="main-table-add-new">

          <product-title>Category Name:</product-title>
          <label>
            <input type="text" name="cat_name" id="cat_name" />
          </label>


          <product-title> Category Description:</product-title>

          <label>
            <input name="cat_description" type="text" id="cat_description"/>
          </label>


          <product-title> Active:</product-title>

          <label>
            <select name="Active" id="Active">
              <option value="Yes">Yes (To display in website)</option>
              <option value="No" selected="selected">No (Save as a draft)</option>
            </select>
</label>
          <product-title>Image:</product-title>
          <label>
            <input type="file" placeholder="insert Image" value="" name="image" id="image" />
          </label>
            <label>
              <input class="button" type="submit" name="button" id="button" value="Submit" />
            </label>
            <br />
            <label>
              <input class="button" type="reset" name="button2" id="button2" value="Reset" />
            </label>
        </div>
        <input type="hidden" name="MM_insert" value="form2" />
      </form>
  </body>
</div>
</div>
 <?php
include('../footers/footer.php');
?>
