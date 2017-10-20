<?php
class CSVConverter {
	
	function getCsvCustomList($columnNames,$result){
	
		$colNames = array();
		while($column = mysql_fetch_object($columnNames)){
			$colNames[] = $column->COLUMN_NAME;
		}
		$totalColumns = count($colNames);
	
		$num_rows = mysql_num_rows($result);
	
		$count=0;
	
		$csvDataList="";
		while($bundle = mysql_fetch_object($result)){
	
			for($i=0;$i<$totalColumns;$i++){
					
				$colName =$colNames[$i];
				$csvDataList .=$bundle->$colName;
				$csvDataList .=($i!=$totalColumns-1?",":"");
			}
	
			$count++;
			$csvDataList .=($count!=$num_rows?";":"");
		}
		return $csvDataList;
	}
	
	function getCsvList($columnNames,$result){
		
		$colNames = array();
		while($column = mysql_fetch_object($columnNames)){
			$colNames[] = $column->COLUMN_NAME;
		}
		$totalColumns = count($colNames);
		
		$num_rows = mysql_num_rows($result);
		
		$count=0;
		
		$csvDataList="";
		while($bundle = mysql_fetch_object($result)){

			for($i=0;$i<$totalColumns;$i++){
					
				$colName =$colNames[$i];
			$csvDataList .=$colName.":\"".$bundle->$colName."\"";
			$csvDataList .=($i!=$totalColumns-1?",":"");
			}
			$csvDataList .=";";
				
			$count++;
			$csvDataList .=($count!=$num_rows?",":"");
		}
		return $csvDataList;
	}
	function  getCsvObject($columnNames,$result){
	
		$colNames = array();
		while($column = mysql_fetch_object($columnNames)){
			$colNames[] = $column->COLUMN_NAME;
		}
		$totalColumns = count($colNames);
	
		$num_rows = mysql_num_rows($result);
	
		$count=0;
	
		$csvDataList="";
		while($bundle = mysql_fetch_object($result)){
	
			for($i=0;$i<$totalColumns;$i++){
					
				$colName =$colNames[$i];
				$csvDataList .=$colName.":\"".$bundle->$colName."\"";
				$csvDataList .=($i!=$totalColumns-1?",":"");
			}
			$csvDataList .=";";
	
			$count++;
			$csvDataList .=($count!=$num_rows?",":"");
		}
		return $csvDataList;
	}
	
	
}
?>