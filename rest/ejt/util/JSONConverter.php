<?php
class JSONConverter {
	
	
	function getJsonList($columnNames,$result){
		
		$colNames = array();
		while($column = mysql_fetch_object($columnNames)){
			$colNames[] = $column->COLUMN_NAME;
		}
		$totalColumns = count($colNames);
		
		$num_rows = mysql_num_rows($result);
		
		$count=0;
		
		$jsonDataList="[";
		while($bundle = mysql_fetch_object($result)){

			$jsonDataList .="{";
			for($i=0;$i<$totalColumns;$i++){
					
				$colName =$colNames[$i];
			$jsonDataList .=$colName.":\"".$bundle->$colName."\"";
			$jsonDataList .=($i!=$totalColumns-1?",":"");
			}
			$jsonDataList .="}";
				
			$count++;
			$jsonDataList .=($count!=$num_rows?",":"");
		}
		$jsonDataList .="]";
		//$questionBundlesList = "[{\"userName\":\"admin\",\"password\":\"admin\"},{\"userName\":\"user\",\"password\":\"user\"},{\"userName\":\"waqas\",\"password\":\"waqas\"}]";
		
		/*
		$json = $jsonDataList;//'[{"userName":"admin","password":"admin"},{"userName":"ak","password":"admin"}]';
		
		$obj = json_decode($json);
		for($i=0;$i<count($obj);$i++){
		print $obj[$i]->{'title'}."<br>"; // 12345
		}
		*/
		return $jsonDataList;
	}
	function  getJsonObject($columnNames,$result){
	
		$colNames = array();
		while($column = mysql_fetch_object($columnNames)){
			$colNames[] = $column->COLUMN_NAME;
		}
		$totalColumns = count($colNames);
	
		$num_rows = mysql_num_rows($result);
	
		$count=0;
	
		$jsonDataList="";
		while($bundle = mysql_fetch_object($result)){
	
			$jsonDataList .="{";
			for($i=0;$i<$totalColumns;$i++){
					
				$colName =$colNames[$i];
				$jsonDataList .=$colName.":\"".$bundle->$colName."\"";
				$jsonDataList .=($i!=$totalColumns-1?",":"");
			}
			$jsonDataList .="}";
	
			$count++;
			$jsonDataList .=($count!=$num_rows?",":"");
		}
		return $jsonDataList;
	}
	
	
}
?>