
 <?php 
    include 'includes/navheader.php'; 
    ?>     
      
       
       </ul>
     </div><!-- /.navbar-collapse -->
</nav>
 <?php 
$error_array=array();	
if (isset($_POST['Submit'])) {
   
	
    $landlord=mysqli_real_escape_string($con,$_POST["Landlord"]);
     $_SESSION['Landlord']=$landlord;

    $contact=mysqli_real_escape_string($con,$_POST["Contact"]);
     $_SESSION['Contact']=$contact; 
	
	 $address=mysqli_real_escape_string($con,$_POST["Address"]);
	  $_SESSION['Address']=$address;

    $Cat1=0;
   // $_SESSION['cat1']=$Cat1;

    $CatPeople=mysqli_real_escape_string($con,$_POST["CATNAME"]);
    $_SESSION['CATNAME']=$CatPeople;

    $city=mysqli_real_escape_string($con,$_POST["City"]);
    $_SESSION['City']=$city;
	
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
   	   $query1="INSERT INTO roominfo(datetime,username,landlord,address,image1,image2,image3,rent,info,levelset,status,city,cat,contact,Catagory)
   	    VALUES('$datetime','$username','$landlord','$address','$image1','$image2','$image3','$rent','$info','$levelset','on','$city',0,'$contact','$CatPeople')";
   	move_uploaded_file($_FILES["Image1"]["tmp_name"],$Target1);
   	move_uploaded_file($_FILES["Image2"]["tmp_name"],$Target2);
   	move_uploaded_file($_FILES["Image2"]["tmp_name"],$Target3);

     if (mysqli_query($con, $query1)) {
           echo "<script type='text/javascript'>alert('new record is updated');</script>";
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
<style>
a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}
    .checkbox {
        display:inline;
    }
    </style>
<body>

<div class="container">
	<div class="row">
	
		
		<div class="col-lg-8 col-md-8 col-sm-12"><!--middle div-->
			<h1>Add New Rent</h1>
			
			<div>
				<form action="addnewrent.php" enctype="multipart/form-data" method="post">
					<fieldset>
						
						<div class="form-group">
						<label for="Name">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Enter landlord Name:</span></label>

						<input class="form-control" type="text" name="Landlord" id="landlord" placeholder="landlord Name" value="<?php 
						if(isset($_SESSION['Jobtype'])) {
							echo $_SESSION['Jobtype'];
						} 
						?>" required>
					</div>
					<div class="form-group">
						<label for="address">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">address Name:</span></label>

						<textarea class="form-control" type="textarea" name="Address" id="address" placeholder="Enter location of room" value="<?php 
						if(isset($_SESSION['Address'])) {
							echo $_SESSION['Address'];
						} 
						?>" required></textarea>
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
						<label for="image1">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">image1 :</span></label>
                        <input class="form-control" type="file" name="Image1" id="image1" placeholder=" image1 you want">
                     </div> 

              

                     <div class="form-group">
						<label for="image2">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">image2 :</span></label>
                        <input class="form-control" type="file" name="Image2" id="image2" placeholder=" image2 you want">
                     </div> 
                     <div class="form-group">
						<label for="image3">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">image3 :</span></label>
                        <input class="form-control" type="file" name="Image3" id="image3" placeholder=" image3 you want">
                     </div> 
                     <div class="form-group">
						<label for="rent">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">rent :</span></label>
                        <input class="form-control" type="number" name="Rent" id="rent" placeholder="rent in rupees">
                     </div>     
                      <div class="form-group">
						<label for="level set">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Room set</span></label>

						<input class="form-control" type="number" name="Levelset" id="levelset" placeholder="number of rooms">
					</div>
           <div class="form-group">
            <label for="City">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">City :</span></label>       
             <select name="City" class="form-control" id="cityIndia">
                          <?php 
                      $viewquery="SELECT * FROM cities WHERE state_id='39'";
                 $execute1=mysqli_query($con,$viewquery);
              while($dataRows=mysqli_fetch_array($execute1)) {

                      $ID=$dataRows['id'];
                  
                      $cityname=$dataRows['name'];
                
               ?>
              <option><?php echo $cityname; ?></option><?php } ?>
            </select></div>

           <div class="form-group">
            <label for="Contact">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Contact Number</span></label>

            <input class="form-control" type="text" name="Contact" id="contact" placeholder="Enter Your Contact Number">
          </div>
                  
           <div class="form-group">
                   <label>category</label><br>
                   <select name="CATNAME" class="form-control" id="sel1">
                     <option>Boys</option>
                     <option>Girls</option>
                     <option>Family</option>
                     <option>Family_or_Girl</option>
                     <option>Boys_or_Girl</option>
                     <option>Family_or_Boys</option>
                     
                   </select>
                    <br>
            </div>
                  
                    
                    <div class="form-group">
						<label for="info">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Description</span></label>

						<textarea class="form-control"  name="Info" id="info" placeholder="detailed description about the room"></textarea>
					</div>

					
					
						<br>
						<input class="btn btn-success" type="submit" name="Submit" value="Add New Post">
					</fieldset><br>
				</form>
			</div>
           
		 
		</div><!--end of the middle div-->
		<div class="col-lg-4 col-md-4 col-sm-12">
       <img src="images/home.png">
        </div>
	</div><!--end of the row div-->
	
</div><!--end of the container fluid class -->
<?php
include 'includes/footer.php';
?>
</body> 
</html>
