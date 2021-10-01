<?php 

	require_once "common.class.php";
	class Staff extends Common{
		protected $id, $name, $rate, $quantity,$status, $created_by, $updated_by,$created_at,$updated_at;
		function create(){
			$sql = "INSERT INTO tbl_staff (name,email,address,status,phone,created_by,created_at) VALUES('$this->name','$this->email','$this->address','$this->status','$this->phone','$this->created_by','$this->created_at')";
			return $this->insert($sql);
		}
		function remove(){
			$sql = "DELETE FROM tbl_staff WHERE id = '$this->id'";
			return $this->delete($sql);
		}
		function edit(){
			$sql = "UPDATE tbl_staff SET  name='$this->name',email='$this->email',address='$this->address',phone='$this->phone',status='$this->status' WHERE id='$this->id'";
			return $this->update($sql);		
		}
		function list(){
			$sql = "SELECT i.*,u.name as uname FROM tbl_staff AS i JOIN tbl_user AS u ON i.created_by = u.id";
			return $this->select($sql);
			
		}

		function getstaffById(){
			$sql = "SELECT i.*,u.name as uname FROM tbl_staff AS i JOIN tbl_user AS u ON i.created_by = u.id WHERE i.id = '$this->id'";
			return $this->select($sql);
		}

		function liststaff(){
			$sql = "SELECT i.*,u.name as uname FROM tbl_staff AS i JOIN tbl_user AS u ON i.created_by = u.id WHERE status='1'";
			return $this->select($sql);
			
		}

	}

?>