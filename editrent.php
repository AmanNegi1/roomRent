<?php 
$getid=$_GET['editpost'];
require_once 'config/config.php';
 ?>
 <?php 
$error_array=array();	
if (isset($_POST['Submit'])) {
   
	
    $landlord=mysqli_real_escape_string($con,$_POST["Landlord"]);
     $_SESSION['Landlord']=$landlord;
	
	 $address=mysqli_real_escape_string($con,$_POST["Address"]);
	  $_SESSION['Address']=$address;
	
   $rent=mysqli_real_escape_string($con,$_POST["Rent"]);
	$_SESSION['Rent']=$rent;
	$levelset=mysqli_real_escape_string($con,$_POST["Levelset"]);
	$_SESSION['Levelset']=$levelset;
	$info=mysqli_real_escape_string($con,$_POST["Info"]);
	$_SESSION['Info']=$info;
    date_default_timezone_set("Asia/kolkata");
    $currenttime1=time();
   $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
   // $datetime=strftime("%m-%d-%y",$currenttime1);
    $datetime;
    $image1=$_FILES['Image1']["name"];
    $Target1="uploadedimg/".basename($_FILES["Image1"]["name"]) ;
    $image2=$_FILES['Image2']["name"];
    $Target2="uploadedimg/".basename($_FILES["Image2"]["name"]) ;
    $image3=$_FILES['Image3']["name"];
    $Target3="uploadedimg/".basename($_FILES["Image3"]["name"]) ;
    
  //  $Admin="Aman Negi";
 /*   if (empty($jobtype)){
    	array_push($error_array, "NAME can not be empty<br>");
   	 
     header("Location:addnewjob.php");
     exit;
  //or  Redirect_to("dashboard.php");//through functions .php
   }
   else if(strlen($jobtype)>23){
   
    array_push($error_array, "To long Name<br>");
   	 header("Location:addnewjob.php");
     exit;
   }
  else (strlen($jobtype)<3) {
  
     array_push($error_array, "To SHORT job  Name<br>");
   	 header("Location:addnewjob.php");
     exit;
   } 
    if (empty($statename)){
   	 array_push($error_array, "NAME can not be empty<br>");
   	 header("Location:addnewjob.php");
     exit;
  //or  Redirect_to("dashboard.php");//through functions .php
   }
   elseif(strlen($statename)>13){
    $_SESSION["ErrorMessage"]="To long Name";
     array_push($error_array, "state NAME can not be empty<br>");
   	 header("Location:addnewjob.php");
     exit;
   }
   else (strlen($statename)<3) {
    
    array_push($error_array, "To SHORT state Name<br>");
   	 header("Location:addnewjob.php");
     exit;
   } 
    if (empty($districtname)){
   	 
     array_push($error_array, "district NAME can not be empty<br>");
   	 header("Location:addnewjob.php");
     exit;
  //or  Redirect_to("dashboard.php");//through functions .php
     }
   elseif(strlen($districtname)>13){
   
    array_push($error_array, "To long Name<br>");
   	 header("Location:addnewjob.php");
     exit;
   }
   else (strlen($districtname)<3) {
  
     array_push($error_array, "To SHORT district Name<br>");
   	 header("Location:addnewjob.php");
     exit;
   } */
      $username = $_SESSION['username'];
       $viewongooglemap="default" ;
      //   $query1="UPDATE portal SET datetime='$datetime',name='$Name',course='$Course',age='$Age',skills='$Skills',image='$image',post='$post' WHERE id ='$PostIdFromUrl1'";

   	 //  $query1="UPDATE roominfo SET (datetime,username,landlord,address,image1,image2,image3,rent,info,levelset,status)
   	  //  VALUES('$datetime','$username','$landlord','$address','$image1','$image2','$image3','$rent','$info','$levelset','on') WHERE id ='$getid'";
        $query1="UPDATE roominfo SET 
        datetime='$datetime',username='$username',landlord='$landlord',address='$address',image1='$image1',image2='$image2',image3='$image3',rent='$rent',info='$info',levelset='$levelset',status='on' WHERE id='$getid'";
   	move_uploaded_file($_FILES["Image1"]["tmp_name"],$Target1);
   	move_uploaded_file($_FILES["Image2"]["tmp_name"],$Target2);
   	move_uploaded_file($_FILES["Image2"]["tmp_name"],$Target3);

     if (mysqli_query($con, $query1)) {
            echo "New record created successfully";
         }    
    else {
         echo "Error: " . $query1 . "<br>" . mysqli_error($con);
         }
   


}//end of the if submit*/
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
	<title></title>
