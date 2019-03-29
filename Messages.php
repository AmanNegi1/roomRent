<?php
//require_once 'config/config.php';
$getmessid=$_GET['messId'];
 ?>

<?php include 'includes/headsection.php';  ?>
<?php include 'includes/navheader.php';  ?></ul></div></div></nav>
 <?php
  if (isset($_POST['Submit'])) {
  	   $Message=mysqli_real_escape_string($con,$_POST["Message"]);
  	     date_default_timezone_set("Asia/kolkata");
       $currenttime1=time();
       $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
       

       $query="INSERT INTO messages (user_to,user_from,body,date) values ('$getmessid','$userLoggedIn','$Message','$datetime')";
         if (mysqli_query($con, $query)) {
            echo "New record created successfully";
         }    
    else {
         echo "Error: " . $query . "<br>" . mysqli_error($con);
         }   
        }   
  ?>
<div class="container">
<taxtarea placeholder="Enter Your Message Here"  name="Message" id="message"></taxtarea>
   <table>
 <center>
   	<form action="Messages.php?messId=<?php echo $getmessid;?>" method="post">
      <div class="card">
   			<textarea style="width: 8cm;height: 3cm" class="form-control" type="textarea" name="Message" id="message" placeholder="Enter Your Message Here" ></textarea>
        </div>
   		<br><br>
   		<input style="margin-left: 250px;" type="Submit" name="Submit" id="submit" class="btn btn-outline-success"><br>
   	</form>
   	</center>

   </table>
<br>
   <div class="card">
   	<?php 
    if ($userLoggedIn==$getmessid) {
      
       
      $query="SELECT * FROM messages WHERE user_to='$getmessid'";
      $execute=mysqli_query($con,$query);
         while ($datarows=mysqli_fetch_array($execute))
         {
         	$message=$datarows['body'];
         	$date=$datarows['date'];
         	$User_to=$datarows['user_to'];   
         	$User_from=$datarows['user_from'];            	      	
   	?>
   	<div class="alert alert-success"><?php echo $message;  ?> <span class="badge badge-secondary">Send By</span> <em style="color:red;"><a style="color: black" href="userprofile.php?name=<?php echo  $datarows['user_from'];?>"><?php echo $User_from; ?> </a>&nbsp;&nbsp;To&nbsp;&nbsp; <a style="color: blue;" href="userprofile.php?name=<?php echo  $datarows['user_to'];?>"><span style="color:green;">You</span><?php //echo $User_to; ?> </a> </em>	<a style="color:gray;" href="Messages.php?messId=<?php echo $User_from; ?>">&nbsp;&nbsp;Reply</a></div><?php }}else
      {
        $query="SELECT * FROM messages WHERE user_from='$userLoggedIn'";
      $execute=mysqli_query($con,$query);
         while ($datarows=mysqli_fetch_array($execute))
         {
          $message=$datarows['body'];
          $date=$datarows['date'];
          $User_to=$datarows['user_to'];   
          $User_from=$datarows['user_from'];                      
    ?>
    <div class="alert alert-success"><?php echo $message;  ?> Send by <em style="color:red;"><a href="userprofile.php?name=<?php echo  $datarows['user_from'];?>"><span style="color:blue;">You</span><?php //echo $User_from; ?> </a> &nbsp;&nbsp;To &nbsp;&nbsp; <a style="color:orange" href="userprofile.php?name=<?php echo  $datarows['user_to'];?>"><?php echo $User_to; ?> </a> </em>  <a style="color:gray;" href="">&nbsp;&nbsp;Reply</a></div><?php } 
      }
     ?>

   </div>  
   
</div>
<?php
include 'includes/footer.php';  
?>
</body>
</html>





