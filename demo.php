<?php
	$Connection=mysqli_connect('localhost','root','root');
	$ConnectingDB=mysqli_select_db($Connection,"smartvillege");
	if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }else{

  }
if (isset($_POST['submit'])) {
      
       $fname=mysqli_real_escape_string($Connection,$_POST['FName']);
       echo $fname;
        $lname=mysqli_real_escape_string($Connection,$_POST['Lname']);
       echo $lname;
         $email=mysqli_real_escape_string($Connection,$_POST['Email']);
         echo $email;
       $query="insert into user (fname,lname,email) values ('$fname','$lname','$email')";
       	$execute=mysqli_query($Connection,$query);
   	if ($execute) {
   		
   		header("Location:index.php");
   	}
   //   query="INSERT INTO catagory(datetime,name,creatorname)VALUES('$datetime','$Catagory','$Admin')";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>demo</title>
</head>
<body>
<form action="demo.php" method="post">
	fname:<input type="text" name="FName">
	lname:<input type="text" name="Lname">
	Email:<input type="email" name="Email">
	<input type="submit" name="submit">
</form>
</body>
</html>