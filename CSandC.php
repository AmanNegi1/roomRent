<?php 
include "includes/headsection.php";
 include "includes/navheader.php";  

//require 'config/config.php';
    $con=mysqli_connect('localhost','root','');
            $ConnectingDB=mysqli_select_db($con,"roomfinder");
?>
<?php
if (isset($_POST['Submit'])) {
	$Country=mysqli_real_escape_string($con,$_POST["Country"]);
    echo $Country;
	$State=mysqli_real_escape_string($con,$_POST["State"]);
	echo $State;
	$City=mysqli_real_escape_string($con,$_POST["City"]);
	$Contact=mysqli_real_escape_string($con,$_POST["Contact"]);

    $query="INSERT INTO social (country,state,city,contact) values('$Country','$State','$City','$Contact') WHERE username='$userLoggedIn'";
  //  $execute=mysqli_query($con,$query);
    if (mysqli_query($con, $query)) {
            echo "New record created successfully";
         }    
    else {
         echo "Error: " . $query . "<br>" . mysqli_error($con);
         }

}//end of if
?>
</ul></div></div></nav>
	   <fieldset>
      	<table>
      		<center>
      		<form action="CSandC.php" method="post" >
      			Select Your Country:<select name="Country"><?php 
                      $viewquery="SELECT * FROM countries where id='101'";
                 $execute1=mysqli_query($con,$viewquery);
              while($dataRows=mysqli_fetch_array($execute1)) {

                     	$ID=$dataRows['id'];
                	
                     	$countryname=$dataRows['name'];
                
		     		   ?>

      				<option><?php echo $countryname; ?></option><?php } ?></select><br><br>
      			Select Your State:<select name="State">
      				<?php 
                      $viewquery="SELECT * FROM states where id='39' ";
                 $execute1=mysqli_query($con,$viewquery);
              while($dataRows=mysqli_fetch_array($execute1)) {

                     	$ID=$dataRows['id'];
                	
                     	$statename=$dataRows['name'];
                
		     		   ?>

      				<option><?php  echo $statename; ?></option><?php } ?>
      			</select><br><br>
      			Select Your Cities:<select name="City">
      			      				<?php 
                      $viewquery="SELECT * FROM cities WHERE state_id='39'";
                 $execute1=mysqli_query($con,$viewquery);
              while($dataRows=mysqli_fetch_array($execute1)) {

                     	$ID=$dataRows['id'];
                	
                     	$cityname=$dataRows['name'];
                
		     		   ?>

      				<option><?php echo $cityname; ?></option><?php } ?>
      			</select> <br><br>
                 
      			Enter Your Contact Number:<input type="text" name="Contact" id="contact">
      			<br><br><input style="margin-left: 300px;" type="submit" name="Submit" id="submit">     			
      		</form></center>
      	</table>
      </fieldset>
      <script>
      	
      </script>
</body>
</html>