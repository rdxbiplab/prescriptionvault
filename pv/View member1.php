<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>pvault | View</title>
    
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
     <script type="text/javascript" src="css/custom.js"></script>
     <link type="text/css" rel="stylesheet" href="css/overlaypopup.css" />
    
    
    <link href="search/css/style.css" rel="stylesheet" type="text/css" media="all"/>   

   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    
    <script src="https://code.jquery.com/jquery-1.7.2.js"></script>
	<script type="text/javascript">
$( document ).ready(function() {
$(function() {
    $('#showdiv1').click(function() {
        $('div[id^=div]').hide();
        $('#div1').show();
    });
    $('#showdiv2').click(function() {
        $('div[id^=div]').hide();
        $('#div2').show();
    });

    $('#showdiv3').click(function() {
        $('div[id^=div]').hide();
        $('#div3').show();
    });

    $('#showdiv4').click(function() {
        $('div[id^=div]').hide();
        $('#div4').show();
    });
	
	 $('#showdiv5').click(function() {
        $('div[id^=div]').hide();
        $('#div5').show();
    });


});
});
</script>


   

</head>

<body>
	
	<div class="top_right_nav">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-4 col-md-4 col-sm-3">
                <div class="logo">
                
                 <a href="index.html" style="text-decoration:none;">
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
                    <li> <a href="View member.html">Home</a></li>
                    <li><a href="#">Who we are</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                    		<ul class="dropdown-menu">
                        	<li><a href="#showdiv5" class="button" id="showdiv5">User Profile</a></li>
                            <li><a href="#">Change password</a></li>
                            
                        	</ul>
                    </li>
                    <li><a href="accnt contact.html">contact us</a></li>
                    
                </ul>
                <li style="float:right; list-style:none"><a href="index.html">
                    <button type="button" id="tooltip2" title="LogOut" 
                    style="background-color:transparent; border-color:transparent">
                    <img src="image/logout.png"></button></a></li>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <div class="main_slider">
   		 <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('image/banner_01.jpg');"></div>
                <div class="carousel-caption">
                    <div class="container">
                    	<h3>Think An Idea can change the world</h3>
                    	<h2><a href="#view" style=" color:#FFF">View</a><span>
                        <img src="image/logo.png" width="115" height="75"><a href="#view" style="color:#4caf50;">Details</a>
                        </span></h2>
                        <p>
                        	New idea to go Green
                        </p>
                       
                    </div>
                    <div class="search">
					
					<div class="s-bar">
	  			    <form name="searchbar" method="post" action="#" id="searchbar">
					<input type="text" value="Search Doctors">
					<input type="submit"  value="Search"/><br>
                    
                    <input type="radio" name="check"  id="searchWeb" />
                	<label for="searchWeb">Search By Spacialist</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <input type="radio" name="check"  id="searchWeb" />
                	<label for="searchWeb">Search By Location</label>
                    
	  				</form>
					</div>
						
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
    <div class="about_whatwe_part">
    	<div class="container">
        	<div class="about_whopartctrl">
        	<div class="row">
            
                	<div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="who_we_bg">
                    		<h2 class="what_wedotitle">View<span> Members</span> </h2>
                        	<div class="whatw_dolargtxt">
                        	Please click on icon for Details<br/><br/>
							<span>
                            
         <form action="#" method="post" name="viewmem">
          <?php if ($totalRows_View > 0) { // Show if recordset not empty ?>
                <?php do { ?>
                
          <div class="viewmem">
          
          <ul>
         
          <li><input name="mem1" style="background-color:#0C6"type="text" value="<?php echo $row_View['Mem_Relation']; ?>">
          
          <a class="button" id="showdiv1"><button type="button" class="vw" id="tooltip2" title="View Details of Member">
	      <img src="image/view.png" width="30" height="30"></button></a>
          
          &nbsp;<a class="button" id="showdiv2"><button type="button" class="vw" id="tooltip2" title="View Prescriptions">
          <img src="image/gallery.png" width="30" height="30"></button></a>
          
          &nbsp;<a class="button" id="showdiv4"><button type="button" class="vw" id="tooltip2" title="Upload Prescription">
          <img src="image/upld.png" width="30" height="30"></button></a>
          
          &nbsp;<button type="button" class="vw" id="tooltip2" title="Remove Member">
          <img src="image/del.png" width="30" height="30"></button></li>
          <br>
          
          </ul>
          
          </div>
                            
          </form>
                  <?php } while ($row_View = mysql_fetch_assoc($View)); ?>
              <?php } // Show if recordset not empty ?>
              
                            
  		  </div>
          </div>
          </div>
                    
                    
                    
                    
         
          <div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
               <div id="div1" style="display:none;">
                   <div class="about_us_bg">
                   <h2 class="about_ustitle">View Details <span>Prescription Vault</span></h2>
                   <div class="about_largtxt">
                   <form action="#" method="get" name="profile" id="profile">
                     
                   <label>Name</label><br>    
                   <input name="name" type="text" size="50" maxlength="50" value="" style="margin:2px auto"><br> 
                    
                   <label>Mobile</label><br>    
                   <input name="mobile" type="text" size="50" maxlength="50" value="" style="margin:2px auto"><br> 
                    
                   <label>E-mail</label><br> 
                   <input name="email" type="email" size="50" maxlength="50" value=""  style="margin:2px auto"><br> 
                    
                   <label>Gender</label><br>    
                   <input name="gender" type="text" size="50" maxlength="50" value="" style="margin:2px auto"><br> 
                    
                   <label><span class="main_slider">Relationship</span></label>
                   <span class="main_slider"><br>    
                   <input name="relation" type="text" size="50" maxlength="50" value="" style="margin:2px auto"><br> 
                   </span>
                   <br><br>
                    
                        
                   <input name="update" type="button" value="Update Member Details" 
                   style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px;"> 
                    
               
                            
                   </form>
                          
                  </div>
                  </div>
               </div>
               </div> 
                
		<div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
		<div id="div2" style="display:none;">
		<h2 class="about_ustitle">View Prescription <span>Prescription Vault</span></h2>
					
                    <div class="pr">
                    
                    <form action="#" method="get" name="thumb" id="thumb">
                    
                    <table width="300" height="150" style="margin:5px;">
                    
  					<tr>
   					<td colspan="2" rowspan="4"><a class="show-popup" href="#" data-showpopup="1" >
                    <input name="p1" type="image" src="image/c.jpg" style="width:100" height="150"></a></td> <td>Date:29/10/15</td> 
  					</tr>
                    
  					<tr>
  					<td>Categoty</td>
  					</tr>
                    
                    <tr>
  					<td>Dr. Ashok</td>
  					</tr>
                    
  					<tr>
  					<td><a class="show-popup" href="#" data-showpopup="1" >
                    	<button type="button" class="vw" id="tooltip2" title="View Prescription">
	      				<img src="image/view.png" width="30" height="30"></button></a>&nbsp;
                        
                        <button type="button" class="vw" id="tooltip2" title="Delete Prescription">
         				<img src="image/del.png" width="30" height="30"></button></li></td>
  					</tr>
                    
					</table>
                    
                    
                   
                             				
                	
                    
                    </form>                    

                    </div>
         
			</div>
			</div>
            
            
            
            
             <div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
             <div id="div3">
                   <div class="about_us_bg">
                   <h2 class="about_ustitle">Add Member <span>Prescription Vault</span></h2>
                   <div class="about_largtxt">
                        
                  <form action="#" method="post" name="addmem" id="addmem">
                
 				  <input name="full Name" type="text" size="50" maxlength="50" placeholder="Full Name" 
 				  style="margin:10px auto; color:#333;">
                
				  <input name="email" type="email" size="50" maxlength="50" placeholder="E-mail" 
 				  style="margin:10px auto; color:#333;">
                
 				  <input name="mobile" type="text" size="50" maxlength="50" placeholder="Mobile Number" 
 				  style="margin:10px auto; color:#333;">
                
   				  <input name="city" type="text" size="50" maxlength="50" placeholder="City" 
    			  style="margin:10px auto; color:#333;"><br>
                
                  <label>Relationship &nbsp; </label><br>
                  <select name="relation"  style="color:#333;">
                  <option>--Select Any One-- &nbsp;&nbsp;&nbsp;&nbsp;</option>
                  <option>Mother &nbsp;&nbsp;&nbsp;&nbsp;</option>
                  <option>Father</option>
                  <option>Grand Mother</option>
                  <option>Grand Mother</option>
                  <option>Brother</option>
                  <option>Sister</option>
                  <option>Uncle</option>
                  <option>Aunty</option>
                  <option>Son</option>
                  <option>Daughter</option>
                  </select>                

                  <p>
                  <br>
                
                
                
                  <label>
                  <input type="radio" name="gender" value="" id="gender_0">
                   Male</label>
                  <br>
                  <label>
                  <input type="radio" name="gender" value="" id="gender_1">
                  Female</label>
                  <br>
                  </p>
                
                  <label>Date Of Birth</label><br>
                  <input name="dob" type="date"  style=" color:#333;"><br><br><br>
                
                            
                  <input name="adm" type="button" value="Add Member" 
                  style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px;">
                  
                  </form>
                             
                    
                          
                </div>
                </div>
             </div>
             </div> 
                
                
          
			<div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
			<div id="div4" style="display:none;">
					<h2 class="about_ustitle">Upload Prescription <span>Prescription Vault</span></h2><br><br>
					
                    <div class="pr" style="text-align:center">
                    
                    <form action="#" method="post" name="upload frm" id="upload frm">
                    
                    <input name="doc" type="text" size="30" maxlength="30" placeholder="Doctors Name" style="float:left"><br><br>
                    
                    <input name="upload" type="file" ><br>
                    
                    <label style="float:left">Date Of Prescription</label>
                    <input type="date" style="float:left"><br><br><br>
                    
                    <select name="category" style="float:left"><br>
                    <option>Select Category</option>
                        <option>Pediatrician</option>
                        <option>Pediatric Surgeon</option>
                        <option>Pediatric Oncologist</option>
                        <option>Pediatric Neurologist</option>
                        <option>Pediatric Intensivist</option>
                        <option>Pediatric Nephrolgoist</option>
                        <option>Pediatric Cardiologist</option>
                        <option>Pediatric Rheumatology</option>
                        <option>Pediatric Pulmologist</option>
                        <option>Pediatric Neonatalogist</option>
                        <option>Pediatric Dermatologist</option>
                        <option>Pediatric Orthopaedician</option>
                        <option>Pediatric Hematologist</option>
                        <option>Pediatric Allergist</option>
                        <option>General Physician</option>
                        <option>Gynaecologist</option>
                        <option>Gyneac Oncologist</option>
                        <option>Neurologist</option>
                        <option>Oncologist</option>

                        <option>Intensivist</option>  
                        <option>Nephrolgoist</option>
                        <option>Cardiologist</option>
                        <option>Rheumatology</option>
                        <option>Pulmologist</option>
                        <option>Neonatalogist</option>
                        <option>Dermatologist</option>
                        <option>Orthopaedician</option>
                        <option>Hematologist</option>
                        <option>Allergist</option>
                    
                    </select><br><br>
                    
                    <input name="upload button" type="button" value="Upload Prescription">
                    
                    </form>
                   				
              
                </div>
				</div>
				</div>
                
                
                
                <div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
			<div id="div5" style="display:none;">
				<h2 class="about_ustitle">User Profile <span>Prescription Vault</span></h2>
					
                    
                   				
                	<form action="#" method="get" name="profile" id="profile">
                    
                        
                    <label>Name</label><br>    
                    <input name="name" type="text" size="50" maxlength="50" value="" style="margin:2px auto"><br> 
                    
                    <label>Mobile</label><br>    
                    <input name="name" type="text" size="50" maxlength="50" value="" style="margin:2px auto"><br> 
                    
                    <label>E-mail</label><br> 
                    <input name="email" type="email" size="50" maxlength="50" value=""  style="margin:2px auto"><br> 
                    
                    <label>Password</label><br> 
                    <input name="pass" type="text" size="50" maxlength="50" value=""  style="margin:2px auto"><br><br><br>
                    
                   
                                                 
                    <input name="update" type="button" value="Update Profile" 
                    style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px;"> 
                    
                   
                            
                            
                    </form>

                   
         
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
                	<li><a href="index.html">Home</a></li>
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
    
    
    
    
    <div class="overlay-content popup1">
    <p>Date:29/10/15</p>
    <form action="#" method="get" name="popup">
    <input name="pres" type="image" src="image/c.jpg">
    <button class="close-btn">Close</button>
    </form>
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
