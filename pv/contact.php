<?php
error_reporting(0);
if($_REQUEST['sent'])

{

	//print_r($_REQUEST);

	

			$name=$_REQUEST['full_Name'];

			$contact_mail=$_REQUEST['email'];

			$contact_phone=$_REQUEST['mobile'];

			$quiry=$_REQUEST['message'];

			//$country=$_REQUEST['dynFrm_country'];
//
//			$phone=$_REQUEST['dynFrm_phone'];
//
//			$mobile=$_REQUEST['dynFrm_mobile_no'];
//
//			$fax=$_REQUEST['dynFrm_fax'];
//
//			$sub=$_REQUEST['dynFrm_subject'];
//
//			$message=$_REQUEST['dynFrm_enquiry_details'];

			

			

			
			$to="test@gmail.com";

			$subject="Pescription Vault - Enquiry |";

			

			 $text1="<html>

						<head>

						<title>Email</title>

						</head>

						<body>

						<div style='width:780px; height:auto; margin:0 auto; background:#ffffff; border:1px solid #f4f4f4; padding:10px; font-family: Tahoma, Verdana, Segoe, sans-serif; font-size:14px; text-align:left; line-height:18px; color:#333;'>

			<img src='zalvet/images/logo.png' width='350' height='100' />

			<div style='clear:both;'></div>

			<div style='width:100%; height:1px; border-bottom:1px solid #f4f4f4; margin:10px 0;'></div>

			

			<div style='clear:both;'></div>

			

			<div style='width:20%; height:auto; float:left; margin:1% 0; border-bottom:1px dotted #CCC; line-height:20px;'><strong>Name :</strong></div> 

			<div style='width:39%; height:auto; float:left; margin:1% 39% 1% 1%; border-bottom:1px dotted #CCC; line-height:20px;'>".$name."</div> 

			<div style='clear:both;'></div>

			

			<div style='width:20%; height:auto; float:left; margin:1% 0; border-bottom:1px dotted #CCC; line-height:20px;'><strong>E-mail Address :</strong></div> 

			<div style='width:39%; height:auto; float:left; margin:1% 39% 1% 1%; border-bottom:1px dotted #CCC; line-height:20px;'>".$contact_mail."</div> 

			<div style='clear:both;'></div>

			

			<div style='width:20%; height:auto; float:left; margin:1% 0; border-bottom:1px dotted #CCC; line-height:20px;'><strong>Phone Number :</strong></div> 

			<div style='width:39%; height:auto; float:left; margin:1% 39% 1% 1%; border-bottom:1px dotted #CCC; line-height:20px;'>".$contact_phone."</div> 

			<div style='clear:both;'></div>
		
			

			<div style='width:20%; height:auto; float:left; margin:1% 0; border-bottom:1px dotted #CCC; line-height:20px;'><strong>Quiry :</strong></div> 

			<div style='width:39%; height:auto; float:left; margin:1% 39% 1% 1%; border-bottom:1px dotted #CCC; line-height:20px;'>".$quiry."</div> 

			<div style='clear:both;'></div>

		

		</div>

		<div style='width:780px; height:auto; min-height:50px; margin:0 auto; background: linear-gradient(#4CAF50 0%, #298e2d 100%) repeat scroll 0% 0% transparent; padding:10px; font-family: Tahoma, Verdana, Segoe, sans-serif; font-size:12px; text-align:left; line-height:18px; color:#CCC;'>

		<p>Support Team<br />

		   Pescription Vault</p>

</div>

			 </body>

			 </html>"; 

				 $headers  = "MIME-Version: 1.0"."\r\n";

				 $headers .= "Content-type: text/html; charset=ISO-8859-1 "."\r\n";

				 $headers .= "From: noreply@abc.com"." \r\n";

				 $headers .= "Reply-To: ".$email." \r\n";

				$sentmail =mail($to, $subject,$text1,$headers);

				if($sentmail)

				{

					echo "<script>alert('Thank You! Enquiry Form Submitted Sucessfully.');</script>";

				}
				else

				 {

					echo "<script>alert('Enquiry Form Not Submitted Sucessfully.');</script>";

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

    <title>pvault | Contact Us</title>

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
   		 <?php include('include/banner2.php'); ?>
    </div>

    <!-- Page Content -->
    
    <!------About what we sction start----->
    <div class="about_whatwe_part">
    	<div class="container">
        	<div class="about_whopartctrl">
        		
        		<div class="row">
                	<div class="col-lg-6 col-md-6 col-sm-6">
                    	<div class="who_we_bg">
                    		<h2 class="what_wedotitle">Happy To<span> Serve You</span> </h2>
                        	<div class="whatw_dolargtxt">
                        	Please identify your Problem so we can route you to the correct support agent.<br/><br/>
							<span>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <input name="full_Name" type="text" size="50" maxlength="50" placeholder="Full Name" 
                style="margin:10px auto; color:#333" required>
                
                <input name="email" type="email" size="50" maxlength="50" placeholder="E-mail" 
                style="margin:10px auto; color:#333" required>
                
                <input name="mobile" type="text" size="50" maxlength="10" placeholder="Mobile Number" 
                style="margin:10px auto; color:#333" required><br>
                
                <textarea name="message" cols="51" rows="5"  placeholder="Type your message" 
                style="margin:10px auto; color:#333" required></textarea><br>
                
                <input name="sent" type="submit" value="Sent" 
                style="color:#333; background-color:#FFF; border-color:transparent; padding:0 25px;">
                                
                                </form>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                    	<div class="about_us_bg">
                    	<h2 class="about_ustitle">Office <span>Prescription Vault</span></h2>
                        <div class="about_largtxt">
                        	Prescription Vault pvt.ltd<br>
                            Lorem ipsum dolor sit amet,<br> 
							consectetur adipiscing elit. <br>
                            Sed necvelit purus. <br>
                            71234567 <br><br>
                            
                            Call Us: 18001200300<br>
                            Mail Us: info@prescriptionvault.com
                            <br><br>
                          
                        </div>
                        <div class="about_radmor"><a href="#">More Details</a></div>
                        </div>
                    </div>
                </div> 
                </div>   
        </div>
    </div>
    <!------About what we sction end-----> 
    
     
    <!----------Sponsor part start--------->
    <div class="sponsor_part">
    	<div class="container">
        	<div class="sponsor_titl"><font><img src="image/sponsor_icon.png"></font> Become a <span>Sponsor</span></div>
            <div class="sponsor_largtxt">
            	lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec velit purus. Proin placerat nisl non vestibulum pharetra. Vestibulum non nibh convallis, cursus 			                augue quis, efficitur quam. Aliquam ligula magna, fringilla id laoreet eu, fermentum tristique magna. Sed sapien magna, imperdiet vel dui eget, tincidunt dictum                felis. Suspendisse rhoncus lorem ipsum dolor sit amet, consectetur adipiscing  elit. Sed nec velit purus. Proin placerat nisl non vestibulum pharetra. Vestibulum                non nibh convallis, cursus augue quis, efficitur quam. Aliquam ligula magna, fringilla id laoreet eu, fermentum tristique magna. Sed sapien magna, imperdiet vel dui                eget, tincidunt dictum felis. Suspendisse rhoncus 
            </div>
            <div class="sponsor_btn"><a href="#">sponsorship</a></div>
        </div>
    </div>
    
     <!----------Sponsor part End--------->
    
    
   
    
    
    <div class="map">
    	
        	<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d58932.45754135556!2d88.41266490338528!3d22.606069402836955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1smap!5e0!3m2!1sen!2sin!4v1446107878736" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            
        
    </div>
    
    
     <!----------Footr part Start--------->    
    
    <?php include('include/footer.php');?>
    
    
    
    
    
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
