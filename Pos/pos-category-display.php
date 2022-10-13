<?php 
include('../config.php');
include('pos-category-call.php');
?>
<head>
    
</head>
<?php do { ?>
 <a class="dropdown-item " href="../categories-details-call.php?Category=<?php echo $row_category['cat_name'];?>"><?php echo $row_category['cat_name']; ?></a>
             <?php } while ($row_category = mysqli_fetch_assoc($category)); ?>
             </div>
             
