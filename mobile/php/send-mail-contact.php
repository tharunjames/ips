<?php
	$addres = "moin@ipossoft.com"; /*Your Email*/
	$addres1 = "yasir@ipossoft.com"; /*Your Email*/
	$subject = "website enquiry"; /*Issue*/
	$date = date ("l, F jS, Y"); 
	$time = date ("h:i A"); 	
	$Email=$_REQUEST['Email'];

	$msg="
	Name: $_REQUEST[Name]
	Email: $_REQUEST[Email]
	Email: $_REQUEST[Phone]
	Message sent from website on date  $date, hour: $time.\n

	Message:
	$_REQUEST[message]";

	if ($Email=="") {
		echo "<div class='alert alert-danger'>Please enter your email</div>";
	}
	else{
		mail($addres, $subject, $msg, "From: $_REQUEST[Email]");
		mail($addres1, $subject, $msg, "From: $_REQUEST[Email]");
		echo "<div class='alert alert-success'>Thank you for your message..</div>";	
	}
	
?>
