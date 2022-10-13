<?php
include ('../config.php');

?>
<html>
<body>

<h1>Choose date</h1>

<form action="booking.php" method="post">
  <label for="name">Full name:</label>
  <input type="text" id="name" name="name"><br>
  <label for="name">Email:</label>
  <input type="email" id="email" name="email"><br>
  <label for="date">Event Date:</label>
  <input type="date" id="date" name="date"><br>
  <label for="time">Choose a time:</label>
  <select name="time" id="time">
    <option value="Morning">Morning</option>
    <option value="Evening">Evening</option>
  </select><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>