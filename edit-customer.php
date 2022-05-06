<?php
include_once('connect.php');
include_once('user.php');
session_start();
$user= new User();
$error='';
if(isset($_GET['edit']))
{
	$id=$_GET['edit'];
	$row = $user->getById($id,"customer");
				//if(!empty($row)){
				
				


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
<script src="js/myscript.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>ویرایش اطلاعات مشتری </title>
</head>
<body>
    <div class="d-flex justify-content-center">
    <div class="container-fluid z-header z-h-min">
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
    <div class="container z-sub-header z-s-h-min">
        <div class="row">
            <div class="col-lg-12">
               
                <div class="card z-card p-2 mt-2 shadow border-0">
                    <div class="card-header text-center border-0" style="color: #13adb5;"> 
                    <h5 class="card-title"><i class="fa fa-edit align-middle"></i> ویرایش اطلاعات کاربر </h5>
                    </div>
                    <!-- card  -->
                    <div class="row">
                        <div class="col-lg-12">
                             <!-- <div class="col-lg-3"> -->
                            <!-- <div class="card my-3 mr-2">
                                <div class="card-header text-center border-0" style="background-color: #13adb5;">
                                    <p class="card-title text-white" style="font-size: 14px;"> <i class="fa fa-id-badge align-middle"></i> پروفایل کاربر   </p>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <img src="img/user.png" style="width: 150px; height: 200px;">
                                </div>
                            </div> -->
                        <!-- </div> -->
                        <!-- <div class="col-lg-9"> -->
                            <div class="card border-0 my-3 ml-2">
                                <div class="card-body bg-light d-flex justify-content-center ">
                                    <form class="col-sm-6" method="POST" action="edit-customer.php">
                                        <div class="form-group">
                                            <label class=""> نام : </label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label class=""> نام خانوادگی: </label>
                                          <input type="text" name="family"  class="form-control" value="<?php echo $row['family']; ?>">
                                       
                                        </div>
                                        <div class="form-group">
                                             <label class=""> شماره موبایل : </label>
                                             <input type="text" name="mobile"  class="form-control "value=" <?php echo $row['phone']; ?>">
                                      
                                        </div>
                                        <div class="form-group">
                                             <label class=""> ایمیل: </label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ; ?>">  
                                        </div>
                                        <div class="form-group">
                                            <label class=""> جنسیت : </label>
                                            <select class="custom-select" name="gender">
                                                <option value="0"> زن </option>
                                                <option value="1"> مرد </option>
                                            </select>
                                                
                                       </div>
                                       <div class="form-group">
                                        <label class=""> سن : </label>
                                        <input type="text" name="age" class="form-control " value="<?php echo $row['age']; ?>">
                                 
                                   </div>
                                   <div class="form-group">
                                    <label class="">نوع کاربری: </label>
                                    <input type="text" name="type" class="form-control " value="<?php echo $user->getType($row['type']);?>">
                               </div>
                               <div class="form-group">
                                <label class="">ادرس: </label>
                                <input type="text" name="address" class="form-control " value="<?php echo $row['address']; ?>">
								                                <input type="hidden" name="id" class="form-control " value="<?php echo $row['id']; ?>">

								</div>
<div class="justify-content-end d-flex ml-2 bg-light">
                                    <input type="submit" name="submit" value="ویرایش " class=" col-sm-3 btn btn-success rounded float-left">
                                </form> 
                                </div>
                                   
    <?php 
}
				else{
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
	
			$result = $user->updateData($_POST['id'],$name,$family,$mobile,$email,$address,$age,$type,$gender);
			if(!$result){
				
				$_SESSION['message']= "اطلاعات آپدیت نشد";
				//header("location:edit-customer.php");
			}
			else{
				
header("location:add-edit.php");
				
			    }
	}
				}
?>
                                </div>
                                </div>
                        </div>
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
                    <!-- card  -->
                       
                </div>    
            </div>
        </div>
                            <!--فووتر-->            
                    <div class="col-lg-12 ftr"> 
                        <div class="container-fluid ">
    
                     <div class="card mt-5 border-0">
                         <div class="card-body border-0 d-flex justify-content-center">                        
                             <span class="btn rounded-pill d-flex justify-content-center align-items-center ml-1" style="font-size: 26px; background-color: #c7c7c7; color:#fff; width: 35px; height: 35px;">
                                 <i class="fa fa-instagram  align-middle "></i></span> 
    
                               <span class="btn rounded-pill d-flex justify-content-center align-items-center ml-1" style="font-size: 26px; background-color: #c7c7c7; color:#fff; width: 35px; height: 35px;"> 
                                  <i class="fa fa-twitter align-middle"></i></span>
    
                               <span class="btn rounded-pill d-flex justify-content-center align-items-center ml-1" style="font-size: 26px; background-color: #c7c7c7; color:#fff; width: 35px; height: 35px;">
                                  <i class="fa fa-facebook align-middle "></i></span> 
    
                                <span class="btn rounded-pill d-flex justify-content-center align-items-center ml-1" style="font-size: 26px; background-color: #c7c7c7; color:#fff; width: 35px; height: 35px;">
                                      <i class="fa fa-send align-middle "></i></span>
                         </div>
                         <div class="card-footer shadow" style="font-size: 14px;">
                             تمامی حقوق سایت محفوظ است.&copy;
                         </div>
                     </div>
                  </div> 
     </div>
         <!--فووتر-->
    
     </div>
    
     
            </div>
        </div>
        
    </div>
    </div>
    
    <script src="js/myscript.js"></script>

</body>
</html>