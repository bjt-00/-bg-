<?php if(isset($_SESSION["errors"])) {?>
		<div class="alert alert-danger fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  			<strong>Oops!</strong> <?php echo (isset($_SESSION["errors"])?$_SESSION["errors"]:'');?>
		</div>
<?php unset($_SESSION["errors"]); }?>

<?php if(isset($_SESSION["warning"])) {?>
<div class="alert alert-warning">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Warning!</strong> <?php echo (isset($_SESSION["warning"])?$_SESSION["warning"]:'');?>
</div>
<?php unset($_SESSION["warning"]); }?>

<?php if(isset($_SESSION["info"])) {?>
<div class="alert alert-info">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Info!</strong> <?php echo (isset($_SESSION["info"])?$_SESSION["info"]:'');?>
</div>
<?php unset($_SESSION["info"]);}?>

<?php if(isset($_SESSION["message"])) {?>
<div class="alert alert-success">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Success!</strong> <?php echo (isset($_SESSION["message"])?$_SESSION["message"]:'');?>
</div>
<?php unset($_SESSION["message"]); }?>
