<?php
include "DataAccess.php";
include "GenericDAO.php";
include "util/JSONConverter.php";
include "util/CSVConverter.php";

class LogDAO implements GenericDAO {
	private $tableName=" etl_log ";
	private $metaQuery = "SELECT COLUMN_NAME, DATA_TYPE, IS_NULLABLE, COLUMN_DEFAULT FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'etl_log'";
	function  getList(){
		$dataAccess = new DataAccess();
		$query="select * from ".$this->tableName." order by job_id desc limit 10";
		$result = $dataAccess->getResult($query);
		return $result;

	}
	function  getCsvList(){
		$dataAccess = new DataAccess();
		$query="select job_id,etl_job from ".$this->tableName." where status='new'";
		
		$result = $dataAccess->getResult($query);
		$columnNames = $dataAccess->getResult($this->metaQuery." and COLUMN_NAME IN ('job_id','etl_job')");
		
		$csv = new CSVConverter();
		return $csv->getCsvCustomList($columnNames, $result);
	}
	function  getListByJobId($jid){
		$dataAccess = new DataAccess();
		$query="select * from ".$this->tableName." where job_id=".$jid;
		$result = $dataAccess->getResult($query);
		$num_rows = mysql_num_rows($result);
	
		$columnNames = $dataAccess->getResult($this->metaQuery);
	
		return $result;
	
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
	function  add($data){
	
		try{
			$query="insert into ".$this->tableName.$data;
			$id = $this->executeQuery($query);
		}catch (exception $e){
			return $e->getMessage();
		}
		return "Log Saved Successfully jid="+$id;
	}
	function  update($jid,$data){
			try{
				$query="update ".$this->tableName ." set ".$data." where job_id=".$jid;
				$this->executeQuery($query);
			}catch (exception $e){
				return $e->getMessage();
			}
			return "ETL Log Updated Successfully";
	}
	function  delete($id){
	
		try{
		$query="delete from ".$this->tableName ."where questionId=".$id;
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