<?php

include 'dataaccess/QuestionBundleDAO.php';
 $dao = new QuestionBundleDAO();
 
 if(isset($_POST["save"])){
 	echo $dao->add($_POST["questionBundleId"],$_POST["title"],$_POST["type"],$_POST["technology"],$_POST["date"]);
 }
 else if(isset($_POST["update"])){
 	echo $dao->update($_POST["questionBundleId"],$_POST["title"],$_POST["type"],$_POST["technology"],$_POST["date"]);
 }
 else if(isset($_POST["sureDelete"])){
 	echo $dao->delete($_POST["questionBundleId"],$_POST["title"]);
 }
 
	
	else if(isset($_GET["a"])){
		
		if($_GET["a"]=="list"){
 		echo $dao->getList();
		}
		else if($_GET["a"]=="select" && isset($_GET["id"])){
			echo $dao->getById($_GET["id"]);
		}else if(isset($_POST["save"])){
			echo "Post Request is received title"+$_POST["title"]+",type="+$_POST["type"];
		}
/* 		else if($_GET["a"]=="add"  && isset($_GET["data"])){
			echo $dao->add($_GET["data"]);
		}
		else if($_GET["a"]=="update" && isset($_GET["id"])&& isset($_GET["data"])){
			echo $dao->update($_GET["id"],$_GET["data"]);
		}
		else if($_GET["a"]=="update" && isset($_GET["id"])){
			echo "Post request received title = "." get ".$_GET['title'];//$dao->update($_GET["id"],$_GET["data"]);
		}
		else if($_GET["a"]=="delete" && isset($_GET["id"])){
			echo $dao->delete($_GET["id"]);
		}
 */		else if($_GET["a"]=="user"){
			//$json = $jsonDataList;//'[{"userName":"admin","password":"admin"},{"userName":"ak","password":"admin"}]';
			$user = '{"userName":"admin","password":"admin"}';
			echo $user;
		}
		
	}else{
		include "commands.php";
	}

?>