<?php require_once('../Connections/localhost.php'); ?>
<?php require_once('../Connections/localhost.php'); ?>
<?php require_once('../Connections/localhost.php');
mysql_select_db($database_localhost, $localhost); ?>
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

mysql_select_db($database_localhost, $localhost);
$query_View = "SELECT Mem_Relation FROM addmember";
$View = mysql_query($query_View, $localhost) or die(mysql_error());
$row_View = mysql_fetch_assoc($View);
$totalRows_View = mysql_num_rows($View);

$colname_ViewMember = "-1";
if (isset($_POST['Mem_Relation'])) {
  $colname_ViewMember = $_POST['Mem_Relation'];
}
mysql_select_db($database_localhost, $localhost);
$query_ViewMember = sprintf("SELECT Mem_Name, Mem_Phone, Mem_Relation, Mem_Address, Mem_Email FROM addmember WHERE Mem_Relation = %s", GetSQLValueString($colname_ViewMember, "text"));
$ViewMember = mysql_query($query_ViewMember, $localhost) or die(mysql_error());
$row_ViewMember = mysql_fetch_assoc($ViewMember);
$totalRows_ViewMember = mysql_num_rows($ViewMember);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "uploadfrm")) {
  $insertSQL = sprintf("INSERT INTO pres1 (name, `Date`, Category, Directory) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['doc'], "text"),
                       GetSQLValueString($_POST['date'], "date"),
                       GetSQLValueString($_POST['category'], "text"),
                       GetSQLValueString($_POST['upload'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "View member.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "profile")) {
  $insertSQL = sprintf("INSERT INTO addmember (Mem_Name, Mem_Phone, Mem_Relation, Mem_Email) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['mobile'], "int"),
                       GetSQLValueString($_POST['relation'], "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "View member.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "addmem")) {
  $insertSQL = sprintf("INSERT INTO addmember (Mem_Name, Mem_Phone, Mem_Relation, Mem_Address, Mem_Age, Mem_Email) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['fullName'], "text"),
                       GetSQLValueString($_POST['mobile'], "int"),
                       GetSQLValueString($_POST['relation'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['dob'], "int"),
                       GetSQLValueString($_POST['email'], "text"));


  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "View member.php";
  if(isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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


   

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	
	<div class="top_right_nav">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-4 col-md-4 col-sm-3">
                <div class="logo">
                
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
                    <li> <a href="View member.php">Home</a></li>
                    <li><a href="#">Who we are</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                    		<ul class="dropdown-menu">
                        	<li><a href="#showdiv5" class="button" id="showdiv5">User Profile</a></li>
                            <li><a href="#">Change password</a></li>
                            
                        	</ul>
                    </li>
                    <li><a href="accnt contact.php">contact us</a></li>
                    
                </ul>
                <li style="float:right; list-style:none"><a href="index.php">
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
                    
                    <li><input name="mem1" style="color:#333" type="text" value="<?php echo $row_View['Mem_Relation']; ?>">
                      
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
                <?php } while ($row_View = mysql_fetch_assoc($View)); ?>
              <?php } // Show if recordset not empty ?>
          </form>
                  
              
                            
  		  </div>
          </div>
          </div>
                  
                    
                    
                    
         
<div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
               <div id="div1" style="display:none;">
                   <div class="about_us_bg">
                   <h2 class="about_ustitle">View Details <span>Prescription Vault</span></h2>
                   <div class="about_largtxt">
                <form action="#" method="post" name="profile" id="profile">
                      <?php if ($totalRows_ViewMember > 0) { // Show if recordset not empty ?>
                        <?php do { ?>
                         <label>Name</label><br>    
                         <input name="name" type="text" style="background-color:#9CF" size="50" maxlength="50" value="<?php echo $row_ViewMember['Mem_Name']; ?>"><br> 
                          
                         <label>Mobile</label><br>    
                        <input name="mobile" type="text" size="50" maxlength="50" value="<?php echo $row_ViewMember['Mem_Phone']; ?>" style="margin:2px auto"><br> 
                          
                         <label>E-mail</label><br> 
                         <input name="email" type="email" size="50" maxlength="50" value="<?php echo $row_ViewMember['Mem_Email']; ?>"  style="margin:2px auto"><br> 
                          
                         <label>Address</label><br>    
                         <input name="gender" type="text" size="50" maxlength="50" value="<?php echo $row_ViewMember['Mem_Address']; ?>" style="margin:2px auto"><br> 
                          
                         <label><span class="main_slider">Relationship</span></label>
                         <span class="main_slider"><br>    
                         <input name="relation" type="text" size="50" maxlength="50" value="<?php echo $row_ViewMember['Mem_Relation']; ?>" style="margin:2px auto"><br> 
                         </span>
                         <br><br>
                          
                          
                        <input name="update" type="button" value="Update Member Details" 
                   style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px;">
                         <input type="hidden" name="MM_insert" value="profile">
                        <?php } while ($row_ViewMember = mysql_fetch_assoc($ViewMember)); ?>
                        <?php } // Show if recordset not empty ?>
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
                     <?php
$tamdata = mysql_query("select * from pres1");
while($data=mysql_fetch_array($tamdata))
{
echo'
  					<tr>
   					<td colspan="2" rowspan="4"><a class="show-popup" href="#" data-showpopup="1" >
                    <input name="p1" type="image" src="'.$data['Directory'].'" style="width:100" height="150"></a></td> <td></td> 
  					</tr>
                    
  					<tr>
  					<td>'.$data['Date'].'</td>
  					</tr>
                    
                    <tr>
  					<td>'.$data['Category'].'</td>
  					</tr>
                    
  					<tr>
  					<td><a href="?v='.$data['ID'].'"><font color="#0000FF">View</font></a> | <a href="?d='.$data['ID'].'"><font color="#0000FF">Delete</font></a></td>
  					</tr>';
                    }
?>
 <?php
		 mysql_select_db($database_localhost, $localhost);
if(isset($_GET['d']))
{
	$id=$_GET['d'];
	$has2=mysql_query("select * from pres1 where ID='$id'");
	$data2=mysql_fetch_array($has2);
	if(file_exists($data2['Directory']))

	{
		unlink($data2['Directory']);
		$haspus = mysql_query("delete from pres1 where ID='$id'");
		if($haspus)
		{
			echo "File Deleted Successfully";
			
		}
		
	}
}

?>   
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
                        
                  <form action="<?php echo $row_View['Mem_Relation']; ?>" method="POST" name="addmem" id="addmem">
                
 				  <input name="fullName" type="text" id="fullName" placeholder="Full Name" 
 				  style="margin:10px auto; color:#333;" size="50" maxlength="50">
                
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

                  <p><br>
                
                
                
                  
                  <br>
                  </p>
                
                  <label>Date Of Birth</label><br>
                  <input name="dob" type="date"  style=" color:#333;"><br><br><br>
                
                            
                  <input name="adm" type="submit" value="Add Member" 
                  style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px;">
                  <input type="hidden" name="MM_insert" value="addmem">
                  </form>
                             
                    
                          
                </div>
                </div>
             </div>
             </div> 
                
                
          
			<div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
			<div id="div4" style="display:none;">
					<h2 class="about_ustitle">Upload Prescription <span>Prescription Vault</span></h2><br><br>
					
                    <div class="pr" style="text-align:center">
                    
                    <form action="<?php echo $editFormAction; ?>" method="POST" name="uploadfrm" id="uploadfrm">
                    
                    <input name="doc" type="text" size="30" maxlength="30" placeholder="Doctors Name" style="float:left"><br><br>
                    
                    <input name="upload" type="file" ><br>
                    
         
                    <input name="date" type="date" style="float:left"><br><br><br>
                    
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
                    
                    <input name="upload button" type="submit" value="Upload Prescription">
                    <input type="hidden" name="MM_insert" value="uploadfrm">
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
<?php
mysql_free_result($View);

mysql_free_result($ViewMember);
?>
