<?php 
$action = (isset($_GET['action'])?$_GET['action']:'');
$path ='view/contents/home.php';
if($action=='OrderService'){
	$path='src/com/bitguiders/businesslayer/OrderService.php';
}else if($action=='SecurityService'){
	$path='src/com/bitguiders/businesslayer/SecurityService.php';
}else if($action=='bpos'){
	$path ='view/contents/bpos.php';
}else if(isset($_SESSION['userId'])){
	header("location:?action=bpos");
}

include $path;
?>