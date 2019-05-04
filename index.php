<!-- http to https converter -->
<?php 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

if($protocol=="http://"){
    $protocol="https://";
    
$uri = $_SERVER['REQUEST_URI'];
//echo ' 1>> '.$uri; // Outputs: URI


$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//echo ' 2>> '.$url; // Outputs: Full URL

$query = $_SERVER['QUERY_STRING'];
//echo ' 3>> '.$query; // Outputs: Query String
header('Location: '.$url);
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>bitguiders ::: reforming bits</title>
		<?php include"view/structure/imports.php" ;?>
	</head>
	<body>
		<!-- Header -->
		<?php include"view/structure/header.php" ;?>
		
		<!-- Page Content -->
		  <div class="Body">
			  <div class="col-lg-2">
			  	<?php include"view/contents/events.php" ;?>
			  </div>
			  <div class="col-lg-8">
			  	<?php include"view/contents/home.php" ;?>
			  </div>
			   <div class="col-lg-2">
			   	<?php include"view/contents/rightSlide.php" ;?>
			   </div>
		</div>
		
		 <!-- Footer -->
		<?php include"view/structure/footer.php" ;?>
	</body>
</html>
