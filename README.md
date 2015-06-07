# RecaptchaPHP
A Google recaptcha adapter in PHP for your project needs
## Usage
Edit the constants.php file and replace the empty constants with your site information (site key & secret key).
```PHP
class Constants 
{
  const RECAPTCHA_SECRET_KEY = "[YOUR_SECRET_KEY]";
  const RECAPTCHA_SITE_KEY = "[YOUR_SITE_KEY]";
  const RECAPTCHA_VERIFY_URI = "https://www.google.com/recaptcha/api/siteverify";
}
```
Refer to ```example.php```. In any of your pages where you need to display a re-captcha element, add the following to the ```<form>``` element.
```html
      <div class="g-recaptcha" data-sitekey="<?php echo Constants::RECAPTCHA_SITE_KEY  ?>"></div>
      <!--BEGIN OPTIONAL INPUTS-->
      <input type="hidden" name="successPage" value="http://www.google.com/" />
      <input type="hidden" name="errorPage" value="http://www.google.com/error" />
      <!--END OPTONAL INPUTS-->
      <input type="submit" name="submit" value="Login"><br><br>
```
