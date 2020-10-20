<?php
   $captcha_publickey = "6LdRaXEUAAAAAFpiyXOCbnUN7uaV4mpdrrVCJlPF";

   $get_requested_captcha = $<strong>_POST</strong>['g-recaptcha-response'];
 
   if (isset($_REQUEST['submit-form'])){
      if(isset($get_requested_captcha) && !empty($get_requested_captcha))
      {
         //do stuff if successful check
      }
      else{
           //error captcha
      }
   }
?>