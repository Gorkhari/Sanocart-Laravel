<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="http://nicesnippets.com/demo/jsCarousel-2.0.0.js" type="text/javascript"></script>
    <link href="CSS/Product_slider.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>
<?php
include ('config.php');
mysqli_select_db($con, 'temp');
$query_Products = "SELECT * FROM product WHERE Active = 'Yes'";
$Products = mysqli_query($con, $query_Products) or die(mysqli_error($con));
$row_Products = mysqli_fetch_assoc($Products);
$totalRows_Products = mysqli_num_rows($Products);
?>
<div id="product-slider">
<?php do { ?>
    <div class="product-box">
        <div class="products_thumb_image">
            <img width=270 height=300 src="images/<?php echo $row_Products['photo']; ?>" />
        </div>
        <div class="product-desc">
            <div class="products_thumb_productname">
                <?php echo $row_Products['Productname']; ?>
            </div>
            <div class="products_thumb_productprice">
                $<?php echo $row_Products['Price']; ?>
            </div>
        </div>
    </div>
    <?php } while ($row_Products = mysqli_fetch_assoc($Products)); ?>
</div>

</html>
var slidePosition = 0,
    numOfSlide = $(".slide").length,
    currentSlide = Math.floor(numOfSlide / 2),
    slideWidth = $(".slide").outerWidth(true);

moveSlide(currentSlide);
$(".slide-" + currentSlide).addClass("active");

$(".slide-container").css("width", numOfSlide * slideWidth);

$(".previous").click(function(){
  
  $(".slide-" + currentSlide).removeClass("active");
  if ((currentSlide - 1) >= 0) {
    currentSlide--;
  } else {
    currentSlide = (numOfSlide - 1);
  }
  $(".slide-" + currentSlide).addClass("active");
  
  moveSlide(currentSlide);
  
});

$(".next").click(function(){
  
  $(".slide-" + currentSlide).removeClass("active");
  if ((currentSlide + 1) < numOfSlide) {
    currentSlide++;
  } else {
    currentSlide = 0;
  }
  $(".slide-" + currentSlide).addClass("active");
  
  moveSlide(currentSlide);
  
});

function moveSlide(slideNumber) {
  var slidePosition = -1 * (slideNumber * slideWidth);
  $(".slide-container").css({"transform":"translateX("+ slidePosition +"px)"});
}

