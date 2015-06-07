<?php
/* verify.php */
/* https://github.com/prashanthr/RecaptchaPHP - Prashanth Rajaram */
include("constants.php");
if(isset($_POST['successPage']))
{
  $successPageUri = $_POST['successPage'];
}
else
{
  $successPageUri = $_SERVER['SERVER_NAME'];
}
if(isset($_POST['errorPage']))
{
  $errorPageUri = $_POST['errorPage'];
}
else
{
  $previousPageUri = $_SERVER['HTTP_REFERER'];
  $errorPageUri = $previousPageUri;
}

if(isset($_POST['g-recaptcha-response']))
{
  $recaptchaResponse = $_POST['g-recaptcha-response'];
  $isVerified = VerifyRecaptchaResponse($recaptchaResponse);
  if(isVerified)
  {
    //Re-captcha solved correctly. Proceed...
    Redirect($successPageUri);    
  }
  else
  {
    //Re-captcha incorrect. Spammer alert!
    Redirect($errorPageUri);    
  }
}
else
{
  //Re-Captcha not solved
  Redirect($errorPageUri);
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

function Redirect($uri)
{
  header('Location: '.$uri);
  die();
}

?>
