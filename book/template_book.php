<?php
require_once('../config.php');
include("../book/get_date_book.php");
?>

<html>
<body>

<h1>Update page</h1>
<div class="form_template">
<form action="update_booking.php" method="post">
    <input name="book_id" type="hidden" id="book_id" value="<?php echo $row_book['book_id']; ?>" />
  <label for="name">Full name:</label>
  <input type="text" id="name" name="name" value="<?php echo $row_book['name']; ?>"><br>
  <label for="date">Event Date:</label>
  <input type="date" id="date" name="date" value="<?php echo $row_book['date']; ?>"><br>
  <label for="time">Choose a time:</label>
  <select name="time" id="time">
      <b><option selected="selected">
                   <?php echo $row_book['time']; ?>
                </option></b>
    <option value="Morning">Morning</option>
    <option value="Evening">Evening</option>
  </select><br>
  <input type="submit" value="Submit">
</form>
</div>
</body>
</html>