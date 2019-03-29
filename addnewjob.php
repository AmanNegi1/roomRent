<?php 

require_once("includes/config/connection.php");

 ?>
 <?php 
$error_array=array();	
if (isset($_POST['Submit'])) {
   
	
    $jobtype=mysqli_real_escape_string($con,$_POST["Jobtype"]);
     $_SESSION['Jobtype']=$jobtype;
	 $statename=mysqli_real_escape_string($con,$_POST["Statename"]);
	  $_SESSION['Statename']=$statename;
	 $districtname=mysqli_real_escape_string($con,$_POST["Districtname"]);
	 $_SESSION['Districtname']=$districtname;
	 $cityname=mysqli_real_escape_string($con,$_POST["City"]);
	  $_SESSION['City']=$cityname;
	 $villagename=mysqli_real_escape_string($con,$_POST["Village"]);
	  $_SESSION['Village']=$villagename;
	 $qualification=mysqli_real_escape_string($con,$_POST["Qualification"]);
	  $_SESSION['Qualification']=$qualification;
	$contact=mysqli_real_escape_string($con,$_POST["Contact"]);
	 $_SESSION['Contact']=$contact;
	$jobdiscription=mysqli_real_escape_string($con,$_POST["Aboutjob"]);
	$_SESSION['Aboutjob']=$jobdiscription;
	$sallary=mysqli_real_escape_string($con,$_POST["Salary"]);
	$_SESSION['Salary']=$sallary;
	$location=mysqli_real_escape_string($con,$_POST["Address"]);
	$_SESSION['Address']=$location;
    date_default_timezone_set("Asia/kolkata");
    $currenttime1=time();
   $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
   // $datetime=strftime("%m-%d-%y",$currenttime1);
    $datetime;
    $image=$_FILES['Image']["name"];
    $Target="Upimg/".basename($_FILES["Image"]["name"]) ;
    
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
  
       $viewongooglemap="default" ;
   	   $query1="INSERT INTO jobdatabase(datetime,statename,distname,cityname,villagename,jobtype,location,qualification,contact,image,sallary,jobdiscription,viewongooglemap)
   	    VALUES('$datetime','$statename','$districtname','$cityname','$villagename','$jobtype','$location','$qualification','$contact','$image','$sallary','$jobdiscription','$viewongooglemap')";
   	

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
<div class="container-fluid">
	<div class="row">
		
		<div class="col-sm-2 "><!--side div -->
       
		<h2></h2>
		<ul id="sidebar" class="nav nav-pills nav-stacked nav-hover">
		<li><a href="dashboard.php">
         <span class="glyphicon glyphicon-th"></span>
		 &nbsp;&nbsp;Dashboard</a></li>
		<li ><a href="catagories.php"> <span class="glyphicon glyphicon-tags"></span>
		 &nbsp;&nbsp;
		Catagory</a></li>
		<li><a href="">
		 <span class="glyphicon glyphicon-th"></span>
		 &nbsp;&nbsp;Manage</a></li>
		<li class="active"><a href="addnewjob.php">
		 <span class="glyphicon glyphicon-list-alt"></span>
		 &nbsp;&nbsp;Add New Job</a></li>
		<li><a href="#">
		 <span class="glyphicon glyphicon-user"></span>
		 &nbsp;&nbsp;Manage Admins</a></li>
		<li><a href="#">
		 <span class="glyphicon glyphicon-comment"></span>
		 &nbsp;&nbsp;Commments</a></li>
		<li><a href="#">
		 <span class="glyphicon glyphicon-equalizer"></span>
		 &nbsp;&nbsp;Live Preview</a></li>
		<li><a href="#">
		 <span class="glyphicon glyphicon-log-out"></span>
		 &nbsp;&nbsp;Logout</a></li>
		</ul>

		</div><!--end of the  side div-->
		
		<div class="col-sm-10"><!--middle div-->
			<h1>Add New job</h1>
			
			<div>
				<form action="addnewjob.php" enctype="multipart/form-data" method="post">
					<fieldset>
						This is all about the job you are going to create..
						<div class="form-group">
						<label for="Name">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Enter Job type:</span></label>

						<input class="form-control" type="text" name="Jobtype" id="jobtype" placeholder="'Teacher''hotel','tuition','shop keeper' etc " value="<?php 
						if(isset($_SESSION['Jobtype'])) {
							echo $_SESSION['Jobtype'];
						} 
						?>" required>
					</div>
					<div class="form-group">
						<label for="StateName">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">State Name:</span></label>

						<input class="form-control" type="text" name="Statename" id="statename" placeholder="Enter Your State Name" value="<?php 
						if(isset($_SESSION['Statename'])) {
							echo $_SESSION['Statename'];
						} 
						?>" required>
					</div>

					<div class="form-group">
						<label for="District Name">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">District Name:</span></label>

						<input class="form-control" type="text" name="Districtname" id="districtname" placeholder="District Name" value="<?php 
						if(isset($_SESSION['Districtname'])) {
							echo $_SESSION['Districtname'];
						} 
						?>" required>
					</div>

					<div class="form-group">
						<label for="city">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">City:</span></label>

						<textarea class="form-control" type="textarea" name="City" id="city" placeholder="Please Enter city name"></textarea>
					</div>


					<div class="form-group">
						<label for="village">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Village :</span></label>
                        <input class="form-control" type="text" name="Village" id="village" placeholder="Please Enter Village Name">
                     </div>   
                     <div class="form-group">
						<label for="Qualification">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Qualification :</span></label>
                        <input class="form-control" type="text" name="Qualification" id="qualification" placeholder="Please Enter the qualification you want">
                     </div> 
                     <div class="form-group">
						<label for="contact">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">contact :</span></label>
                        <input class="form-control" type="text" name="Contact" id="contact" placeholder="Contact Number">
                     </div>     
                      <div class="form-group">
						<label for="SelectImage">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Select Images:</span></label>

						<input class="form-control" type="file" name="Image" id="image">
					</div>
                    <div class="form-group">
						<label for="about">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">about job:</span></label>

						<textarea class="form-control"  name="Aboutjob" id="aboutjob" placeholder="About job"></textarea>
					</div>

					<div class="form-group">
						<label for="salary">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Salary:</span></label>

						<input class="form-control" type="text" name="Salary" id="salary">
					</div>
					
		  		  
					<div class="form-group">
						<label for="Address">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Address:</span></label>

						<textarea class="form-control"  name="Address" id="address" placeholder="Put your address here"></textarea>
					</div>
						<br>
						<input class="btn btn-success" type="submit" name="Submit" value="Add New Post">
					</fieldset><br>
				</form>
			</div>
             <div class="table-responsive">
		  	<table class="table table-striped table-hover">
		  		<tr>
		  			<th>id</th>
		  			<th>StateName</th>
		  			<th>distname</th>
		  			<td>cityname</td>
		  			<td>villagename</td>
		  			<th>jobtype</th>
		  			<th>location</th>
		  			<th>qualification</th>
		  			<th>contact</th>
		  			<th>image</th>
		  			<th>sallary</th>
		  			<th>jobdiscription</th>
		  			<th>datetime</th>
		  			
		  		</tr>
		  		<?php 
                global $ConnectingDB;
                $viewquery="SELECT * FROM jobdatabase ORDER BY datetime desc";
               
                $execute=mysqli_query($con,$viewquery);
                $srno=1;
                while ($datarows=mysqli_fetch_array($execute)) {
                	$ID=$datarows['id'];
                	$DateTime=$datarows['datetime'];
                	$statename=$datarows['statename'];
                	$districtname=$datarows['distname'];
                	$cityname=$datarows['cityname'];
                	$villagename=$datarows['villagename'];
                	$jobtype=$datarows['jobtype'];
                	$location=$datarows['location'];
                	$qualification=$datarows['qualification'];
                	$contact=$datarows['contact'];	
                	$image=$datarows['image'];	
                	$sallary=$datarows['sallary'];	
                	$jobdiscription=$datarows['jobdiscription'];
                	$viewongooglemap=$datarows['viewongooglemap'];				
                	
                   
		  		 ?>
		  		 <tr>
		  		 	<td><?php echo $srno; ?></td>
		  		 	<td><?php echo $DateTime ?></td>
		  		 	<td><?php echo $statename?></td>
		  		 	<td><?php echo  $districtname; ?></td>
		  		 	<td><?php echo $cityname; ?></td>
		  		 	<td><?php echo  $villagename; ?></td>
		  		 	<td><?php echo  $jobtype; ?></td>
		  		 	<td><?php echo  $location; ?></td>
		  		 	<td><?php echo  $qualification; ?></td>
		  		 	<td><?php echo  $contact; ?></td>
		  		 	<td><?php echo  $image; ?></td>
		  		 	<td><?php echo  $sallary; ?></td>
		  		 	<td><?php echo  $jobdiscription; ?></td>
		  		 	<td><?php echo  $viewongooglemap; ?></td>
		  		 </tr>
		  		 <?php 
		  		  $srno++;
  }//end of the while loop
		  		  ?>
		  	</table>
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
