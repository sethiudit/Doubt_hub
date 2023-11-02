<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
include('dbconnect.php');
if(isset($_POST["forgetemail"]) && (!empty($_POST["forgetemail"]))){
$email = $_POST["forgetemail"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$error = "";
if (!$email) {
   $error .="<div class='position-absolute alert alert-danger alert-dismissible fade show my-0 m-4 mt-4' role='alert' style='width:400px;'>
   <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img'>
     <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
   </svg>
   <strong></strong>Invalid email address please type a valid email address!
   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
 </div>";
   }else{
   $sel_query = "SELECT * FROM `users` WHERE user_email='".$email."'";
   $results = mysqli_query($conn,$sel_query);
   $row = mysqli_num_rows($results);
   if ($row==""){
   $error .= "<div class='position-absolute alert alert-danger alert-dismissible fade show my-0 m-4 mt-4' role='alert' style='width:400px;'>
   <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img'>
     <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
   </svg>
   <strong></strong>No user is registered with this email address!
   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
 </div>";
   }

  }
   if($error!=""){
   echo $error;
   }else{
   $expFormat = mktime(
   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d H:i:s",$expFormat);
   $key = md5(2418* 2);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey;

mysqli_query($conn,
"INSERT INTO `password_reset` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$output='<p>Dear user,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="http://doubt-hub.free.nf/set_new_pass.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">
http://doubt-hub.free.nf/set_new_pass.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';   	
$output.='<p>Thanks,</p>';
$output.='<p>Doubt Hub</p>';
$body = $output; 
$subject = "Password Recovery - Doubt_Hub";
$email_to = $email;
$fromserver = "cyber2sk@gmail.com"; 



$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com"; 
$mail->SMTPAuth = true;
$mail->Username = "cyber2sk@gmail.com"; 
$mail->Password = "sjfazpmjejnqhuxp"; 
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->IsHTML(true);
$mail->From = "cyber2sk@gmail.com";
$mail->FromName = "Doubt_Hub";
$mail->Sender = $fromserver;
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);

if(!$mail->Send()){
echo" <div class='position-absolute alert alert-danger alert-dismissible fade show my-0 m-4 mt-4' role='alert' style='width:400px;'>
<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img'>
  <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
</svg>
<strong></strong>".$mail->ErrorInfo."
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}else{
    echo "<div class='position-absolute alert alert-success alert-dismissible fade show my-0 m-4 mt-4' role='alert' style='width:400px;' >
            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img'>
              <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
            </svg>
            <strong>Succes!</strong>An email has been sent to you with instructions on how to reset your password.!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
	}
   }
}else{

?>
<!-- ********************************************************************************************************************* -->
<div class="modal fade bottom-right" id="forgetpassModel" tabindex="-1" aria-labelledby="forgetpassLabel">
    <div class="modal-dialog">
        <div class="modal-content body-form">
            <div class="form-card">
                <div class="form-card-image">
                    <h2 class="form-card-heading">
                        Get started
                        <small>Let us forget your password</small>
                    </h2>
                </div>
                <p> &nbsp;</p>
                <form class="form-card-form" method="post" action="" name="reset">
                    <div class="form-input">
                        <input type="email" id="forgetemail" name="forgetemail" class="form-input-field" required />
                        <label for="loginemail" class="form-input-label">Enter valid email</label>
                    </div>
                    <div class="form-action">

                        <button type="submit" class="form-action-button">Forget Password</button>
                    </div>
                </form>
                <div class="form-card-info">
                    <p>By signing up you are agreeing to our <a href="#">Terms and Conditions</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var loginModel = new bootstrap.Modal(document.getElementById('loginModel'));
    var forgetpassModel = new bootstrap.Modal(document.getElementById('forgetpassModel'));

    var forgetPasswordButton = document.querySelector('[data-bs-target="#forgetpassModel"]');
    forgetPasswordButton.addEventListener('click', function() {
        loginModel.hide();
    });

    var loginButton = document.querySelector('[data-bs-target="#loginModel"]');
    loginButton.addEventListener('click', function() {
        forgetpassModel.hide();
    });
});
</script>