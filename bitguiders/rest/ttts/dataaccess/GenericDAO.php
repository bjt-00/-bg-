<?php

interface  GenericDAO {
	
	function  getList();
	function  getById($id);
	function  add($data);
	function  update($id,$data);
	function  delete($id);
	
		
}
?>