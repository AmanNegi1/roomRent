<?php
//require "includes/config/connection.php";
//require "includes/config/header/header.php";
//require "includes/config/header/login_header.php";
$fname="";
$lname="";
$email="";
$email2="";
$password="";
$Password2="";
$datetime="";
$contact="";
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
 
      date_default_timezone_set("Asia/kolkata");
     $currenttime1=time();
     $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
    // $datetime=strftime("%m-%d-%y",$currenttime1);
     $datetime;
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
		//
		
	
		$query="INSERT INTO social (firstname,lastname,username,email,password,signupdate,profilepic,num_post,num_likes,user_closed,friend_array) VALUES ('$fname','$lname','$username','$email','$password','$datetime','$profile','0','0','NO',',')";
		//$execute=mysqli_query($con,$query);
		 	$execute1=mysqli_query($con,$query);
		 //	header("Location: index.php");
   	if ($execute1) {
   		header("Location: index.php");
   	
   	}
   	else {
         echo "Error: " . $query . "<br>" . mysqli_error($con);

         }
}
   	
		 array_push($error_array, "<span style='color: #14C800;'>Successfully registered</span><br>");
		
    
		//Clear session variables 
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";
		$_SESSION['reg_password'] = "";
		$_SESSION['reg_password2'] = "";
	
   //end of isset function
    ?>