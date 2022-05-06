<?php

include_once "connect.php"; 

 include_once "Filter.php"; 
  
  
	$user = new User();
	$filter = new Filter();
	
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$file = "";
		
		$row = $user->getById($id,"customer");
		if(!empty($row)){
				$file = $row['file'];
		}
		
		if (file_exists($file)) {
					unlink($file);
		}
		
		$user->deleteData($id);
		
		echo "حذف با موفقیت انجام شد";

		header("location: add-edit.php");	   
		
	}












?>