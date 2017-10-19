 <?php 
 global  $action;
   class UserBackingBean{
  	  
   	private $userId='default';
   	private $email;
   	private $password;
   	private $isActive=1;
   	private $sessionId;
   	private $isAdmin=false;
   	private $role;
   	
      	  //getter setters
    function getUserId(){
   	  	return $this->userId;
   	  }
  	  function getEmail(){
   	  	return $this->email;
   	  }
   	  function getPassword(){
   	  	return $this->password;
   	  }
   	  function isActive(){
   	  	return $this->isActive;
   	  }
   	  function isAdmin(){
   	  	return $this->isAdmin;
   	  }
   	  function isTrainee(){
   	  	return ($this->getRole()=='Trainee'?true:false);
   	  }
   	  function getRole(){
   	  	return $this->role;
   	  }
   	  
   	 function getUserName(){
   	 	$email = explode("@", $this->email);
   	 	return $email[0] ;
   	 }
	function getSessionId(){
		return $this->sessionId;
	}
   	function validate(){
   		$errors = (isset($_SESSION["errors"])?$_SESSION["errors"]:'');
/*    		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
   			$errors = $errors."<li class='Error'>Invalid Email ".$_POST['email']."</li>";
   		}
 */   		
        if($_POST['loginId']==''){
   			$errors = $errors."<li class='Error'>Password is required </li>";
   		}
   		if($_POST['password']==''){
   			$errors = $errors."<li class='Error'>Password is required </li>";
   		}
   		  		
   		if($errors!=''){
   		$_SESSION["errors"] = $errors;
   		}
   	}
   	function signIn(){
   		unset($_SESSION["errors"]);
   		$this->validate();
   		try{
   		if(!isset($_SESSION["errors"])){
 	   		$result = $this->getUser($_POST['loginId'],$_POST['password']);
	   		if(isset($result)&&$result!=null){
		   		while($user = mysql_fetch_object($result)){
		   			
		   			$_SESSION['userId'] = $user->user_id;
		   			$_SESSION['userName'] = $user->login_id;
		   			
		   			//$this->setUser($this->userId);
		   			
					//$_SESSION["UserBackingBean"] = serialize($this);
					$_SESSION["message"] = "Welcome ".$_SESSION["userName"];
					header("location: ?action=bpos");
		   		}
		   		//$_SESSION["errors"] = "No record found for given credentials";
		   		//header("location: ../../../../index.php");
	   		}else{
	   			$_SESSION["message"] = "No record found for given credentials";
	   			header("location: ../../../../index.php");
	   		}
	   		
			// Register $myusername, $mypassword and redirect to file "login_success.php"
			
   		}
   		 
   		}catch(Exception $e){
   			$_SESSION["errors"] = $e->getMessage();
   		}
   	}
   	function signOut(){
   		unset($_SESSION['userName']);
   		unset($_SESSION['userId']);
   		session_destroy();
   		header("location:?action=SecurityService");
   		//
   		//
   	}
   	function setUser($userId){
   	  	$this->userId = $userId;
   	  	
   	  	$result = $this->getUserById($userId);
   	  	while($user = mysql_fetch_object($result)){
   	  		$this->userId = $user->id;
   	  		$this->email = $user->email;
   	  		$this->password = $user->password;
   	  		$this->isActive = $user->is_active;
   	  		$this->role = $user->role;
   	  	}
   	  	
   	  }
   	  
   	  function getUserById($userId){
   	  	$query="select * from user where user_id=".$userId;
   	  	$result = $this->getResult($query);
   	  	return $result;
   	  }
   	  function getUserByEmail($email){
   	  
   	  	$query="select * from user where email='".$email."' ";
   	  	$dataAccess = new DataAccess();
   	  	$result = $dataAccess->getResult($query);
   	  	return $result;
   	  }
   	  function getUser($loginId,$password){
   	  	$loginId = str_replace("'"," ",$loginId);
   	  	$loginId = str_replace("="," ",$loginId);
   	  	$password = str_replace("'"," ",$password);
   	  	$password = str_replace("="," ",$password);
   	  		
   	  	$query="select * from user where login_id='".$loginId."' and password='".$password."'";
   	  	$result = $this->getResult($query);
   	  	return $result;
   	  }
   	  function deleteUser(){
  		$query="delete from user where password=".$_POST['orderCode'];
   	  	$this->executeQuery($query);
   	  }
   	  
     function signUp(){
     	try{
     		$result = $this->getUserByEmail($_POST['email']);
     		while($user = mysql_fetch_object($result)){
     			$_SESSION["errors"] = $_POST['email']." is already registered";
     		}
     	if(!isset($_SESSION['errors'])){	
   		$query = "INSERT INTO user (email,password) VALUES('".$_POST['email']."','".$_POST['password']."')";
   		$dataAccess = new DataAccess();
   		$dataAccess->executeQuery($query);
   		$this->email= $_POST['email'];
   		$_SESSION['errors']= '<b>'.$this->getUserName().' ! '.'السلام عليكم</b>'.'<br> Your account is created successfully<br>'."<a href=\"javascript:hideDiv('alertPopupDiv');showDiv('signInPopupDiv')\">Sign In Now </a>";
     	}
     	}catch(Exception $e){
     		echo $e->getMessage();
     	}
   	}     	  
   	function executeQuery($query){
   		$dataAccess = new DataAccess();
   		$dataAccess->executeQuery($query);
   	}
   	function getResult($query){
   		$dataAccess = new DataAccess();
   		$result = $dataAccess->getResult($query);
   		return $result;
   	}
   	
   }
 ?>