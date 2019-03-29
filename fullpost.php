<?php
include "includes/headsection.php";
//require 'config/config.php';
?>
<?php include 'includes/navheader.php'; ?>
<?php 
    $get_ses_username=$user['username'];
  //  $getstatus=
    $getid=$_GET['fullid'];
   // if ($user['status']==" "){

  //   header("Location:Fullpost.php?fullid={$getid}");
  //  }
  //  $query="SELECT status FROM social";
   // $execute=mysqli_query($con,$query);
   // while ($datarows=mysqli_fetch_array($execute)) {   
if (isset($_POST['Submit'])) {

 $con = mysqli_connect("localhost", "root", "root", "roomfinder"); //Connection variable
    $Comment=mysqli_real_escape_string($con,$_POST["Comment"]);
    echo $Comment;
    date_default_timezone_set("Asia/kolkata");
    $currenttime=time();
    $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime);
    $datetime;
    //  $urlId = $_GET["ID"];
    echo $Comment;
    if (empty($Comment)){
    // $PostIdFromUrl=$_GET['id'];
     echo "please fill comment";
    //or  Redirect_to("dashboard.php");//through functions .php
   }
   elseif(strlen($Comment)>500){
    
  echo "Number of character should  be less than 500";
  }
   else{
     /*  $sessuser=$user['username'];
      echo $sessuser;
        $query = mysqli_query($con, "INSERT INTO posts (body,added_by,date_added,deleted,likes,social_id) VALUES('$Comment', '$sessuser', '$datetime', 'no', '0','$getid')");
    $execute1=mysqli_query($con,$query1);
    if ($execute1) {
        echo "successfully added";
         header("Location:FullPost.php?fullid={$getid}");
      //  header("Location:FullPost.php");
    }
    else{
          echo mysqli_error($con);
          echo "failed to add";
          header("Location:FullPost.php?fullid={$getid}");
        //header("Location:FullPost.php");
    }
   }//end of the else*/
  $Comment = strip_tags($Comment); //removes html tags 
    $Comment = mysqli_real_escape_string($con, $Comment);
     $check_empty = preg_replace('/\s+/', '', $Comment); //Deltes all spaces 
  if($check_empty != "") {
      //Current date and time
      $date_added = date("Y-m-d H:i:s");
      //Get username
      $added_by = $user['username'];
    //  echo $Comment;
       $query = "INSERT INTO posts(body,added_by,date_added,deleted,likes,social_id) VALUES('$Comment', '$added_by', '$date_added', 'no', '0','$getid')";
       $execute=mysqli_query($con,$query);
       echo $query;
          if ($execute) {
              header("Location:fullpost.php?fullid={$getid}");
              echo "successfully added";
          }
          else {
                // header("Location:fullpost.php?fullid={$getid}");
                   echo mysqli_error($con);
      echo "failed to add";
               }
}
}}//end of the if submit
  ?>

     </div><!-- /.navbar-collapse -->
