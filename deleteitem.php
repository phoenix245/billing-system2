<?php 

require_once "object.php";
if ($_GET['id']) {
	$item->set('id',$_GET['id']);
	$data=$item->remove();
	header("Location:listitem.php");
	if (count($data) == 0) {
		header("listitem.php");
	}
} else{
	header("listitem.php");
}

?>