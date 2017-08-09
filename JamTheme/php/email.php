<?php

$destination="jamthunder@aol.com";


//Variables are denoted by the '$' sign.  The POST method
//takes the 'names' from the form in your html and assigns
//them to the variables here.  The $newMes variable takes
//the info and combines it to make up the messege that will
//be sent to you.

$name=$_POST['name'];			
$email=$_POST['email'];
$company=$_POST['company'];
$phone=$_POST['phone'];		
$packages = $_POST['packages'];
$message=$_POST['message'];
$from ="Jamthunder Website";
$header="From: $name";			
$newMes="Name: $name\n
Email: $email\n			
Company: $company\n
Phone: $phone\n
Package: $packages\n
Message: $message\n";


ini_set('sendmail_from', 'jamthunder@aol.com'); //Suggested by "Some Guy"


//The 'Mail' method is what sends the email.  Notice the
//parameters are in a specific order:	(destination, 
//from, email content, header)

mail($destination,$from,$newMes,"From: Jamthunder Website");

//This line sends you to the thank you page
header( 'Location: http://www.jamthunderdj.com/#thanks' ) ;
?>

