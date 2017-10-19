<?php

 include 'dataaccess/LogDAO.php';
 $dao = new LogDAO();

	if(isset($_GET["a"])){
		
		if($_GET["a"]=="list" && isset($_GET["jid"])){
			echo $dao->getListByJobId($_GET["jid"]);
		}
		else if($_GET["a"]=="list"){
 		echo $dao->getCsvList();
		}
		else if($_GET["a"]=="select" && isset($_GET["id"])){
			echo $dao->getById($_GET["id"]);
		}
		else if($_GET["a"]=="add"  && isset($_GET["user_id"])){
			$data = " (user_id,domain,etl_job,operation) 
					VALUES ('".$_GET['user_id']."','".$_GET['domain']."','".$_GET['etl_job']."','".$_GET['operation']."')";
				
			echo $dao->add($data);
		}
		else if($_GET["a"]=="update" && isset($_GET["jid"])&& isset($_GET["status"])){
			$data = " status='".$_GET["status"]."', end_time=CURRENT_TIMESTAMP";
			echo $dao->update($_GET["jid"],$data);
		}
		
		else if($_GET["a"]=="delete" && isset($_GET["id"])){
			echo $dao->delete($_GET["id"]);
		}
			
	}else{include "commands.php";}

?>