</nav>
<div class="container">
	<div class="row" >
		<?php 
	//	$userSess=$_SESSION['username'];
          $query="SELECT * FROM roominfo WHERE id='$getid' ORDER BY datetime desc";
          $execute=mysqli_query($con,$query);
          while ($datarows=mysqli_fetch_array($execute)) {
           $Image1=$datarows["image1"];
           $Image2=$datarows["image2"];
           $Image3=$datarows["image3"];
           $username=$datarows["username"];
           $CAT=$datarows['Catagory'];
		?>
	
	
          <div class="col-lg-6 col-md-4 col-sm-12">
			  <div id="myCarousel" style="height:8cm;" class="carousel slide" data-ride="carousel">
			    <!-- Indicators -->
			    <ol class="carousel-indicators">
			      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			      <li data-target="#myCarousel" data-slide-to="1"></li>
			      <li data-target="#myCarousel" data-slide-to="2"></li>
			    </ol>

			    <!-- Wrapper for slides -->
			    <div class="carousel-inner"  >
			      <div class="item active"  >
			     <center>   <img class="img-responsive" style="overflow: hidden;border-radius:10px; height: 300px;width:550px " src="uploadedimg/<?php echo $Image1; ?>" alt="Not Available" style="width:100%;"></center>
			      </div>

			      <div class="item" >
			         <center>   <img  class="img-responsive" style="overflow: hidden; border-radius:10px; height: 300px;width:550px ;"  src="uploadedimg/<?php echo $Image2; ?>" alt="Not Available" style="width:100%;"></center>
			      </div>
			    
			      <div class="item" >
			         <center>   <img class="img-responsive" style="overflow: hidden; border-radius:10px;height: 300px;width:550px " src="uploadedimg/<?php echo $Image3; ?>" alt="Not Available" style="width:100%;"></center>
			      </div>
			    </div>

			    <!-- Left and right controls -->
			    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			      <span class="glyphicon glyphicon-chevron-left"></span>
			      <span class="sr-only">Previous</span>
			    </a>
			    <a class="right carousel-control" href="#myCarousel" data-slide="next">
			      <span class="glyphicon glyphicon-chevron-right"></span>
			      <span class="sr-only">Next</span>
			    </a>
			  </div>
			  <h3>Images of Room</h3>
            </div>
		    <div class="col-lg-6 col-md-8 col-sm-12">
		    	    <blockquote>
		           <h4><cite title="Source Title">Published By:<a style="color: blue;" href="userprofile.php?name=<?php echo $username; ?>"><?php echo $datarows['username']; ?></a></cite></h4>
		           
		            </blockquote>
		            <blockquote>
		           <h4><cite title="Source Title">Owner:<?php echo $datarows['landlord']; ?></cite></h4>
		           
		            </blockquote>
                 <blockquote>
                       
                         <p> City : <?php echo $datarows['city']; ?>
                   
                </blockquote>
		             <blockquote>
                         <h4><cite title="Source Title">Rent : <?php echo $datarows['rent']; ?></cite></h4>
		                   
		            </blockquote>
		            <blockquote>
                    
                <h4><cite title="Source Title">Category :<?php echo $CAT; ?></h4>
                     
                         

                   

		                
		            </blockquote>
		          
		            
                </div>
		        
		        <div class="col-sm-12 col-md-12 col-lg-12">
                  <label>Details</label> <br>
                   <p> Address : <?php echo $datarows['address']; ?>
		               <BR>
		                Published on <?php echo $datarows['datetime']; ?><BR>
                    
		                 Room set : <?php echo $datarows['levelset']; ?>
		            </p>
		            <br>
		            <label>Description</label>
		            <div class="well">
		            	<?php echo $datarows['info']; ?>
		            </div>
          
              </div>
              <br>

	<!--	<div class="col-sm-1-offset col-sm-4">
			<?php //echo $datarows['rent']; ?>
		</div>-->
		<?php } ?>
	</div>
	 <div class="row">
            <div class="col-sm-10">
               <form action="fullpost.php?fullid=<?php echo $getid; ?>" enctype="multipart/form-data" method="post">
                    <fieldset>
                   <!-- <div class="form-group">
                        <input type="email" class="form-control"  name="Email" id="email" placeholder="Email">
                    </div>-->
                    
                    <div class="form-group">
                        <label for="Comment">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Comment:</span></label>

                        <textarea class="form-control"  name="Comment" id="comment" placeholder="Comment"></textarea>
                    </div>
                        <br>
                        <input class="btn btn-success" type="submit" name="Submit" value="Post">
                    </fieldset><br>
                </form>
              </div>
              </div> <!--end of row class...    -->
          <?php 
           // $userid=user['id'];
        //     $postcomts=$_GET['id'];
             
     
             $executeComts="SELECT * FROM posts WHERE social_id='$getid' ORDER BY date_added desc";
             $execute=mysqli_query($con,$executeComts);

            while ($datarows=mysqli_fetch_array($execute)) {
                 
                    $ComDateTime=$datarows['date_added'];
                    $added_by=$datarows['added_by'];
                    $Commment=$datarows['body'];
           
              ?>
              <div style="background-color: #d5ddea;border-radius: 10px;overflow: hidden;">
                   <img  class="pull-left" src="assets/images/profile_pics/defaults/head_green_sea.png" style="border-radius: 10px;margin-left: 10px;margin-right:20px;margin-top: 20px;width: 2cm;height: 3cm;position: relative;overflow: hidden;">
                   <br>
                    <p style="margin-left: 80px;"><?php echo $ComDateTime; ?></p>
                    <?php $query1="SELECT username FROM roominfo WHERE id='$getid'";
                    //  $execute1=mysqli_query($con,$query1);
                   //   $datarows1=mysqli_fetch_array($execute1)?>
                  <p style="margin-left: 80px;">Posted by: <a href="userprofile.php?name=<?php echo  $datarows['added_by'];?>"><?php echo $added_by; ?> </a> </p>
                   <p style="margin-left: 80px;">  <div class="well"><?php echo $Commment; ?> </div> </p>
                 
                   <hr> 
              </div><br>
             <?php }//end of the while loop ?>
            
          
          
</div>
 <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
 <?php
include 'includes/footer.php';
?>
</body>
</html>