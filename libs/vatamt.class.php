<?php 

	require_once "common.class.php";
	class Vatamt extends Common{
		protected $id, $value, $created_by, $updated_by,$created_at,$updated_at;
		function create(){
			$sql = "INSERT INTO tbl_settings (value,created_by,created_at) VALUES('$this->value','$this->created_by','$this->created_at')";
			return $this->insert($sql);
		}
		function remove(){
			$sql = "DELETE FROM tbl_settings WHERE id = '$this->id'";
			return $this->delete($sql);
		}
		function edit(){
			$sql = "UPDATE tbl_settings SET  value='$this->value',updated_by='$this->updated_by',updated_at='$this->updated_at' WHERE id='$this->id'";
			return $this->update($sql);	
		}
		function list(){
			$sql = "SELECT i.*,u.name as uname FROM tbl_settings AS i JOIN tbl_user AS u ON i.created_by = u.id";
			return $this->select($sql);
			
		}

		function getstaffById(){
			$sql = "SELECT i.*,u.name as uname FROM tbl_settings AS i JOIN tbl_user AS u ON i.created_by = u.id WHERE i.id = '$this->id'";
			return $this->select($sql);
		}

		function liststaff(){
			$sql = "SELECT i.*,u.name as uname FROM tbl_settings AS i JOIN tbl_user AS u ON i.created_by = u.id WHERE status='1'";
			return $this->select($sql);
			
		}

	}

?>