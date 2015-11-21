<?php 
session_start();
error_reporting(0);
include('lib/connect.php');

if(isset($_SESSION['user_id'])=="")
{
	echo "<script>window.location='index.php'</script>";	
}

$user_id = $_SESSION['user_id'];

if($_REQUEST['adm'])
{
	$fullName= $_REQUEST['fullName'];
	$email= $_REQUEST['email'];
	$mobile= $_REQUEST['mobile'];
	$city= $_REQUEST['city'];
	$relation= $_REQUEST['relation'];
	$dob= mysql_real_escape_string($_REQUEST['dob']);
	
	$query_member = mysql_query("INSERT INTO addmember SET `mbr_name` = '$fullName', `mbr_email` = '$email', `mbr_mobile` = '$mobile', `mbr_city` = '$city', `mbr_relation` = '$relation', `mbr_dob` = '$dob', `reg_user_id` = '$user_id'");
	
}

if($_REQUEST['upload_button'])
{
	$image = addslashes(file_get_contents($_FILES['upload']['tmp_name']));
	$image_name = addslashes($_FILES['upload']['name']);
	$image_size = getimagesize($_FILES['upload']['tmp_name']);
	//
	move_uploaded_file($_FILES["upload"]["tmp_name"], "photo/" . $_FILES["upload"]["name"]);
	$location = "photo/" . $_FILES["upload"]["name"];
	
	
	$doctor_name = $_REQUEST['doc_name'];
	//$prsecription = $_REQUEST['upload'];
	$issu_date = $_REQUEST['date'];
	$des_catagory = $_REQUEST['category'];
	
	$query_upload = mysql_query("INSERT INTO prescription SET `doc_name` = '$doctor_name', `des_cgry` = '$des_catagory', `isu_date` = '$issu_date', `prescription` = '$location', `nember_id` = '".$_REQUEST['upload_id']."', `reg_user_id` = '$user_id'");
	
	if($query_upload)
	{
		$upload_mgs;
	}
	else
	{
		$fail_msg;
	}
}

if($_REQUEST['flag'] == "delete")
{
	$del_query = mysql_query("delete from `addmember` where `mbr_id` = '".$_REQUEST['delete_id']."'");
}

if($_REQUEST['flag'] == "pes_delete")
{
	$del_pescription = mysql_query("delete from `prescription` where `PID` = '".$_REQUEST['pes_delete_id']."'");
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
    
    <link rel="stylesheet" href="css/lightbox.css" type="text/css">
    

<?php
if($_REQUEST['flag'] == "show")
{
	$display = "block";
	$display1 = "none";
	$display2 = "none";
	$hide = "none";
}
elseif($_REQUEST['flag'] == "upload")
{ 
	$display = "none";
	$display1 = "none";
	$display2 = "block";
	$hide = "none";
}
elseif($_REQUEST['flag'] == "pres")
{
	$display = "none";
	$display1 = "block";
	$display2 = "none";
	$hide = "none";
}
else
{
	$display = "none";
	$display1 = "none";
	$display2 = "none";
	$hide = "block";
}
?>
    
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
	
	 


});
});
</script>


   

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	
	
    <!-- Navigation -->
    
    <?php include('include/header1.php'); ?>

    <!-- Header Carousel -->
    <div class="main_slider">
   		 <?php include('include/banner3.php'); ?>
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
			
			<?php 
            $select_query = mysql_query("SELECT * FROM addmember WHERE reg_user_id = '$user_id'");
            while($select_row = mysql_fetch_array($select_query))
            {
            ?>   
                   
                <div class="viewmem">
                  
                  <ul>
                    
                    <li><input name="mem1" style="color:#333" type="text" value="<?php echo $select_row['mbr_relation']; ?>">
                      
                      <a class="button" id="showdiv1" href="view_member.php?flag=show&show_id=<?php echo $select_row['mbr_id']; ?>#div1"><button type="button" class="vw" id="tooltip2" title="View Details of Member">
                        <img src="image/view.png" width="30" height="30"></button></a>
                      
                      &nbsp;<a class="button" id="showdiv2" href="view_member.php?flag=pres&pres_id=<?php echo $select_row['mbr_id']; ?>#div2"><button type="button" class="vw" id="tooltip2" title="View Prescriptions">
                        <img src="image/gallery.png" width="30" height="30"></button></a>
                      
                      &nbsp;<a class="button" id="showdiv4" href="view_member.php?flag=upload&upload_id=<?php echo $select_row['mbr_id']; ?>#div4"><button type="button" class="vw" id="tooltip2" title="Upload Prescription">
                        <img src="image/upld.png" width="30" height="30"></button></a>
                      
                      &nbsp;<a class="button" href="view_member.php?flag=delete&delete_id=<?php echo $select_row['mbr_id']; ?>"><button type="button" class="vw" id="tooltip2" name="delete" title="Remove Member">
                        <img src="image/del.png" width="30" height="30"></button></li></a>
                    <br>
                    
                  </ul>
                  
                </div>
               <?php
			}
			?>
          </form>
                  
           <?php /*?><?php
              if($_REQUEST['flag'] =="show")
              {
               ?>
               <input type="hidden" name="flag" value="1"/>   
               <?php
			  }
			  ?><?php */?>
                            
  		  </div>
          </div>
          </div>
                  
                    
                    
<?php 
$view_member = mysql_query("SELECT * FROM addmember WHERE `mbr_id` = '".$_REQUEST['show_id']."'");
$row_member = mysql_fetch_array($view_member);
?>                    
         
