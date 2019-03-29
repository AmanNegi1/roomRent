<?php  

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
		header("Location: roomportal.php");
		exit();
	}
	else {
		array_push($error_array, "Email or password was incorrect<br>");
	}


}

?>