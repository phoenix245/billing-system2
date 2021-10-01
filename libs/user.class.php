<?php 

require_once "common.class.php";
class User extends Common{

	protected $id,$name,$username,$password;

	public function login(){
		$this->connect();
		$sql = "SELECT * FROM tbl_user WHERE username = '$this->username' AND password = '$this->password' ";
		$result = $this->connection->query($sql); 
		// print_r($result);
		if($result->num_rows == 1){
			$data = $result->fetch_object();
			session_start();
			$_SESSION['id'] = $data->id;
			$_SESSION['name'] = $data->name;
			$_SESSION['email'] = $data->email;
			$_SESSION['image'] = $data->image;
			$_SESSION['role_id'] = $data->role_id;
			$_SESSION['role_name'] = $data->rname;

			header('location:dashboard.php');
			
		} else{
			return false;
		}
	}

	function create(){

	}

	function remove(){
		
	}

	function edit(){
		
	}

	function list(){
		
	}
}



?>
