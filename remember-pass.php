<?php
include_once('connect.php');
include_once('Email.php');
include_once('user.php');
$error="";
$mail= new Email();
$user= new User();

if(isset($_POST['sendemail']))
{
	
	$email=$_POST['email'];
	$code=md5(uniqid(true));
	echo $code;
	if($user->checkEmail($email))
	{
echo $email;

		$user->updatetoken('id',$code);
		$text="you reset is: http://localhost:remember-pass?token=$code";
	if($mail->Sendemail("reset passwor",$text,$email))
		{
			echo $text;
			header('location:index.php');
            $_SESSION['message']="ایمیل ارسال شد";
		}
		else{
               $_SESSION['message']=" ایمیل ارسال نشد";
		}
	
	}
else{
		$_SESSION['message']="ایمیل وجود ندارد";
	}


}
else
{
	$_SESSION['message']= "oxh";
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

    <title>بازیابی رمزعبور </title>
</head>
<body>

    <div class="d-flex justify-content-center">
    <div class="container-fluid z-header">
                        <!-- شروع منو  -->
                        <div class="row">
                            <nav class="navbar navbar-expand-lg">
                                    <ul class="navbar-nav text-white d-flex justify-content-center align-items-center">
                                        <li class="nav-item">
                                           
                                            <a class="nav-link ml-lg-3" href="index.php"> <i class="fa fa-home align-middle"></i> خروج از سایت </a>
                                        </li>
                                        
                                       
                                    </ul>
                            </nav>
                        </div>
                         <!-- پایان منو  -->
        
        <div class="row">
            <div class="col-lg-12"></div>
        </div>
    </div>
    <div class="container z-sub-header">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-5">
               
                    <div class="card z-card p-2 mt-2 shadow" style="height: 300px;">
                        <div class="card-header border-0  text-center">
                            <h5 class="card-title" style="color: #13adb5;">بازیابی رمز عبور  </h5>
                            <h6 class="card-title" style="font-size: 13px;"> </h6>
                        </div>
                     <div class="card-body btn-index mt-5">
                         <form method="POST" action="remember-pass.php">
                         <label> بازیابی رمزعبور </label>
                         <input  type="text" class="form-control plcehold" name="email" placeholder="ایمیل یا شماره موبایل">


                        </div>
                        <div class="card-footer bg-light border-0 float-left d-flex">
                         <input type="submit" name="sendemail" value="send"
						 class="btn btn-info text-white mr-auto px-4 mb-0" >   

                           
                        </div>


                    </div>
                                                                   </form>
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
               <!--شروع مودال -->
               <div class="modal fade" id="my-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-white mx-auto">
                            <div class="modal-title">
                            <i class="fa fa-check-circle-o text-success" style="font-size: 35px; font-weight: 200;"></i>

                            </div>
                        </div>
					
	
                        <div class="modal-body text-center text-success">

                        </div>
                        <div class="modal-footer">
                            <button class="close text-danger" data-dismiss="modal"> &times; </button>
                        </div>
                    </div>
                </div>
             </div>
             <!--پایان مودال -->
</body>
</html>