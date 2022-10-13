<?php 
include ('../config.php');
include ('pos-products-call.php');
?>
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
      $("#search").click(function() {
        $("#here").show();
        var x = $(this).val();
        $.ajax({
          type: 'GET',
          url: 'pos-cart-page-ajax.php',
          data: x,
          success: function(data) {
            $("#here").html(data);
            
           },
        });
      });
    });
  </script>