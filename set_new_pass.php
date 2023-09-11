<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style.css">
    <title>S_Discuss.!</title>
</head>

<body class="boddd">
    <?php
    include('dbconnect.php');
    if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) 
    && ($_GET["action"]=="reset") && !isset($_POST["action"])){
        $key = $_GET["key"];
        $email = $_GET["email"];
        $curDate = date("Y-m-d H:i:s");
        $query = mysqli_query($conn,
        "SELECT * FROM `password_reset` WHERE `key`='".$key."' and `email`='".$email."';"
        );
        $row = mysqli_num_rows($query);
        $error="";
        if ($row==""){
            $error .= '<h2>Invalid Link</h2>
                        <p>The link is invalid/expired. Either you did not copy the correct link
                        from the email, or you have already used the key in which case it is 
                        deactivated.</p>
                        <p>back to home to reset password.</p>';
        }
        else{
            $row = mysqli_fetch_assoc($query);
            $expDate = $row['expDate'];
            if ($expDate >= $curDate){
            ?>
                <div id="forgetpassModel" tabindex="-1" aria-labelledby="forgetpassLabel">
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
                                <form class="form-card-form" method="post" action="" name="update">
                                <input type="hidden" name="action" value="update" />
                                    <div class="form-input">
                                        <input minlength = "8" type="password" name="pass1" maxlength="15" class="form-input-field" required />
                                        <label for="loginemail" class="form-input-label">Enter new password</label>
                                    </div>
                                    <div class="form-input">
                                        <input minlength = "8" type="password" name="pass2" maxlength="15" class="form-input-field" required />
                                        <label for="loginemail" class="form-input-label">Re-Enter New Password</label>
                                    </div>  
                                    <!-- <input type="hidden" name="email" value=""/> -->
                                    <div class="form-action">
                                    <input type="hidden" name="email" value="<?php echo $email;?>"/>
                                        <button type="submit" value="Reset Password" class="form-action-button">Reset Password</button>
                                    </div>
                                </form>
                                <div class="form-card-info">
                                    <p><a href="http://localhost/phpt/forum_project/index.php">Back to home</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            else{
                $error .= "<h2>Link Expired</h2>
                <p>The link is expired. You are trying to use the expired link which 
                as valid only 24 hours (1 days after request).<br /><br /></p>";
            }
        }
        if($error!=""){
            echo'
                <div>
                    <div class="form-card">
                        <div class="form-card-info">
                            <h3 style="font-color: #8597a3;"> '.$error.'</h3>
                        </div>
                        <div class="form-action mb-4">
                            <a href="http://localhost/phpt/forum_project/index.php"><button type="submit" value="Reset Password" class="form-action-button">Back to home</button></a>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>';
        }			
    }


    if(isset($_POST["email"]) && isset($_POST["action"]) &&
    ($_POST["action"]=="update")){
        $error="";
        $pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
        $pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
        $pass3 = $_POST["pass2"];
        $email = $_POST["email"];
        $curDate = date("Y-m-d H:i:s");
        if ($pass1!=$pass2){
        $error.= "<h2>Oops !</h2>
                    <p>Password do not match, both password should be same.<br /><br /></p>";
        }
        if($error!=""){
            echo'
                <div>
                    <div class="form-card">
                        <div class="form-card-info">
                        <h3 style="font-color: #8597a3;"> '.$error.'</h3>
                        </div>
                        <div class="form-action mb-4">
                            <a href="http://localhost/phpt/forum_project/set_new_pass.php?key='.$_GET["key"].'&email='.$email.'&action=reset"><button type="submit" value="Reset Password" class="form-action-button">Try again</button></a>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>';
        }
        else{
            $pass1 = md5($pass1);
            mysqli_query($conn,
            "UPDATE `users` SET `user_password`='".$pass3."', `user_dt`='".$curDate."' 
            WHERE `user_email`='".$email."';"
            );

            mysqli_query($conn,"DELETE FROM `password_reset` WHERE `email`='".$email."';");
                
            echo'<div id="forgetpassModel" tabindex="-1" aria-labelledby="forgetpassLabel">
                        <div class="modal-dialog">
                            <div class="modal-content body-form">
                                <div class="form-card">
                                    <div class="form-card-image">
                                        <h2 class="form-card-heading">
                                            Congratulations!
                                            <small>Your password has been updated successfully.</small>
                                        </h2>
                                    </div>
                                    <div class="form-action mb-4">
                                        <a href="http://localhost/phpt/forum_project/index.php"><button type="submit" value="Reset Password" class="form-action-button">Back to home</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';    
        }		
    }
    ?>

    <?php include 'footer2.php'; ?>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>