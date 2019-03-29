<?php 
require "includes/config/connection.php";
//require "includes/config/header/header.php";
//require "includes/config/header/login_header.php";
$fname="";
$lname="";
$email="";
$email2="";
$password="";
$Password2="";
$date="";
$error_array=array();
if(isset($_POST['register_button'])){
	
	$fname=mysqli_real_escape_string($con,$_POST['reg_fname']);
	$lname=str_replace(' ', '', $fname);//remove spaces..
	$fname=ucfirst(strtolower($fname));
	$_SESSION['reg_fname']=$fname;//store first name into session variable
  
	
	$lname=mysqli_real_escape_string($con,$_POST['reg_lname']);
	$lname=str_replace(' ', '', $lname);//remove spaces..
	$lname=ucfirst(strtolower($lname));
    $_SESSION['reg_lname']=$lname;
   
	
	$email=mysqli_real_escape_string($con,$_POST['reg_email']);
	$email=str_replace(' ', '', $email);//remove spaces..
	$email=ucfirst(strtolower($email));
     $_SESSION['reg_email']=$email;
   
	$email2=mysqli_real_escape_string($con,$_POST['reg_email2']);
	$email2=str_replace(' ', '', $email2);//remove spaces..
	$email2=ucfirst(strtolower($email2));
	$_SESSION['reg_email2']=$email2;

	$password=mysqli_real_escape_string($con,$_POST['reg_password']);
	$password=str_replace(' ', '', $password);//remove spaces..
	$password=ucfirst(strtolower($password));
    $date="y-m-d"; 

	$password2=mysqli_real_escape_string($con,$_POST['reg_password2']);
	$password2=str_replace(' ', '', $password2);//remove spaces..
	$password2=ucfirst(strtolower($password2));
	$_SESSION['reg_password']=$password;

	if ($email==$email2) {
		if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$email=filter_var($email,FILTER_VALIDATE_EMAIL);
			$check=mysqli_query($con,"SELECT email FROM social where email='$email'");
			$num_rows=mysqli_num_rows($check);
			if ($num_rows>0) {
			array_push($error_array, "Email already exist<br>");
			}
		}
		else
		{
			array_push($error_array, "Invaid email format<br>");
		}
	}//end of email if
	else{
		array_push($error_array, "Please enter valid email<br>");
	}
    if (strlen($fname>25)||strlen($fname<2)) {
    	array_push($error_array, "length of character should be bigger than 2 and below 25<br>");
    }

     if (strlen($lname>25)||strlen($lname<2)) {
    	array_push($error_array, "character length must be between 2 to 25<br>");
    }

    if ($password!=$password2) {
    	
    	array_push($error_array, "Your  Password do not match '<br>' please enter valid password<br>");
    }
    else{
    	if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)){
    	///[^A-Za-z0-9]/
    		array_push($error_array, "your password can only contain character or number<br>");
    	}
    }//end of else

    if (strlen($password>40||strlen($password<5))) {
       
         array_push($error_array, "your password must be between 5 and 40 character<br>");
    }
	
		$password=md5($password);
		$username=strtolower($fname."_".$lname);
		$check_user_query=mysqli_query($con,"SELECT username from social where username='$username'");
		$i=0;
		while(mysqli_num_rows($check_user_query)!=0){
			$i++;
			$username=$username."_".$i;
			$check_user_query=mysqli_query($con,"SELECT username from social where username='$username'");
   		}//end of while
	//	$rand=rand(1,2);
		//if($rand==1){
	    $profile ="profile/head_red.png";	
		//}
	   // else if($rand==2{
		//$profile ="profile/red_carrot.png";
		//}
		//$query=mysqli_query($con,"insert into social values('','$fname','$lname','$username','$email','$password','&date','$profile','0','0','NO',',')");
		//
		
		echo $username;
		$query="INSERT INTO social (firstname,lastname,username,email,password,signupdate,profilepic,num_post,num_likes,user_closed,friend_array) VALUES ('$fname','$lname','$username','$email','$password','$date','$profile','0','0','NO',',')";
		//$execute=mysqli_query($con,$query);
		 	$execute=mysqli_query($con,$query);
   	if ($execute) {
   		
   		header("Location:index.php");
   	}
   	else {
         echo "Error: " . $query . "<br>" . mysqli_error($con);
         }

   	
		 array_push($error_array, "<span style='color: #14C800;'>Successfully registered</span><br>");
		

		//Clear session variables 
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";
		$_SESSION['reg_password'] = "";
		$_SESSION['reg_password2'] = "";
	
   }//end of isset function
    
    if(isset($_POST['login_button'])) {

	$email = filter_var(mysqli_real_escape_string($con,$_POST['log_email']), FILTER_SANITIZE_EMAIL); //sanitize email
    echo $email;
    //$email=mysqli_real_escape_string($con,$_POST['log_email']);
	$_SESSION['log_email'] = $email; //Store email into session variable 
	//$password = md5($_POST['log_password']); //Get password
    $password=mysqli_real_escape_string($con,md5($_POST['log_password']));
   echo $password;
	$check_database_query = mysqli_query($con, "SELECT * FROM social WHERE email='$email' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$username = $row['username'];

		$user_closed_query = mysqli_query($con, "SELECT * FROM social WHERE email='$email' AND user_closed='yes'");
		if(mysqli_num_rows($user_closed_query) == 1) {
			$reopen_account = mysqli_query($con, "UPDATE social SET user_closed='no' WHERE email='$email'");
		}

		$_SESSION['username'] = $username;
		header("Location: index.php");
		exit();
	}
	else {
		array_push($error_array, "Email or password was incorrect<br>");
	}


}

?>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<form action="registerdemo.php" method="POST">
		<input type="email" name="log_email" placeholder="Email Address" value="<?php 
		if(isset($_SESSION['log_email'])) {
			echo $_SESSION['log_email'];
		} 
		?>" required>
		<br>
		<input type="password" name="log_password" placeholder="Password">
		<br>
		<?php if(in_array("Email or password was incorrect<br>", $error_array)) echo  "Email or password was incorrect<br>"; ?>
		<input type="submit" name="login_button" value="Login">
		<br>

	</form>

	<form action="registerdemo.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First Name" value="<?php 
		if(isset($_SESSION['reg_fname'])) {
			echo $_SESSION['reg_fname'];
		} 
		?>" required>
		<br>
		<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
		
		


		<input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
		if(isset($_SESSION['reg_lname'])) {
			echo $_SESSION['reg_lname'];
		} 
		?>" required>
		<br>
		<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>

		<input type="email" name="reg_email" placeholder="Email" value="<?php 
		if(isset($_SESSION['reg_email'])) {
			echo $_SESSION['reg_email'];
		} 
		?>" required>
		<br>

		<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
		if(isset($_SESSION['reg_email2'])) {
			echo $_SESSION['reg_email2'];
		} 
		?>" required>
		<br>
		<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
		else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>";
		else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>


		<input type="password" name="reg_password" placeholder="Password" required>
		<br>
		<input type="password" name="reg_password2" placeholder="Confirm Password" required>
		<br>
		<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
		else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
		else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?>


		<input type="submit" name="register_button" value="Register">
		<br>

		<?php if(in_array("<span style='color: #14C800;'>successfully registered</span><br>", $error_array)) echo "<span style='color: #14C800;'>successfully registered</span><br>"; ?>
	</form>


</body>
</html>