<?php


	if(isset($_GET["s"])){
				
			include "service/".trim($_GET["s"])."_service.php";		
		
	}else{include "commands.php";}

?>