<div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
               <div id="div1" style="display:<?php echo $display; ?>;">
                   <div class="about_us_bg">
                   <h2 class="about_ustitle">View Details <span>Prescription Vault</span></h2>
                   <div class="about_largtxt">
                <form action="#" method="post" name="profile" id="profile">
                      
                       
                         <label>Name</label><br>    
                         <input name="name" type="text" style="background-color:#9CF" size="50" maxlength="50" value="<?php echo $row_member['mbr_name']; ?>"><br> 
                          
                         <label>Mobile</label><br>    
                        <input name="mobile" type="text" size="50" maxlength="50" value="<?php echo $row_member['mbr_mobile']; ?>" style="margin:2px auto"><br> 
                          
                         <label>E-mail</label><br> 
                         <input name="email" type="email" size="50" maxlength="50" value="<?php echo $row_member['mbr_email']; ?>"  style="margin:2px auto"><br> 
                          
                         <label>City</label><br>    
                         <input name="gender" type="text" size="50" maxlength="50" value="<?php echo $row_member['mbr_city']; ?>" style="margin:2px auto"><br> 
                          
                         <label><span class="main_slider">Relationship</span></label>
                         <span class="main_slider"><br>    
                         <input name="relation" type="text" size="50" maxlength="50" value="<?php echo $row_member['mbr_relation']; ?>" style="margin:2px auto"><br> 
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
		<div id="div2" style="display:<?php echo $display1; ?>;">
		<h2 class="about_ustitle">View Prescription <span>Prescription Vault</span></h2>
					
                    <div class="pr">
                    
                    <form action="#" method="get" name="thumb" id="thumb">
                    
                    <table width="300" height="150" style="margin:5px;">
                     <?php
$tamdata = mysql_query("select * from prescription WHERE nember_id = '".$_REQUEST['pres_id']."'");
while($data=mysql_fetch_array($tamdata))
{
?>
  					<tr>
   					<td colspan="2" rowspan="4">
                    <a class="example-image-link" href="<?php echo $data['prescription'];?>" data-lightbox="example-set" data-title="">
                    <img src="<?php echo $data['prescription'];?>" style="width:90%;"></a></td> 
                    <td></td> 
  					</tr>
                    
  					<tr>
  					<td><?php echo $data['isu_date'];?></td>
  					</tr>
                    
                    <tr>
  					<td><?php echo $data['des_cgry'];?></td>
  					</tr>
                    
  					<tr>
  					<td><a class="example-image-link" href="<?php echo $data['prescription'];?>" data-lightbox="example-set" data-title=""><font color="#0000FF">View</font></a> | <a href="view_member.php?flag=pes_delete&pes_delete_id=<?php echo $data['PID']; ?>"><font color="#0000FF">Delete</font></a></td>
  					</tr>
<?php
}
?>
 
					</table>
                    

                    
                   
                             				
                	
                    
                    </form>                    

                    </div>
         
		  </div>
		</div>
            
            
        
            
             <div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
             <div id="div3" style="display:<?php echo $hide; ?>">
                   <div class="about_us_bg">
                   <h2 class="about_ustitle">Add Member <span>Prescription Vault</span></h2>
                   <div class="about_largtxt">
                        
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                
 				  <input name="fullName" type="text" id="fullName" placeholder="Full Name" 
 				  style="margin:10px auto; color:#333;" size="50" maxlength="50" required>
                
				  <input name="email" type="email" size="50" maxlength="50" placeholder="E-mail" 
 				  style="margin:10px auto; color:#333;" required>
                
 				  <input name="mobile" type="text" size="50" maxlength="50" placeholder="Mobile Number" 
 				  style="margin:10px auto; color:#333;" required>
                
   				  <input name="city" type="text" size="50" maxlength="50" placeholder="City" 
    			  style="margin:10px auto; color:#333;" required><br>
                
                  <label>Relationship &nbsp; </label><br>
                  <select name="relation"  style="color:#333;" required>
                  <option value=""> --Select Any One-- &nbsp;&nbsp;&nbsp;&nbsp;</option>
                  <option>Mother &nbsp;&nbsp;&nbsp;&nbsp;</option>
                  <option>Father</option>
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
                  <input name="dob" type="date"  style=" color:#333;" required><br><br><br>
                
                            
                  <input name="adm" type="submit" value="Add Member" 
                  style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px;">
                 
                  </form>
                             
                    
                          
                </div>
                </div>
             </div>
             </div> 
                
                
          
			<div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
			<div id="div4" style="display:<?php echo $display2; ?>;">
            
            <h2 class="about_ustitle">Upload Prescription <span>Prescription Vault</span></h2><br><br>
					
                    <div class="pr" style="text-align:center">
                    
                    <?php
					echo $upload_mgs;
					echo $fail_msg;
					?>
                    
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    
                    <input name="doc_name" type="text" size="30" maxlength="30" placeholder="Doctors Name" style="float:left"><br><br>
                    
                    <input  type="file" name="upload"><br>
                    
         
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
                    
                    <input name="upload_button" type="submit" value="Upload Prescription" style="color:#333; background-color:#4caf50; border-color:transparent; padding:0 25px;">
                    
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
                    
                   
                                                 
                    <input name="update" type="submit" value="Update Profile" 
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
    
    <?php include('include/footer.php'); ?>
    
 	<?php
	$tamdata1 = mysql_query("select * from prescription WHERE nember_id = '".$_REQUEST['pres_id']."'");
	while($data1=mysql_fetch_array($tamdata))
	{
	?>   
    
    
    <div class="overlay-content popup1">
    <p>Date:<?php echo $data['isu_date'];?></p>
    <form action="#" method="get" name="popup">
    <img src="<?php echo $data['prescription'];?>" style="">
    <button class="close-btn">Close</button>
    </form>
	</div>
    <?php
	}
	?>
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
    <script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>

</body>

</html>

