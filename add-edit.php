<?php
include_once('user.php');
include_once('connect.php');
session_start();


if(!isset($_SESSION['username']))
{
	header('location:index.php');
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
 <!-- <a href="menu.html"></a> -->
    <title>افزودن و ویرایش مشتریان </title>
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
                    
                        <h6 class="card-title p-2 text-center mt-2" style="color: #13adb5; font-size: 27px;">  مشتریان </h6>
                       
                    <div class="card-body border-0">
                        <button class="btn btn-primary rounded " style="background-color: #1784D9; font-size: 13px;"> <a href="signin-customer.php"> کاربر جدید </a> </button>
                       <hr>
                       <div class="">
                           <table class="table table-bordered table-responsive-lg">
                               <thead>
                                <tr>
                               <th> شماره </th>
                                <th> نام </th>
                                <th> نام خانوادگی</th>
                                <th> شماره تماس </th>
                                <th> ایمیل</th>
                                <th> آدرس </th>
								<th> سن </th>
								<th> نوع کاربری</th>
								<th>جنسیت</th>
								<th>دستورات</th>
                            </tr>
                               </thead>
                               <tbody class="fild-customer">
                                <tr class="roww">

			
			
			

                                    
								
								
			<?php
			
			$user = new User();
			$customer = $user->showAll("customer",$_SESSION['username']);
			foreach($customer as $customer){ ?>
			
			
                                <tr>
                                    <td>  <?php echo $customer['id'];?> </td>
                                    <td>  <?php echo $customer['name'];?> </td>
                                    <td>  <?php echo $customer['family'];?> </td>
                                    <td>  <?php echo $customer['phone'];?></td>
                                    <td>  <?php echo $customer['email'];?> </td>
                                    <td>  <?php echo $customer['address'];?> </td>
                                    <td>  <?php echo $customer['age'];?> </td>
                                    <td>  <?php echo $user->getType($customer['type']);?> </td>
                                    <td>  <?php echo $user->getSex($customer['gender']);?> </td>

                                    <td> 
                                        <a class="btn rounded" style="font-size: 12px; background-color: #25c3e6; color: #fff;" href="pro-cust.php?prof=<?php echo $customer['id'];?>">
                                             <i class="fa fa-user align-middle"  style="font-size: 14px !important;"></i> نمایش پروفایل </a> 

                                       <a class="btn rounded" style="font-size: 12px; background-color: #25c3e6; color: #fff;" href="Delete.php?delete=<?php echo $customer['id'];?>">
 
                                            <i class="fa fa-trash align-middle"  style="font-size: 14px !important;"></i> حذف </a> 

                                        <!-- <div class="modal fade" id="modal">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                     <div class="modal-body">
                                                        <p> میخواهید فیلد را حذف کنید؟ </p> 
                                                    </div> -->
                                                    <!-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"> بستن </button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>    
                                        <a class="btn btn-success rounded" style="font-size: 12px; color: #fff;" href="edit-customer.php?edit=<?php echo $customer['id'];?>">
                                             <i class="fa fa-edit align-middle"  style="font-size: 14px !important;"> </i> ویرایش </a>    
                                    </td>
                                </tr> 
                                      
                                        <!-- <div class="modal fade" id="modal">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                     <div class="modal-body">
                                                        <p> میخواهید فیلد را حذف کنید؟ </p> 
                                                    </div> -->
                                                    <!-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"> بستن </button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>    
    
                                    </td>
                                </tr>
			<?php }?>
                               </tbody>
                           </table>
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
             <div class="card-footer shadow" style="font-size: 14px;">&copy;
                 تمامی حقوق سایت محفوظ است.
             </div>
         </div>
      </div> 
</div>

         <!--فووتر-->
        
        </div>
    </div>
    </div>
</body>
</html>