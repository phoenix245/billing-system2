<?php 

require_once "object.php";
if ($_GET['id']) {
	$staff->set('id',$_GET['id']);
	$data=$staff->remove();
	header("Location:liststaff.php");
	if (count($data) == 0) {
		header("liststaff.php");
	}
} else{
	header("liststaff.php");
}

?>