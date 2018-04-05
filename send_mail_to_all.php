<?php

print_r($send);
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailer-master/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.ergo.com.ph";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 26;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "itsupport@ergo.com.ph";
//Password to use for SMTP authentication
$mail->Password = "Ergo@2017";
//Set who the message is to be sent from
$mail->setFrom('itsupport@ergo.com.ph', 'ERGO IT Support');
//Set an alternative reply-to address
$mail->addReplyTo('itsupport@ergo.com.ph', 'ERGO IT Support');
//Set who the message is to be sent to
foreach($send as $s)
{
	$mail->addAddress(' '.$s["email"].' ', ' '.$s["first_name"].' '.$s["last_name"].' ');
}
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('PHPMailer-master/examples/contents.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    echo '
   			<script>
				alert("Emails were successfuly sent.");
			</script>
		 ';
    return TRUE;
}