</head>
<body>
<div class="container">
	<div class="row">
	
		
		<div class=" col-sm-offset-2 col-sm-6"><!--middle div-->
			<h1>Edit Rent</h1>
			
			<div>
        <?php 
                 // $ConnectingDB;
     //     $getid=$_GET['id'];
                $viewquery="SELECT * FROM roominfo WHERE id='$getid' ORDER BY datetime desc";
               $execute=mysqli_query($con,$viewquery);
             while ($dataRows=mysqli_fetch_array($execute)) {
              $updateName=$dataRows["username"];
              $updateLandlord=$dataRows["landlord"];
              $updateAddress=$dataRows["address"];
              $updateImage1=$dataRows["image1"];
              $updateImage2=$dataRows["image2"];
              $updateImage3=$dataRows["image3"];
              $updateRent=$dataRows["rent"];
              $updateLevelset=$dataRows["levelset"];
              $updateInfo=$dataRows["info"];
               }
         ?>
				<form action="editrent.php?editpost=<?php echo $getid; ?>" enctype="multipart/form-data" method="post">
					<fieldset>
						
						<div class="form-group">
						<label for="Name">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Enter landlord Name:</span></label>

						<input class="form-control" type="text" name="Landlord" id="landlord" placeholder="landlord Name' " value="<?php 
					  echo	$updateLandlord;
						?>" required>
					</div>
					<div class="form-group">
						<label for="address">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">address Name:</span></label>
     
						<textarea class="form-control" type="textarea" name="Address" id="address" placeholder="Enter Your address"  required><?php echo  $updateAddress; ?></textarea>
					</div>

				<!--	<div class="form-group">
						<label for="city Name">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">city Name:</span></label>

						<input class="form-control" type="text" name="City" id="city" placeholder="city Name" required>
					</div>

					<div class="form-group">
						<label for="city">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">State:</span></label>

						<input class="form-control" type="text" name="State" id="state" placeholder="Please Enter state name">
					</div>


					<div class="form-group">
						<label for="contact">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">contact :</span></label>
                        <input class="form-control" type="number" name="Contact" id="contact" placeholder="Please Enter contact Name">
                     </div> -->  
            <div class="form-group">
                  existing image is <img src="uploadedimg/<?php echo $updateImage1 ?>" style="width:170px;height:100px;">
					             	<label for="image1">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">image1 :</span></label>
                        <input class="form-control" type="file" name="Image1" id="image1" value="uploadedimg/<?php echo  $updateImage1; ?>" placeholder=" image1 you want">
            </div> 
              <div class="form-group">
                existing image is <img src="uploadedimg/<?php echo $updateImage2 ?>" style="width:170px;height:100px;">
						             <label for="image2">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">image2 :</span></label>
                        <input class="form-control" type="file" name="Image2" id="image2" value="<?php echo  $updateImage2; ?>" placeholder=" image2 you want">
              </div> 
              <div class="form-group">
                    existing image is <img src="uploadedimg/<?php echo $updateImage3 ?>" style="width:170px;height:100px;">
						            <label for="image3">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">image3 :</span></label>
                        <input class="form-control" type="file" name="Image3" id="image3" value="<?php echo  $updateImage3; ?>" placeholder=" image3 you want">
              </div> 
               <div class="form-group">
						             <label for="rent">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">rent :</span></label>
                        <input class="form-control" type="number" name="Rent" id="rent" value="<?php echo  $updateRent; ?>" placeholder="rent in rupees">
               </div>     
                      <div class="form-group">
						<label for="level set">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">level set:</span></label>

						<input class="form-control" type="number" name="Levelset" value="<?php echo  $updateLevelset; ?>" id="levelset">
					</div>
          <div class="form-group">
						<label for="info">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">info:</span></label>

						<textarea class="form-control"  name="Info" id="info"  placeholder="Room Discription"><?php echo  $updateInfo; ?></textarea>
					</div>

					
					
						<br>
						<input class="btn btn-success" type="submit" name="Submit" value="Add New Post">
					</fieldset><br>
				</form>
			</div>
        
		 
		</div><!--end of the middle div-->
	</div><!--end of the row div-->
	
</div><!--end of the container fluid class -->
<footer style="background-color: black" class="Footer"><hr>
	<p>Page By || Aman Negi  || &copy:2018-2020 -------All right reserved</p>
	<p>
		This Site is only used for study purpose.
	</p>
	<hr>
</footer>
</body> 
</html>
