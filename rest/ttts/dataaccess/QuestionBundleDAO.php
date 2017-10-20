<?php
//include "DataAccess.php";
//include "GenericDAO.php";
//include "util/JSONConverter.php";
include "QuestionDAO.php";

class QuestionBundleDAO  {
	private $tableName=" question_bundle ";
	private $metaQuery = "SELECT COLUMN_NAME, DATA_TYPE, IS_NULLABLE, COLUMN_DEFAULT FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'question_bundle'";
	function  getList(){
		$dataAccess = new DataAccess();
		$query="select * from ".$this->tableName;
		$result = $dataAccess->getResult($query);
		$num_rows = mysql_num_rows($result);
		
		$columnNames = $dataAccess->getResult($this->metaQuery);
		
		$json = new JSONConverter();
		return $json->getJsonList($columnNames, $result);

	}
	function  getById($id){
	
		$dataAccess = new DataAccess();
		$query="select * from ".$this->tableName ."where questionBundleId=".$id;
		$result = $dataAccess->getResult($query);
		$num_rows = mysql_num_rows($result);
	
		$columnNames = $dataAccess->getResult($this->metaQuery);
	
		$json = new JSONConverter();
		return $json->getJsonObject($columnNames, $result);
	
	}
	function  add($id,$title,$type,$technology,$date){
	
		try{
		$data = "(questionBundleId,title,type,technology,date,totalQuestions)"
					." VALUES(0,'" .  $_POST["title"]. "','" .  $_POST["type"]. "','" .  $_POST["Technology"]. "','" .  $_POST["Date"]. "',(SELECT count(*) FROM question WHERE questionBundleId =".$id."))";
						
			$query="insert into ".$this->tableName.$data;
			$this->executeQuery($query);
		}catch (exception $e){
			return $e->getMessage();
		}
		return "Question Bundle ".$title." Saved Successfully";
	}
	
	function  update($id,$title,$type,$technology,$date){
			try{
				$data = "title='". $title."', type='".$type. "', technology='". $technology."', date='" . $date."', totalQuestions= (SELECT count(*) FROM question WHERE questionBundleId =".$id.")";
				
				$query="update ".$this->tableName ." set ".$data." where questionBundleId=".$id;
				$this->executeQuery($query);
			}catch (exception $e){
				return $e->getMessage();
			}
			return "Question Bundle ".$title." Updated Successfully";
	}
	
	function  delete($questionBundleId,$title){
	
		try{
		//delete childs
		$questionDAO = new QuestionDAO();	
		$questionDAO->deleteByQuestionBundleId($questionBundleId);
		
		$query="delete from ".$this->tableName ."where questionBundleId=".$questionBundleId;
		$this->executeQuery($query);
		}catch (exception $e){
			return $e->getMessage();
		}
		return "Question Bundle ".$title." Deleted Successfully";
	}
	
	function executeQuery($query){
		$dataAccess = new DataAccess();
		$dataAccess->executeQuery($query);
	}
		
}
?>