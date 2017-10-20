<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>bitguiders ::: How To..?</title>
		<?php include"view/structure/imports.php" ;?>
	</head>
	<body>
		<!-- Header -->
		<?php include"view/structure/header.php" ;?>
		
		<!-- Page Content -->
		<div class="Body">
		   <div class="row">
			<div class="col-lg-12">
			<br>
			<?php 
			if(isset($_GET['training'])){
			include"view/contents/training/how-to/".$_GET['training'].".php";
			}else{
				include"view/contents/training/training.php";
			}
			?>
			</div>
			</div>
		 </div>
				
		 <!-- Footer -->
		<?php include"view/structure/footer.php" ;?>
	</body>
</html>
