<?php
include_once('connect.php');

class User extends Dbconnection
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function Login($username,$password)
	{
		$sql="SELECT * FROM users WHERE username=:username and password=:password";
		$q=$this->connection->prepare($sql);
		$q->execute(array(':username'=>$username,':password'=>$password));
		$data=$q->fetch(PDO::FETCH_ASSOC);
		
		return $data['id'];
//return true;
		
	}
	
	
	public function details($sql)
	{
		$query=$this->connection->query($sql);
		
		$row=$query->fetch(PDO::FETCH_ASSOC);
		
		return $row;
	}
	
	 public function showAll($table,$userid){
$data=array();
		$sql="SELECT * FROM $table where fk_user=".$userid;
		$q = $this->connection->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){

			$data[]=$r;
		}
	 return $data;
	 
	 }

	/* public function showAll($table){

		$sql="SELECT * FROM $table where";
		$q = $this->connection->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){

			$data[]=$r;
		}
	 return $data;
	 
	 }*/
	 public function getById($id,$table){

		$sql="SELECT * FROM $table WHERE id= :id";
		$q = $this->connection->prepare($sql);
		$q->execute(array(':id'=>$id));
		$data = $q->fetch(PDO::FETCH_ASSOC);

	 return $data;
	 }
	 	 public function checkEmail($email){

			$sql="SELECT * FROM users WHERE email = :email";
			$q = $this->connection->prepare($sql);
			$q->execute(array(':email'=>$email));
			$data = $q->fetch(PDO::FETCH_ASSOC);

if($data >0){
				return true;
			}else{
				return false;
			}

		 }
	  
	  public function updatetoken($id,$token)
	  {
		  $sql="SELECT UPDATE users SET token=$token   WHERE id = :id";
			$q = $this->connection->prepare($sql);
			$q->execute(array(':id'=>$id));
			

			
	  }
public function getCunt($id)

{
	
	$sql="SELECT count(*) from customer";
    $q = $this->connection->prepare($sql);
    $q->execute(array(':id'=>$id));
	$data=$q->rowCount();
	return $data;
}
	 
	  function getSex($id){
		  $name  = "";
		  switch($id){
			 case 0:
			 $name = "ใๆไห";
			 break;
			 case 1:
			 $name = "ใะ฿ั";
			}
		 return $name;	 
	 }
	 
	    function getType($id){
		  $name  = "";
		  switch($id){
			 case 0:
			 $name = "วัศั";
			 break;
			 case 1:
			 $name = "ใิสัํ";
			}
		 return $name;	 
	 }
	 
	  public function deleteData($id){
		 
		$sql="DELETE FROM customer WHERE id=:id";
		$q = $this->connection->prepare($sql);
		$q->execute(array(':id'=>$id));
 
		return true;
	 }
	 	 	 public function updateData($id,$name,$family,$phone,$email,$address,$age,$type,$gender){
	 
		$sql = "UPDATE customer SET name=:name,family=:family,phone=:phone,email=:email,address=:address,age=:age,type=:type,gender=:gender WHERE id=:id";
		$q = $this->connection->prepare($sql);
		$q->execute(array(':id'=>$id,':name'=>$name,':family'=>$family,':phone'=>$phone,':email'=>$email,':address'=>$address,':age'=>$age,':type'=>$type,':gender'=>$gender));
		
			 $con = $q->rowcount();
			 if($con==1){
		return true;
			 }
			 else{
				 return false;
			 }
	 }
	 
	 public function insertData($name,$family,$phone,$email,$address,$age,$type,$gender,$fk_user){
	 
		$sql = "INSERT INTO `customer`( `name`, `family`, `phone`, `email`, `address`, `age`, `type`, `gender`,`fk_user`)  VALUES(:name,:family,:phone,:email,:address,:age,:type,:gender,:fk_user)";
		$q = $this->connection->prepare($sql);
		$q->execute(array(':name'=>$name,':family'=>$family,':phone'=>$phone,':email'=>$email,':address'=>$address,':age'=>$age,':type'=>$type,':gender'=>$gender,':fk_user'=>$fk_user));
$con = $q->rowcount();

if($con==1){

   return true;
}
else{
return false;
			 }
			

	  }

	 	 public function updateuser($id,$username,$password,$fname,$mobile){
	 
		$sql = "UPDATE users SET `username`=:username,`password`=:password,`fname`=:fname,`mobile`=:mobile WHERE `id`=:id";
		$q = $this->connection->prepare($sql);
		$q->execute(array(':id'=>$id,':username'=>$username,':password'=>$password,':fname'=>$fname,':mobile'=>$mobile));
		
			 $con = $q->rowcount();
			 if($con==1){
		return true;
			 }
			 else{
				 return false;
			 }
	 }

 public function insertuser($username,$password,$fname,$email,$mobile,$typy,$status){
	    
		$sql =" INSERT INTO `users`( `username`, `password`, `fname`, `email`, `mobile`, `typy`, `status`)  VALUES(:username,:password,:fname,:email,:mobile,:typy,:status)";
		$q = $this->connection->prepare($sql);
		$q->execute(array(':username'=>$username,':password'=>$password,':fname'=>$fname,':email'=>$email,':mobile'=>$mobile,':typy'=>$typy,':status'=>$status));
			 $con = $q->rowcount();
			 if($con==1){
        return true;
			 }
			 else{
             return false;
			 }
 }
}



 







?>