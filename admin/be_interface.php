<?php
include ('../config.php');
include ('../call/be_interface_call.php');
include ('../call/admin_detail_call.php');
?>
<?php
if (!isset($row_Products['admin_id'])) {
    header('Location: index.php');
    exit;
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<h1>Backend Interface</h1>
<a href="be_inserts.php"><button class="add-new-ittem-button" type="button">Add New Items</button></a>
<table width="100%">
    <tr class="border_bottom">
        <td><strong>Active</strong></td>
        <td><strong>Image</strong></td>
        <td><strong>Productname</strong></td>
        <td><strong>Price</strong></td>
        <td><strong>SKU</strong></td>
        <td><strong>Short_description</strong></td>
        <td><strong>Category</strong></td>
        <td><strong>Description</strong></td>
        <td><strong>Edit</strong></td>
    </tr>
    <?php do { ?>
    <tr>
        <td><?php echo $row_allProducts['Active']; ?></td>
        <td>
            <img width=100 height=100 src="../Images/<?php echo $row_allProducts['photo']; ?>" />
        </td>
        <td><?php echo $row_allProducts['Productname']; ?></td>
        <td><?php echo $row_allProducts['Price']; ?></td>
        <td><?php echo $row_allProducts['SKU']; ?></td>
        <td><?php echo $row_allProducts['Short_description']; ?></td>
        <td><?php echo $row_allProducts['Category']; ?></td>
        <td><?php echo substr($row_allProducts['description'], 0, 100); ?>....</td>
        <td><a href="../send/be_delete.php?product_id=<?php echo $row_allProducts['product_id']; ?>"
                onclick="return confirm('Are You Sure ?\rIt will delete the file Permanently!')">
                <button class="add-new-ittem-button" type="button">Delete</button></a>
            <br />
            <a href="../admin/be_update.php?product_id=<?php echo $row_allProducts['product_id']; ?>">
                <button class="add-new-ittem-button" type="button">Update</button></a>
        </td>
    </tr>
    <?php } while ($row_allProducts = mysqli_fetch_assoc($allProducts)); ?>
</table>