

<?php
include 'forget_password.php';
?>

<!-- ******************new version******************* -->

<div class="modal fade" id="loginModel" tabindex="-1" aria-labelledby="loginModelLabel">
    <div class="modal-dialog" >
        <div class="modal-content body-form">
                <div class="form-card">
                    <div class="form-card-image">	
                        <h2 class="form-card-heading">
                            Get started
                            <small>Let us login your account</small>
                        </h2>
                    </div>
                    <p> &nbsp;</p>
                    <form class="form-card-form" action="/loginheader.php" method="post">
                        <!-- <div class="form-input">
                            <input type="text" class="form-input-field" value="Alexander Parkinson" required/>
                            <label class="form-input-label">Full name</label>
                        </div> -->
                        <div class="form-input">
                            <input  type="email" id="loginemail" name="loginemail" class="form-input-field" required/>
                            <label for="loginemail" class="form-input-label" >Email</label>
                        </div>
                        <div class="form-input">
                            <input minlength = "8" id="loginpassword" name="loginpassword" type="password" class="form-input-field"  required/>
                            <label for="loginpassword" class="form-input-label">Password</label>
                        </div>
                        <div class="form-input mt-0">
                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#forgetpassModel">
                            Forgot password?
                        </button>
                            <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#forgetpassModel" style="text-align:right">Forgot Password?</a> -->
                        </div>
                        <div class="form-action mt-0">
                            
                            <button type = "submit" class="form-action-button" >Get started</button>
                        </div>
                    </form>
                    <div class="form-card-info">
                        <p>By signing up you are agreeing to our <a href="#">Terms and Conditions</a></p>
                    </div>
                </div>
        </div>
    </div>
</div>


