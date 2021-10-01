<?php 

	require_once "common.class.php";
	class Item extends Common{
		protected $id, $name, $rate, $quantity,$status, $created_by, $updated_by,$created_at,$updated_at;
		function create(){
			$sql = "INSERT INTO tbl_items (name,rate,quantity,status,created_by,created_at) VALUES('$this->name','$this->rate','$this->quantity','$this->status','$this->created_by','$this->created_at')";
			return $this->insert($sql);
		}
		function remove(){
			$sql = "DELETE FROM tbl_items WHERE id = '$this->id'";
			return $this->delete($sql);
		}
		function edit(){
			$sql = "UPDATE tbl_items SET  name='$this->name',rate='$this->rate',quantity='$this->quantity',status='$this->status',updated_by='$this->updated_by',updated_at='$this->updated_at' WHERE id='$this->id'";
			return $this->update($sql);		
		}
		function list(){
			$sql = "SELECT i.*,u.name as uname FROM tbl_items AS i JOIN tbl_user AS u ON i.created_by = u.id";
			return $this->select($sql);
			
		}

		function getItemById(){
			$sql = "SELECT i.*,u.name as uname FROM tbl_items AS i JOIN tbl_user AS u ON i.created_by = u.id WHERE i.id = '$this->id'";
			return $this->select($sql);
		}

		function listItems(){
			$sql = "SELECT i.*,u.name as uname FROM tbl_items AS i JOIN tbl_user AS u ON i.created_by = u.id WHERE status='1'";
			return $this->select($sql);
			
		}

	}

?>