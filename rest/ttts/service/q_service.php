<?php

include 'dataaccess/QuestionDAO.php';
 $dao = new QuestionDAO();
 
 if(isset($_POST["save"])){
 	//echo $dao->add($_POST["questionBundleId"],$_POST["question"],$_POST["type"],$_POST["options"]);
     for ($i = 0; $i < count($_POST['optionsList']); $i++)
 	{
 	    echo $i.'>> '.$_POST['optionsList'][$i]."  = ".$_POST['_optionsList'][$i].' ';
 	}
 	
 }
 else if(isset($_POST["update"])){
 	
 	
 			for ($i = 0; $i < count($_POST['optionsList']); $i++)
 			{
 				echo $_POST['optionsList'][$i]."=".$_POST['_optionsList'][$i]."-".$i;
 			}
 		//echo $dao->update($_POST["questionId"],$_POST["question"],$_POST["type"],$_POST["options"]);
 }
 else if(isset($_POST["sureDelete"])){
 	echo $dao->delete($_POST["questionId"],$_POST["question"]);
 }
 
	else if(isset($_GET["a"])){
		
		if($_GET["a"]=="list" && isset($_GET["id"])){
			echo $dao->getListByQuestionBundleId($_GET["id"]);
		}
		else if($_GET["a"]=="list"){
 		echo $dao->getList();
		}
		else if($_GET["a"]=="select" && isset($_GET["id"])){
			echo $dao->getById($_GET["id"]);
		}
		/* else if($_GET["a"]=="add"  && isset($_GET["data"])){
			echo $dao->add($_GET["data"]);
		}
		else if($_POST["a"]=="add"){
			echo $dao->add($_POST["data"]);
		} */
		else if($_GET["a"]=="update" && isset($_GET["id"])&& isset($_GET["data"])){
			echo $dao->update($_GET["id"],$_GET["data"]);
		}
		else if($_POST["a"]=="update" && isset($_POST["id"])&& isset($_POST["data"])){
			echo $dao->update($_POST["id"],$_POST["data"]);
		}
		else if($_GET["a"]=="delete" && isset($_GET["id"])){
			echo $dao->delete($_GET["id"]);
		}
				
	}else{include "commands.php";}

?>