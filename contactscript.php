<?php

function spamcheck($field){
  //filter_var() sanitizes the e-mail
  //address using FILTER_SANITIZE_EMAIL
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
	if(filter_var($field, FILTER_VALIDATE_EMAIL))
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

// Load form field data into variables.
$sender = $_REQUEST['sender'];
$email = $_REQUEST['email'];
$subject = $_REQUEST['subject'];
$comments = $_REQUEST['comments'];

//Spam?
$mailcheck = spamcheck($_REQUEST['email']);
  if($mailcheck==FALSE)
    {
 header( "location: policy.html" );
}

//If any field is empty, error! isset($_REQUEST['sender']) && isset($_REQUEST['subject']) && isset($_REQUEST['comments']))
//if (empty($sender_name) || empty($email) || empty($subject) || empty($comments)) {
if(isset($email)){
mail("fzeroaddict@gmail.com", "From:" . $sender . "at" . $email, $subject, $comments);
header( "location: thanks.html" );
}


// If pass, send mail!
else {
header( "location: error.html" );
}

?>



