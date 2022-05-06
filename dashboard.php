
<?php
include_once('connect.php');
include_once('user.php');
include_once('login.php');
 //session_start();

if(isset($_SESSION['username']))
{
	$user= new User();
	$sql="SELECT * FROM users WHERE id='".$_SESSION['username']."'";
	$row=$user->details($sql);
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
<script src="js/myscript.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>داشبورد</title>
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
        
       
    </div>
    <div class="container z-sub-header z-s-h-min">
        <div class="row">
            <div class="col-lg-12">
                <div class="card z-card p-2 mt-2 shadow border-0">
             
                    <div class="card-header border-0 text-center">
                        <h6 class="card-title" style="color: #13adb5; font-size: 19px;"> اطلاعات کاربری </h6>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <img class="rounded-pill" src="img/user.png" style="width: 120px; height: 120px;">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-around my-lg-4 my-3" style="font-size: 14px; font-weight: 500;">
                            <div class="col-lg-4  d-flex justify-content-center">
                                <span class="text-info"> نام : </span>
                                <span><?php echo $row['fname']; ?>  </span>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-center my-3">
                                <span class="text-info"> نام کاربری : </span>
                                <span> <?php echo $row['username']; ?> </span>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-center">
                                <span class="text-info"> شماره موبایل : </span>
                                <span><?php echo $row['mobile']; ?> </span>
                            </div>
                            </div>
                            <div class="row" style="font-size: 14px; font-weight: 500;">
                                <div class="col-lg-6 d-flex justify-content-center mb-3">
                                <span class="text-info"> ایمیل : </span>
                                <span><?php echo $row['email']; ?> </span>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-center align-items-center" >
                                    <a class="btn btn-info mb-0" style="font-size: 14px;" href="add-edit.php">  تعداد مشتریان : : <strong><?php echo $user->getCunt($row['id']);?></strong> </a> 
                                </div>
      
                            </div>                    
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
    <script src="js/myscript.js"></script>
</body>
</html>