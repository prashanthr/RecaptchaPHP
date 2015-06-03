<?php
/* verify.php */
/* https://github.com/prashanthr/RecaptchaPHP - Prashanth Rajaram */
include("constants.php");
$previousPageUri = $_SERVER['HTTP_REFERER'];
$successPageUri = $_SERVER['SERVER_NAME'];
if(isset($_POST['g-recaptcha-response']))
{
  $recaptchaResponse = $_POST['g-recaptcha-response'];
  $isVerified = VerifyRecaptchaResponse($recaptchaResponse);
  if(isVerified)
  {
    //Re-captcha solved correctly. Proceed...
    header('Location: '.$successPageUri);
    die();
  }
  else
  {
    //Re-captcha incorrect. Spammer alert!
    header('Location: '.$previousPageUri);
    die();
  }
}
else
{
  //Re-Captcha not solved
}

function VerifyRecaptchaResponse($recaptchaResponse)
{
  $iPAddress = $_SERVER['REMOTE_ADDR'];
  $recaptchaVerificationUri = Constants::RECAPTCHA_VERIFY_URI."?secret=".Constants::RECAPTCHA_SECRET_KEY."&response=".$recaptchaResponse."&remoteip=".$iPAddress;
  $recaptchaResponse=file_get_contents($recaptchaVerificationUri);
  if($recaptchaResponse.success==false)
  {
    return true;
  }
  return false;
}
?>
