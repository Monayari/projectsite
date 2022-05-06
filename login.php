<?php
session_start();
include_once('user.php');
include_once('Filter.php');

$user= new User();
$filter= new Filter();

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($filter->filter_empty($username) || $filter->filter_empty($password)){
		
			$_SESSION['message']="لطفا فيلدهاي خالي را تكميل نماييد";
						header('location:index.php');

}
else{
  $auth = $user->Login($username, $password);

  if ($auth==''){
		$_SESSION['message'] = 'نام کاربری یا رمز عبور صحیح نمی باشد';
    	header('location:index.php');
	}
 
	else {
		$_SESSION['username'] = $auth;
		header('location:add-edit.php');
	}
	
}
		

	 

}


	

		

	 




	
	










?>