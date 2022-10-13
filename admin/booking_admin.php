<?php
include ('../config.php');

mysqli_select_db($con, 'temp');
$query_book = "SELECT * FROM booking";
$book = mysqli_query($con, $query_book);
$row_book = mysqli_fetch_assoc($book);
$totalRows_book = mysqli_num_rows($book);
?>

<html lang="en">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="http://nicesnippets.com/demo/jsCarousel-2.0.0.js" type="text/javascript"></script>
  <title>Booking list</title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <table class="table table-striped">
    <thead>
      <tr>
         <th>No.</th>
         <th>Book_id</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Date</th>
        <th>Time</th>
        <th>Approval</th>
        <th>Submit</th>
      </tr>
    </thead>
<?php
$item_count = 1;

do { ?>
    <tbody>
      <tr>
        <td><?php echo $item_count ?></td>
        <td name='book_id' id="book_id<?php echo $row_book['book_id'];?>" value="<?php echo $row_book['book_id'];?>" ><?php echo $row_book['book_id'];?></td>
        <td name="name" id="name<?php echo $row_book['book_id'];?>" value="<?php echo $row_book['name'];?>"><?php echo $row_book['name'];?></td>
         <td name="email" id="email<?php echo $row_book['book_id'];?>" value="<?php echo $row_book['email'];?>"><?php echo $row_book['email'];?></td>
        <td><?php echo $row_book['date']; ?></td>
        <td><?php echo  $row_book['time']; ?></td>
        <td>
<select name="approve" id="approve<?php echo $row_book['book_id'];?>">
   <option selected="default"><?php echo  $row_book['approve']; ?></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
    </select>
        </td>
        <td>
            <input name="fname" type="hidden" id="fname<?php echo $row_book['book_id'];?>" value="<?php echo $row_book['name'];?>" />
             <input name="femail" type="hidden" id="femail<?php echo $row_book['book_id'];?>" value="<?php echo $row_book['email'];?>" />
           <input type="submit" class="addToCart" name="button" id="<?php echo $row_book['book_id'];?>" value="Submit" />
        </td>
      </tr>
    </tbody>
    
    <?php 
    $item_count++;
    
    } while ($row_book = mysqli_fetch_assoc($book)); ?>
  </table>
 

</body>
</html>

<script>
$(document).ready(function(){
    $('.addToCart').click(function()
    {
        var x = $(this).attr('id');
        console.log(x);
        var approve = $('#approve' + x).val(); 
        var fname = $('#fname' + x).val();
        var femail = $('#femail' + x).val();
        
        console.log(approve);
        console.log(fname);
        console.log(femail);
   
        $.ajax({
            url: '../book/admin_update.php',
            type: 'POST',
            data: { approve:approve, book_id:x, name:fname, email:femail },
            success: function(data)
            {
                window.alert("Done");
            }
        })
        
    });
});

</script>
