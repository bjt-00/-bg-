<?php
include "DataAccess.php";
include "GenericDAO.php";
include "util/JSONConverter.php";
include "util/QuestionParser.php";

class QuestionDAO {//implements GenericDAO {
	private $tableName=" question ";
	private $metaQuery = "SELECT COLUMN_NAME, DATA_TYPE, IS_NULLABLE, COLUMN_DEFAULT FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'question'";
	function  getList(){
		$dataAccess = new DataAccess();
		$query="select * from ".$this->tableName;
		$result = $dataAccess->getResult($query);
		$num_rows = mysql_num_rows($result);
		
		$columnNames = $dataAccess->getResult($this->metaQuery);
		
		$json = new JSONConverter();
		return $json->getJsonList($columnNames, $result);

	}
	function  getListByQuestionBundleId($id){
		$dataAccess = new DataAccess();
		$query="select * from ".$this->tableName." where questionBundleId=".$id;
		$result = $dataAccess->getResult($query);
		$num_rows = mysql_num_rows($result);
	
		$columnNames = $dataAccess->getResult($this->metaQuery);
	
		$json = new JSONConverter();
		return $json->getJsonList($columnNames, $result);
	
	}
	function  getById($id){
	
		$dataAccess = new DataAccess();
		$query="select * from ".$this->tableName ."where questionId=".$id;
		$result = $dataAccess->getResult($query);
		$num_rows = mysql_num_rows($result);
	
		$columnNames = $dataAccess->getResult($this->metaQuery);
	
		$json = new JSONConverter();
		return $json->getJsonObject($columnNames, $result);
	
	}
	function  add($questionBundleId,$question,$type,$options){
	
		try{
			$parser = new QuestionParser();
			$data = "(questionId,questionBundleId,question,type,options)"
	." VALUES(0,".$questionBundleId.",'". $parser->parse($question). "','".$type."','".$parser->parse($options)."')";
		
			$query="insert into ".$this->tableName.$data;
			$id = $this->executeQuery($query);
			
			//update question bundle total count
			//$query = "update question_undle set totalQuestions =(SELECT count(*) FROM question WHERE questionBundleId =(select questionBundleId from question where questionId=".$id."))";
			//$this->executeQuery($query);
		}catch (exception $e){
			return $e->getMessage();
		}
		return "Question Saved Successfully";
	}
	function   update($questionId,$question,$type,$options){
			try{
				$data = "question='". $question."', type='".$type. "', options='". $options."' WHERE questionId =".$questionId;
				
				$query="update ".$this->tableName ." set ".$data." where questionId=".$questionId;
				$this->executeQuery($query);
			}catch (exception $e){
				return $e->getMessage();
			}
			return "Question Updated Successfully";
	}
	function  delete($questionId,$question){
	
		try{
		$query="delete from ".$this->tableName ."where questionId=".$questionId;
		$this->executeQuery($query);
		}catch (exception $e){
			return $e->getMessage();
		}
		return $question." Deleted Successfully";
	
	}
	function  deleteByQuestionBundleId($questionBundleId){
	
		try{
			$query="delete from ".$this->tableName ."where questionBundleId=".$questionBundleId;
			$this->executeQuery($query);
		}catch (exception $e){
			return $e->getMessage();
		}
		return "Question Deleted Successfully";
	
	}
	
	function executeQuery($query){
		$dataAccess = new DataAccess();
		return $dataAccess->executeQuery($query);
	}
		
}
?>