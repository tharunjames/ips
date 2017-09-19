<?php
	$addres = "moin@ipossoft.com"; /*Your Email*/
	$addres1 = "yasir@ipossoft.com"; /*Your Email*/
	$subject = "website enquiry"; /*Issue*/
	$date = date ("l, F jS, Y"); 
	$time = date ("h:i A"); 	
	$Email=$_REQUEST['Email'];
	$captcha = $_REQUEST['g-recaptcha-response'];
	$secret = "6LfayBQUAAAAADtiBU5uwqDN8rvFSFXQ9ZydoM-v";

	$msg="
	Name: $_REQUEST[Name]
	Email: $_REQUEST[Email]
	phone: $_REQUEST[Phone]
	Message sent from iPOS website on date  $date, hour: $time.\n

	Message:
	$_REQUEST[message]";

	if ($Email=="") {
		echo "<div class='alert alert-danger'>Please enter your email</div>";
	}
	else{
		$response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['success'] == false)
        {
          echo "<div class='alert alert-failed'>you are a spammer..</div>";	
        }
        else
        {
		mail($addres, $subject, $msg, "From: $_REQUEST[Email]");
		mail($addres1, $subject, $msg, "From: $_REQUEST[Email]");
		echo "<div class='alert alert-success'>Thank you for your message..</div>";	
		}
	}
	
?>
