<?php
ob_start(); //Turns on output buffering 
session_start();

 date_default_timezone_set("Asia/kolkata");
    $currenttime1=time();
   $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
$con = mysqli_connect("localhost", "root", "root", "roomfinder"); //Connection variable

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

?>