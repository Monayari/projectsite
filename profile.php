<?php
include_once('user.php');
include_once('connect.php');
session_start();

$user= new User();
if(!isset($_SESSION['username']))
{
		header('location:index.php');
}
	
	$sql="SELECT * FROM users WHERE id='".$_SESSION['username']."'";
	$row=$user->details($sql);

if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$username=$_POST['username'];
		$mobile=$_POST['mobile'];
	
		$oldpass=$_POST['oldpass'];
		$newpass=$_POST['newpass'];
		$repetpass=$_POST['repetpass'];
$newpass=$repetpass;
if($newpass==''){
	$newpass==$row['password'];
}
		$result = $user->updateuser($_SESSION['username'],$username,$newpass,$name,$mobile);
		
			if($result==""){
				
				$_SESSION['message']= "اطلاعات آپدیت نشد";
				header("location:profile.php");
			}
			else{
				
header("location:add-edit.php");
				
			    }
	}
if(isset($_SESSION['username']))
{
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

    <title>پروفایل </title>
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
                    <h5 class="card-title"><i class="fa fa-edit align-middle"></i> ویرایش اطلاعات  </h5>
                    </div>
                    <!-- card  -->
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card my-3 mr-2">
                                <div class="card-header text-center border-0" style="background-color: #13adb5;">
                                    <p class="card-title text-white" style="font-size: 14px;"> <i class="fa fa-id-badge align-middle"></i> پروفایل شما   </p>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <img src="img/user.png" style="width: 150px; height: 200px;">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="card border-0 my-3 ml-2">
                                <div class="card-body bg-light d-flex justify-content-center ">
                                    <form class="col-sm-6">
                                        <div class="form-group">
                                            <label class=""> نام : </label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $row['fname']; ?>">
                                        </div>
                                        <div class="form-group">
                                          <label class=""> نام کاربری : </label>
                                          <input type="text" name="username"  class="form-control " value="<?php echo $row['username']; ?>">
                                       
                                        </div>
                                        <div class="form-group">
                                             <label class=""> شماره موبایل : </label>
                                             <input type="text" name="mobile" class="form-control " value="<?php echo $row['mobile']; ?>">
                                      
                                        </div>
                                        <div class="form-group">
                                             <label class=""> تصویر شما: </label>
                                            <input type="file"  class="">  
                                        </div>
                                        <p class="text-danger"> اگر میخواهید کلمه عبور را تغییر دهید فیلد زیر را پر کنید! </p>
                                        <div class="form-group">
                                            <label class=""> کلمه عبور قدیمی : </label>
                                            <input type="text" name="oldpass" class="form-control ">
                                     
                                       </div>
                                       <div class="form-group">
                                        <label class=""> کلمه عبور جدید : </label>
                                        <input type="text" name="newpass" class="form-control ">
                                 
                                   </div>
                                   <div class="form-group">
                                    <label class="">تکرار کلمه عبور جدید : </label>
                                    <input type="text" name="repetpass" class="form-control ">
                               </div>
							    <div class="justify-content-end d-flex ml-2 bg-light">
                                    <input type="submit" name="submit" class="col-sm-3 btn btn-success rounded float-left"> 
    
                                </div>
                                    </form>
<?php }	?>
				
			

			
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

                        </div>

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