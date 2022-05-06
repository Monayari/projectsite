<?php

include_once('connect.php');
include_once('user.php');
include_once('Filter.php');
session_start();
//include_once('login.php');
if(isset($_SESSION['username'])){
	
$user=new User();
$filter = new Filter();
if(isset($_POST['submit']))
	{
	
		$name=$_POST['name'];
		$family=$_POST['family'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$age=$_POST['age'];
		$type=$_POST['type'];
		$address=$_POST['address'];
		
		if ($filter->filter_empty($name) || $filter->filter_empty($family)){
		
			$_SESSION['message']="لطفا فيلدهاي خالي را تكميل نماييد";
}
		else if(!$filter->filter_email($email)){
			
		$_SESSION['message']="ایمیل معتبر نیست";
			
		}
		
		else{
			$result = $user->insertData($name,$family,$mobile,$email,$address,$age,$type,$gender,'1');
			if(!$result){

				$_SESSION['message']="عملیات ناموفق";
				header("location:signin-customer.php");
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

    <title> افزودن مشتری </title>
</head>
<body>

    <div class="d-flex justify-content-center">
    <div class="container-fluid z-header">
                   <!-- شروع منو -->
                   <div class="row">
           
                    <nav class="col-12 navbar navbar-expand-sm text-dark navbar-dark" style="background-color: #13adb5;">
                        <button class="navbar-toggler text-white" data-toggle="collapse" data-target="#zari">
                            <span class="navbar-toggler-icon text-white "></span>
                        </button>
        
                           <div class="collapse navbar-collapse" id="zari">
                            <ul class="navbar-nav text-white d-flex justify-content-center align-items-center">
                                <li class="nav-item">
                                   
                                    <a class="nav-link ml-lg-3 text-white" href="index.php"> <i class="fa fa-home align-middle"></i> صفحه اصلی </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-lg-3 text-white" href="dashboard.php"> <i class="fa fa-vcard-o align-middle"></i>  داشبورد </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-lg-3 text-white" href="add-edit.php"> <i class="fa fa-users align-middle"></i>  مشتریان </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-lg-3 text-white" href="profile.php">  <i class="fa fa-id-badge align-middle"></i> پروفایل </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-lg-3 text-white" href="logout.php">  <i class="fa fa-window-restore align-middle"></i> خروج از سایت </a>
                                </li>
                            </ul>
                           </div>
          
                    </nav>
        
                </div>
                    <!-- پایان منو -->
        
        <div class="row">
            <div class="col-lg-12"></div>
        </div>
    </div>
    <div class="container z-sub-header">
        <div class="row">
            <div class="col-lg-12">
               
                <div class="card z-card p-2 mt-2 shadow">
                    
                        <h6 class="card-title p-2 text-center mt-2" style="color: #13adb5; font-size: 27px;"> افزودن مشتری </h6>
                       
                   
                    <div class="card-body">
                        <!-- <button class="btn btn-primary rounded " style="background-color: #1784D9; font-size: 13px;"> کاربر جدید </button> -->
                       <hr>
                        <form class="mt-5 mb-3" method="POST" action="signin-customer.php">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                 <div class="form-group custom-control">
                                <label> نام :</label>
                                <input type="text" class="form-control" name="name">
                            </div>    
                                </div>
                                <div class="col-12 col-lg-6">
                                   <div class="form-group custom-control">
                                <label> نام خانوادگی :</label>
                                <input type="text" class="form-control" name="family">
                            </div> 
                                </div>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <div class="col-12 col-lg-6">
                                 <div class="form-group custom-control">
                                <label> شماره موبایل :</label>
                                <input type="text" class="form-control" name="mobile">
                            </div>    
                                </div>
                                 <div class="col-12 col-lg-6">
                                <div class="form-group custom-control">
                             <label> ایمیل: </label>
                             <input type="email" name="email" class="form-control pass">
                         </div> 
                             </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group custom-control">
                                 <label> جنسیت </label>
                                 <select class="custom-select" name="gender">
                                     <option value="0"> زن </option>
                                     <option value="1"> مرد </option>
                                 </select>
                             </div> 
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group custom-control">
                             <label> سن: </label>
                             <input type="text" name="age" class="form-control pass">
                         </div> 
                             </div>
                             <div class="col-12 col-lg-6">
                                <div class="form-group custom-control">
                             <label> نوع کاربری: </label>
                             <input type="text" name="type" class="form-control pass">
                         </div> 
                             </div>
                             <div class="col-12 col-lg-6">
                                <div class="form-group custom-control">
                             <label> ادرس: </label>
                             <input type="text" name="address" class="form-control pass">
                         </div> 
                             </div>

                            
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="btn btn-success rounded ml-2" name="submit"value="ثبت اطلاعات" style="font-size: 13px;" type="submit" onclick="check()">
                                    

                                <a class="btn btn-danger rounded" style="font-size: 13px;" href="add-edit.php"> انصراف </a></div>
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
                </div>
            
            </div>
        </div>
    </div>
   
    </div>
    <script src="js/myscript.js"></script>
</body>
</html>