<?php
/* example.php */
/* github.com/prashanthr/RecaptchaPHP - Prashanth Rajaram */
include('constants.php')
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="recaptchaApi.js" />
</head>
<body>
  <div>
    <form id="login_form" action="verify.php" method="post">
      <input type="email" placeholder="Your e-mail" /><br>
      <input type="password" placeholder="Your password" /><br>
      <div class="g-recaptcha" data-sitekey="<?php echo Constants::RECAPTCHA_SITE_KEY  ?>"></div>
      <input type="submit" name="submit" value="Login"><br><br>
    </form>
  </div>
</body>
</html>
