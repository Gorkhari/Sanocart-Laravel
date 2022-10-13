<?php
include('../config.php');
include('../session_start.php');
include('../call/user_detail_call.php');
?>
<?php
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: index.php');
  exit;
}
?>

<head>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
  <link href="../CSS/style.css" rel="stylesheet" type="text/css" />
  <link href="../CSS/pos.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="../JS/script.js"> </script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<div class="pos-header">
</div>


<div class="pos-search">
  <div class="search-header">
    <div class="search-header">
      <form>
        <input type="search" name="search" id="search" autofocus="autofocus">
      </form>
      <div id="here">
      </div>
    </div>
  </div>
  </div>
        <!--ajax search-->
  <script>
    $(document).ready(function(e) {
      $("#search").keyup(function() {
        $("#here").show();
        var x = $(this).val();
        $.ajax({
          type: 'GET',
          url: 'pos-search.php',
          data: 'q=' + x,
          success: function(data) {
            $("#here").html(data);
            
           },
        });
      });
    });
  </script>
  <div class="pos-main-body">
    <div class="pos-main-body-container">
      <!--Left side of POS-->
      <div class="pos-left">
        <?php include("pos-product-display.php"); ?>
        
      </div>

      <!--Right side of POS-->
      <div class="pos-right">
        <?php include("pos-cart.php"); ?>
      </div>
    </div>
  </div>
 