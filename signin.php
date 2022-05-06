<?php
include_once('connect.php');
include_once('user.php');
include_once('Filter.php');
session_start();



/*if(isset($_SESSION['username']))
{
	header('location:index.php');
	$_SESSION['message']="شما قبلا ثبت نام کرده اید";
}*/

$user=new User();
$filter = new Filter();



if(isset($_POST['submit']))
	{
		if($user->checkEmail($_POST['email']))
{
	$_SESSION['message']="شما قبلا ثبت نام کرده اید";
	
}
else{
		$name=$_POST['name'];
		$username=$_POST['username'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		
		$pass=$_POST['password'];
        $pass1= $_POST['repetpassword'];
		
		if ($filter->filter_empty($name) || $filter->filter_empty($username)){
		
			$_SESSION['message']="لطفا فيلدهاي خالي را تكميل نماييد";
}
		else if(!$filter->filter_email($email)){
			
		$_SESSION['message']="ایمیل معتبر نیست";
			
		}
		
			else if($pass!=$pass1)
			{
				$_SESSION['message']="تکرار رمز عبور نادرست است";
			}
		else{
			$result = $user->insertuser($username,$pass,$name,$email,$mobile,'1','1');
			if(!$result){

				$_SESSION['message']="عملیات ناموفق";
				header("location:signin.php");
			}
			else{
				

$_SESSION['message']= "ثبت با موفقیت انجام شد";
header("location:add-edit.php");
				
			    }
	
		
	
	



		}
		}
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-rtl.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title> ثبتنام </title>
</head>
<body>

    <div class="d-flex justify-content-center">
    <div class="container-fluid z-header">
        <div class="row">
            <div class="col-lg-12"></div>
        </div>
    </div>
    <div class="container z-sub-header">
        <div class="row">
            <div class="col-lg-12">
               
                <div class="card z-card p-2 mt-2 shadow t">
                    
                        <h6 class="card-title p-2 text-center mt-2" style="color: #13adb5; font-size: 27px;"> ثبتنام </h6>
                       
                   
                    <div class="card-body">
                        <!-- <button class="btn btn-primary rounded " style="background-color: #1784D9; font-size: 13px;"> کاربر جدید </button> -->
                       <hr>
                       <p id="errr" class="text-danger"></p>
                       <p id="errrr" class="text-danger"></p>
                       
                        <form class="mt-5 mb-3" name="myForm" method="POST"action="signin.php">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                 <div class="form-group custom-control">
                                <label> نام :</label>
                                <input type="text" class="form-control fname" name="name">
                            </div>    
                                </div>
                                <div class="col-12 col-lg-6">
                                   <div class="form-group custom-control">
                                <label> نام کاربری :</label>
                                <input type="text" class="form-control user"  name="username">
                            </div> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-6">
                                 <div class="form-group custom-control">
                                <label> ایمیل :</label>
                                <input name="email" type="email" class="form-control email-u">
                            </div>    
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group custom-control">
                                 <label> کلمه عبور :</label>
                                 <input type="password" name="password" class="form-control" id="pass1">
                             </div> 
                                 </div> <div class="col-12 col-lg-6">
                                    <div class="form-group custom-control">
                                 <label> تکرار کلمه عبور :</label>
                                 <input type="password" name="repetpassword" class="form-control" id="pass2">
                             </div> 
                                 </div><div class="col-12 col-lg-6">
                                    <div class="form-group custom-control">
                                 <label> شماره همراه:</label>
                                 <input type="text" class="form-control" placeholder="98+"  name="mobile" id="phone">
                             </div> 
                                 </div>
                            </div>
                            <div class="float-left">
                                <input type="submit" class="btn btn-success rounded" value="ثبت اطلاعات" name="submit" class="add-edit" style="font-size: 13px;" type="button" onclick="check()"  data-target="#myModal" data-toggle="modal">
                                     
                              
                                <button class="btn btn-danger rounded" style="font-size: 13px;" > <a href="index.php"> انصراف </a> </button></div>
                            </div>
        
                        </form>
													  <?php
		    	if(isset($_SESSION['message'])){
		    		?>
		    			<div>
					        <?php echo $_SESSION['message']; ?>
							
					    </div>
		    		<?php

		    		unset($_SESSION['message']);
		    	}
		    ?>
                        <p class="text-danger" id="err">  </p> 

                </div>
            
            </div>
        </div>
    </div>
    </div>

    <!-- مودال -->
    <!-- <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-white mx-auto">
                    <div class="modal-title">
                    <i class="fa fa-check-circle-o text-success" style="font-size: 35px; font-weight: 200;"></i>

                    </div>
                </div>
                <hr>
                <div class="modal-body text-center text-success">
                    ثبتنام شما با موفقیت انجام شد !
                </div>
                <div class="modal-footer">
                    <button class="close text-danger" data-dismiss="modal"> &times; </button>
                </div>
            </div>
        </div>
     </div> -->

    <!-- مودال -->

    <script src="js/myscript.js">
    </script>

</body>
</html>