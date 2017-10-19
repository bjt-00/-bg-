<?php


	if(isset($_GET["s"])){
				
			include "service/".trim($_GET["s"])."_service.php";	
			if(isset($_GET['p'])){
				header("location: ".$_GET["p"].".php");
			}
		
	}else{include "commands.php";}

?>