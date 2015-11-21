<?php require_once('../Connections/localhost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "reg")) {
  $insertSQL = sprintf("INSERT INTO register (Name, Email, Password, Conf_Password, Address, Phone) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['fullName'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['pass'], "text"),
                       GetSQLValueString($_POST['conpass'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['mobile'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "View member.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "reg")) {
  $insertSQL = sprintf("INSERT INTO register (Name, Email, Password, Conf_Password, Address, Phone) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['fullName'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['pass'], "text"),
                       GetSQLValueString($_POST['conpass'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['mobile'], "int"));
		
                       

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "View member.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "View member.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_localhost, $localhost);
  
  $LoginRS__query=sprintf("SELECT Email, Password FROM register WHERE Email=%s AND Password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $localhost) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
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
    
     <script>
	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
	

	</script>
    
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
	
	<div class="top_right_nav">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-4 col-md-4 col-sm-3"><div class="logo">
                
                <a href="index.php" style="text-decoration:none;">
                <img src="image/logo.png" width="50" height="30">
                <p style="color:#4caf50; font-family:'Arial Black', Gadget, sans-serif; font-size:16px">Prescription
                <span style="color:#FFF; font-family:'Arial Black', Gadget, sans-serif; font-size:16px">Vault</span></p>
                </a>
                
                </div>
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-9">
                	<div class="top_right_login_rgbtn">
            	
            </div>
            		<div class="top_searchctrl">
            	<input type="text" placeholder="SEARCH WEBSITE"/>
                <input type="button" value="go"/>
            </div>
           		    <div class="top_socialicon">
            	<ul>
                	<li><a href="#"><span class="facbook"><img src="image/facebook.png"></span></a></li>
                    <li><a href="#"><span class="twittr"><img src="image/twittr.png"></span></a></li>
                    <li><a href="#"><span class="linkdin"><img src="image/linkdin.png"></span></a></li>
                    <li><a href="#"><span class="googleplus"><img src="image/googl_plus.png"></span></a></li>
                </ul>
            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">Who we are</a>
                    </li>
                    
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        	<li><a href="#">Prescription Upload</a></li>
                            <li><a href="#">Search Doctor</a></li>
                            <li><a href="#">Book Appointment</a></li>
                            
                        </ul>
                    </li>
                     
                     <li>
                        <a href="contact.phpl">contact us</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <div class="main_slider">
   		 <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('image/banner_01.jpg');"></div>
                <div class="carousel-caption">
                    <div class="container">
                    	<h3>Think An Idea can change the world</h3>
                    	<h2><a href="#regnlog" style=" color:#FFF">Register</a><span><img src="image/logo.png" width="115" height="75"><a href="#regnlog" style="color:#4caf50;">Login</a></span></h2>
                        <p>
                        	New idea to go Green
                        </p>
                       
                    </div>
                    <div class="arrow">
                    <a href="#regnlog"><img src="image/arrow.gif"></a>
                    </div>
                    
                    
                </div>
            </div>
            <div class="item">
                 <div class="fill" style="background-image:url('image/banner_02.jpg');"></div>
                <div class="carousel-caption">
                    <div class="container">
                    	<h3>Think An Idea can change the world</h3>
                    	<h2><a href="#regnlog" style=" color:#FFF">Register</a><span><img src="image/logo.png" width="115" height="75"><a href="#regnlog" style="color:#4caf50;">Login</a></span></h2>
                        <p>
                        	New idea to go Green
                        </p>
                       
                    </div>
                    <div class="arrow">
                    <a href="#regnlog"><img src="image/arrow.gif"></a>
                    </div>
                    
                </div>
            </div>
            <div class="item">
                 <div class="fill" style="background-image:url('image/banner_03.jpg');"></div>
                <div class="carousel-caption">
                    <div class="container">
                    	<h3>Think An Idea can change the world</h3>
                    	<h2><a href="#regnlog" style=" color:#FFF">Register</a><span><img src="image/logo.png" width="115" height="75"><a href="#regnlog" style="color:#4caf50;">Login</a></span></h2>
                        <p>
                        	New idea to go Green
                        </p>
                        
                    </div>
                    <div class="arrow">
                    <a href="#regnlog"><img src="image/arrow.gif"></a>
                    </div>
                    
                </div>
            </div>
            <div class="item">
                 <div class="fill" style="background-image:url('image/banner_04.jpg');"></div>
                <div class="carousel-caption">
                    <div class="container">
                    	<h3>Think An Idea can change the world</h3>
                    	<h2><a href="#regnlog" style=" color:#FFF">Register</a><span><img src="image/logo.png" width="115" height="75"><a href="#regnlog" style="color:#4caf50;">Login</a></span></h2>
                        <p>
                        	New idea to go Green
                        </p>
                        
                    </div>
                    <div class="arrow">
                   <a href="#regnlog"><img src="image/arrow.gif"></a>
                    </div>
                    
                </div>
            </div>
            <div class="item">
                 <div class="fill" style="background-image:url('image/banner_05.jpg');"></div>
                <div class="carousel-caption">
                    <div class="container">
                    	<h3>Think An Idea can change the world</h3>
                    	<h2><a href="#regnlog" style=" color:#FFF">Register</a><span><img src="image/logo.png" width="115" height="75"><a href="#regnlog" style="color:#4caf50;">Login</a></span></h2>
                        <p>
                        	New idea to go Green
                        </p>
                        
                    </div>
                    <div class="arrow">
                    <a href="#regnlog"><img src="image/arrow.gif"></a>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Controls -->
       <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>-->
    </header>
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
							<span>
                <form action="<?php echo $editFormAction; ?>" method="POST" name="reg" id="reg">
                
                <input name="fullName" type="text" id="fullName" placeholder="Full Name" 
                style="margin:10px auto; color:#333" size="50" maxlength="50">
                
                <input name="email" type="email" size="50" maxlength="50" placeholder="E-mail" 
                style="margin:10px auto; color:#333">
                
                <input name="mobile" type="text" size="50" maxlength="50" placeholder="Mobile Number" 
                style="margin:10px auto; color:#333">
                
                 <input name="address" type="text" size="50" maxlength="50" placeholder="Address" 
                style="margin:10px auto; color:#333">
                
                <input name="pass" type="text" size="50" maxlength="50" placeholder="Password" 
                style="margin:10px auto; color:#333">
                
                <input name="conpass" type="text" size="50" maxlength="50" placeholder="Confrim Password" 
                style="margin:10px auto; color:#333">
                
                <p>
                 
                </p>
                
                  
                <input name="register" type="submit" value="Register" 
                style="color:#333; background-color:#FFF; border-color:transparent; padding:0 25px;">
                <input type="hidden" name="MM_insert" value="reg">
                </form>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                    	<div class="about_us_bg">
                    	<h2 class="about_ustitle">Login <span>Prescription Vault</span></h2>
                        <div class="about_largtxt">
                    <form action="<?php echo $loginFormAction; ?>" method="POST" name="login" id="login">
                            
                    <input name="username" type="text" size="50" maxlength="50" placeholder="User Name" 
                    style="margin:10px auto">
                    
                    <input name="pass" type="text" size="50" maxlength="50" placeholder="Password" 
                    style="margin:10px auto">
                            
                    <a href="View member.php"><input name="login" type="button" value="Login" 
                    style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px;"></a> 
                    
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
    <div class="footertop_part">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-4 col-md-4 col-sm-4">
                	<h3><span>Subscribe to</span> newsletter</h3>
                    <div class="footer_nwslatxt">Sign-up to be the first to know about our latest News</div>
                    <div class="footr_nwsletterctrl">
                    	<input type="text" placeholder="Enter your email address"/>
                        <input type="button" value="Subscribe"/>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                	<div class="footer_address">
                		<h3><span>Address</span></h3>
                        <div class="address_txt">
                            Lorem ipsum dolor sit amet, <br/>
                            consectetur adipiscing elit. Sed nec <br/>
                            velit purus. <br/>
                            71234567
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                	<h3><span>Contact</span> us</h3>
                    <div class="footer_contact_list">
                    	<ul>
                        	<li><img src="image/mob_icon.png"> 89-089-789-23<br/>89-089-789-23</li>
                            <li><img src="image/mail_icon.png"> <a href="mailto:info@prescriptionvault.com.com">info@prescriptionvault.com</a></li>
                        </ul>
                    </div>
                    <div class="footer_social">
                    	<ul>
                        	<li><a href="#"><img src="image/s_01.png"></a></li>
                            <li><a href="#"><img src="image/s_02.png"></a></li>
                            <li><a href="#"><img src="image/s_03.png"></a></li>
                            <li><a href="#"><img src="image/s_04.png"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!----------Footr part End--------->    
    
    
    <div class="footer_bottom">
    	<div class="container">
        	<div class="footer_link">
            	<ul>
                	<li><a href="index.php">Home</a></li>
                    <li>:</li>
                    <li><a href="#">Who we are</a></li>
                    <li>:</li>
                    
                    <li><a href="#">Sercvices </a></li>
                    <li>:</li>
                    
                    <li><a href="#">contact us</a></li>
                </ul>
            </div>
            <div class="copyright">Copyright© 2015 Prescription Vault Pvt.Ltd</div>
        </div>
    </div>
    
    
    
  
    
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
