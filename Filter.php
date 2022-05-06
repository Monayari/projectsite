<?php

include_once('connect.php');
include_once('user.php');

class Filter
{
	    private $errors = array();
	public function filter_empty($data)
	{
		$data=trim($data);
		if(empty($data))
		{
			return true;
		}
		return false;
	}
	
	public function filter_email($email){

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}
}

public function repeat_email($email){
	$user= new User();
	$sql = $user->checkEmail($email);
	
	return $sql;
}
}







?>