<?php 
session_start();
error_reporting(0);
include('lib/connect.php'); 
if($_REQUEST['register']) 
{
	$name = $_REQUEST['fullName'];
	$email = $_REQUEST['email'];
	$mobile = $_REQUEST['mobile'];
	$address = $_REQUEST['address'];
	$pass = $_REQUEST['pass'];
	$conform_pass = $_REQUEST['conpass'];
	
	
	$select_query = mysql_query("SELECT * FROM register WHERE reg_mail = '$email'");
	$select_row = mysql_fetch_array($select_query);
	if($select_row>0)
	{
		$msg_error = "You Are Already a Register User";
	}
	else
	{
	//print_r($_REQUEST);
	
		if($pass == $conform_pass)
		{	
		$query = mysql_query("INSERT INTO register SET `reg_name` = '$name', `reg_mail` = '$email', `reg_mobile` = '$mobile', `reg_address` = '$address', `reg_pass` = '$pass'");
		
		if($query)
		{
			echo "Succesful";
		}
		else
		{
			echo "Not Done";
		}
		}
		else
		{
			$msg_error1 = "Password Does Not Match";
		}
	}
}



if($_REQUEST['login'])
{
	$user_name = $_REQUEST['log_username'];
	$password = $_REQUEST['log_pass'];
	
	$log_query = mysql_query("SELECT * FROM register WHERE reg_mail = '$user_name' AND reg_pass = '$password'");
	$log_row = mysql_fetch_array($log_query);
	if($log_row>0)
	{
		$msg1 = "Successfully Login...!!"; 
		echo "<script>window.location='view_member.php'</script>";
		$id = $log_row['reg_id'];
		$_SESSION['user_log'] = true;
		$_SESSION['user_id'] = $id;
		
	}
	else 
	{
		$error_log = "**User Name Or Password Does Not Match";
	}
	
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>pvault | Login/Register</title>
    
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/scrolltopcontrol.js">
	</script>
    
    
    
   

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	
	
    <!-- Navigation -->
    
    <?php include('include/header.php'); ?>

    <!-- Header Carousel -->
    <div class="main_slider">
   		 <?php include('include/banner1.php'); ?>
    </div>

    <!-- Page Content -->
    
    <!------About what we sction start----->
    <div class="about_whatwe_part" id="regnlog">
    	<div class="container">
        	<div class="about_whopartctrl">
        		
        		<div class="row">
                	<div class="col-lg-6 col-md-6 col-sm-6">
                    	<div class="who_we_bg">
                    		<h2 class="what_wedotitle">Register<span> With Us</span> </h2>
                        	<div class="whatw_dolargtxt">
                        	Please correct information<br/><br/>
                            <?php
								echo "<font color='blue'>".$msg_error1."</font>";
								echo "<font color='blue'>".$msg_error."</font>";
							?>
							<span>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" name="reg" id="reg">
                
                <input name="fullName" type="text" id="fullName" placeholder="Full Name" 
                style="margin:10px auto; color:#333" size="50" maxlength="50" required>
                
                <input name="email" type="email" size="50" maxlength="50" placeholder="E-mail" 
                style="margin:10px auto; color:#333" required>
                
                <input name="mobile" type="text" size="50" maxlength="50" placeholder="Mobile Number" 
                style="margin:10px auto; color:#333" required>
                
                 <input name="address" type="text" size="50" maxlength="50" placeholder="Address" 
                style="margin:10px auto; color:#333" required>
                
                <input name="pass" type="password" size="50" maxlength="50" placeholder="Password" 
                style="margin:10px auto; color:#333" required>
                
                <input name="conpass" type="password" size="50" maxlength="50" placeholder="Confrim Password" 
                style="margin:10px auto; color:#333" required>
                
                <p>
                 
                </p>
                
                  
                <input name="register" type="submit" value="Register" 
                style="color:#333; background-color:#FFF; border-color:transparent; padding:0 25px;">
                
                </form>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                    	<div class="about_us_bg">
                    	<h2 class="about_ustitle">Login <span>Prescription Vault</span></h2><br>
                        
                        <?php
							echo "<font color='#FF0000'>".$error_log."</font>";
						?>
                        
                        <div class="about_largtxt">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" name="login" id="login">
                            
                    <input name="log_username" type="text" size="50" maxlength="50" placeholder="User Name" 
                    style="margin:10px auto" required>
                    
                    <input name="log_pass" type="password" size="50" maxlength="50" placeholder="Password" 
                    style="margin:10px auto" required>
                            
                    <input name="login" type="submit" value="Login" style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px;">
                    
                    <a href="forgetpass.php"><input name="forgetpass" type="button" value="Forget Password" 
                    style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px; margin:0 20px;"></a>       
                            
                            
                            </form>
                          
                        </div>
                        
                        </div>
                    </div>
                </div> 
                </div>   
        </div>
    </div>
    <!------About what we sction end-----> 
    
     
   
    
    
     <!----------Footr part Start--------->    
    
     <!----------Footr part End--------->    
    
    
    <?php include('include/footer.php'); ?>
    
    
    
  
    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    <script type="text/javascript">
	
		$(document).ready(function(){
			$('#myCarousel, #myCarousel1').carousel({
			interval: false
			});			
			
		});

	</script>
    
    

</body>

</html>
