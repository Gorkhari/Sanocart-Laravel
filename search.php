<?php require_once('config.php'); ?>
<?php
Include ('session_start.php');
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: registration-form-login.php');
	exit;	
}?>
<?php include ('main_header.php');  ?>
<html>
    <head>
    <link href="CSS/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<div class="main-body-container">
  <div class="main-wide-container">
  <h2>Your Search Results: <?php echo $query = $_GET['query'];?></h2>
<?php
	$query = $_GET['query']; 
	
	// gets value sent over search form
	
	$min_length = 3;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		
		$query = mysqli_real_escape_string($con, $query);
		// makes sure nobody uses SQL injection
		
		$raw_results = mysqli_query($con, "SELECT * FROM product
			WHERE (`Productname` LIKE '%".$query."%') OR (`SKU` LIKE '%".$query."%')") or die(mysqli_error($con));
			
		// * means that it selects all fields, you can also write: `id`, `title`, `text`
		// articles is the name of our table
		
		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		
		if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysqli_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			                do { ?>
                    <div class="products_thumb">
                    <a href="product_detail.php?id=<?php  echo $results['product_id']; ?>">
                 
                       <div class="products_thumb_image">
                 <img width = 270 height = 300 src = "Images/<?php echo $results['photo']; ?>"  />
              </div>
                 <div class="products_thumb_productname">
                 <?php echo $results['Productname']; ?>
              </div>
                 <div class="products_thumb_productprice">
                 $<?php echo $results['Price']; ?>
              </div>             
              </a> </div> 
                     <?php } while ($results = mysqli_fetch_assoc($raw_results)); ?>
                 </a>
                 </div>
                 <?php



				// posts results gotten from database(title and text) you can also show id ($results['id'])
			}
			
		}
		else{ // if there is no matching rows do following
			echo "No results";
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
	}
    ?>
	</div>
	</div>
    <?php
include ('footers/footer.php');
?>