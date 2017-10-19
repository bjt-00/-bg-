 <?php 
   class DataAccess{

   	
   	public $host = "thesuffahorg.netfirmsmysql.com";
   	public $user ="ak";
   	public $password  ="<sFIn@16>;";
   	public $db   ="bpos";

   	/*
   	public $host = "localhost";
   	public $user ="root";
   	public $password  ="";
   	public $db   ="bpos";
 */
   	 function dbConnect(){
   		// initialize parameters
   		
   		
   		// connect to database
   		$db_connection = mysql_connect($this->host,$this->user,$this->password) or die("Connection failed");
   		mysql_select_db($this->db,$db_connection);
   		return $db_connection;
   	}
   	
   	function getResult($query){
   		$db_connection = $this->dbConnect();
   		$result=mysql_query($query,$db_connection); 
   		return $result; 
   	}
   	function executeQuery($query){
   		$db = new mysqli ($this->host,$this->user,$this->password,$this->db);
   		$result = $db->query($query);
   		return $db->insert_id;
  	}
 
   }
 ?>