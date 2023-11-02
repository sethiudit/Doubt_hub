<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    include('dbconnect.php');
    if(isset($_POST["contect_Email"]) && (!empty($_POST["contect_Email"]))){
        $email = $_POST["contect_Email"];
        $first_name = $_POST["FirstName"];
        $last_name = $_POST["LastName"];
        $number = $_POST["PhoneNumber"];
        $issue_des = $_POST["issue"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $error = "";
        if (!$email){
            $error .="Invalid email address please type a valid email address!";
        }
        if($error!=""){
            header("Location: index.php?issue_email=false&issue_email=$error");
            exit();
        }
        else{
            $output='<p>from userside,</p>';
            $output.='<p>-------------------------------------------------------------</p>';
            $output.='
            
<pre>            firstName: '.$first_name.'
            lastname: '.$last_name.'
            email: '.$email.'
            contect number: '.$number.'
            problem discription: '.$issue_des.'</pre>';		
            $output.='<p>-------------------------------------------------------------</p>';	
            $output.='<p>Thanks</p>';
            $body = $output; 
            $subject = "Website_issue";
            $email_to = "sethiudit2000@gmail.com";
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
                $error .=$mail->ErrorInfo;
                header("Location: index.php?issue_email=false&issue_email=$error");
                exit();
            }
            else{
                header("Location: index.php?issue_email=true");
                exit();
            }
        }
    }
    else{
        $error .="Please try again your submissions";
        header("Location: index.php?issue_email=false&issue_email=$error");
        exit();
    }
?>
