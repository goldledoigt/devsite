<?php

header('Content-Type:text/plain');

$success = false;
$msg = "no message";

if (
  isset($_POST['message']) and strlen($_POST['message'])
  and
  isset($_POST['name']) and strlen($_POST['name'])
  and
  isset($_POST['email']) and strlen($_POST['email'])
) {

  $message = $_POST['message'];
  $user_name = $_POST['name'];
  $user_email = $_POST['email'];

  $to = 'gary@chewam.com';
  $subject = 'Chewam.com, demande de contact'; 
  $headers = "From: gary@chewam.com\r\n";
  $headers .= "Reply-To: gary@chewam.com\r\n";
  $headers .= "Content-type: text/html\r\n";

  $message = '
<h2>Demande de contact</h2>
<div>Une demande de contact a été effectuée de puis le site <a href="http://chewam.com/">chewam.com</a></div>
<br />
<br />
<div>Nom: '.$user_name.'</div>
<br />
<div>eMail: '.$user_email.'</div>
<br />
<div>Message:<br /> '.$message.'</div>
';

//send the email
$mail_sent = @mail($to, $subject, $message, $headers);
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
 if ($mail_sent) {
   $success = true;
   $msg = 'mail has been sent successfully';
 } else {
   $msg = 'Error: mail cannot be sent';
 }

}

print '{success:'.$success.', msg:"'.$msg.'"}';

?>
