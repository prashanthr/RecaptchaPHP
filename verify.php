<?php
/* verify.php */
/* https://github.com/prashanthr/RecaptchaPHP - Prashanth Rajaram */
include("constants.php");
$previousPage = $_SERVER['HTTP_REFERER'];
$iPAddress = $_SERVER['REMOTE_ADDR'];
if(isset($_POST['g-recaptcha-response']))
{
  $reCaptchaResponse = $_POST['g-recaptcha-response'];
}
else
{
  //Re-Captcha not solved
}

$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret="."[YOUR SECRET KEY]"."&response=".$reCaptchaResponse."&remoteip=".$iPAddress);
if($response.success==false)
{
  echo "Re-captcha incorrect. You are spammer!";
}
else
{
  echo "Re-captcha solved correctly.";
}

?>
