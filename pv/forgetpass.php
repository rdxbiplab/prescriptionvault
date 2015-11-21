<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>pvault | Forget</title>
    
   

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
	
	<?php include('include/header.php'); ?>

    <!-- Header Carousel -->
    <div class="main_slider">
   		<?php include('include/banner4.php'); ?> 
    </div>

    <!-- Page Content -->
    
    <!------About what we sction start----->
    <div class="about_whatwe_part" id="regnlog">
    	<div class="container">
        	<div class="about_whopartctrl">
        		
        		<div class="row">
                	<div class="col-lg-6 col-md-6 col-sm-6">
                    	<div class="who_we_bg">
                    		<h2 class="what_wedotitle">Recover<span> Your Password</span> </h2>
                        	<div class="whatw_dolargtxt">
                        	Please correct information<br/><br/>
							<span>
                <form action="#" method="post" name="reg" id="reg">
              
                <input name="email" type="email" size="50" maxlength="50" placeholder="E-mail" 
                style="margin:10px auto; color:#333">
                
               
                <br>
                <br>
                
               
                
                  
                <input name="forget" type="button" value="Recover Password" 
                style="color:#333; background-color:#FFF; border-color:transparent; padding:0 25px;">
                             
                                
                </form>
                            </span>
                        </div>
                        </div>
                </div>
                
                <div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                    	<div class="about_us_bg">
                    	<h2 class="about_ustitle">Login <span>Prescription Vault</span></h2>
                        <div class="about_largtxt">
                        
                    <form action="#" method="post" name="login" id="login">
                            
                    <input name="username" type="text" size="50" maxlength="50" placeholder="User Name" 
                    style="margin:10px auto">
                    
                    <input name="pass" type="text" size="50" maxlength="50" placeholder="Password" 
                    style="margin:10px auto">
                            
                    <a href="View member.php"><input name="login" type="button" value="Login" 
                    style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px;"></a> 
                    
                    <input name="forgetpass" type="button" value="Forget Password" 
                    style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px; margin:0 20px;">       
                            
                            
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
