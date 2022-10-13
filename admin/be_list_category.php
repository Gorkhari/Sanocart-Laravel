<?php
include ('../call/categories_call.php');
include('../call/admin_detail_call.php');
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<h1>Backend Interface</h1>
<a href="add-category.php"><button class="add-new-ittem-button" type="button">Add New Items</button></a>
<table width="100%">
    <tr class="border_bottom">
        <td><strong>Active</strong></td>
        <td><strong>Image</strong></td>
        <td><strong>Category name</strong></td>
        <td><strong>Description</strong></td>
        <td><strong>Edit</strong></td>
    </tr>
    <?php do { ?>
    <tr>
        <td><?php echo $row_category['Active']; ?></td>
        <td>
            <img width=100 height=100 src="../Images/<?php echo $row_category['image']; ?>" />
        </td>
        <td><?php echo $row_category['cat_name']; ?></td>
        <td><?php echo $row_category['cat_description']; ?></td>
        <td><a href="../send/be_delete.php?product_id=<?php echo $row_category['cat_id']; ?>"
                onclick="return confirm('Are You Sure ?\rIt will delete the file Permanently!')">
                <button class="add-new-ittem-button" type="button">Delete</button></a>
            <br />
            <a href="../admin/be_category_update.php?cat_id=<?php echo $row_category['cat_id']; ?>">
                <button class="add-new-ittem-button" type="button">Update</button></a>
        </td>
    </tr>
    <?php } while ($row_category = mysqli_fetch_assoc($category)); ?>
</table>