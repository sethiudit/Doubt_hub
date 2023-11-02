

<!-- **************************new version******************** -->

<div class="modal fade" id="signupModel" tabindex="-1" aria-labelledby="signupModelLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content body-form">
                <div class="form-card">
                    <div class="form-card-image">	
                        <h2 class="form-card-heading">
                            Get started
                            <small>Let us create your account</small>
                        </h2>
                    </div>
                    <p> &nbsp;</p>
                    <form class="form-card-form" action="signupheader.php" method="post">


                        <!-- <div class="form-input">
                            <input type="text" class="form-input-field" value="Alexander Parkinson" required/>
                            <label class="form-input-label">Full name</label>
                        </div> -->

                        <div class="form-input">
                            <input  type="name" id="signupfirstname" name="firstname" class="form-input-field"  required/>
                            <label for="exampleInputfirstname1" class="form-input-label" >First name</label>
                        </div>
                        <div class="form-input">
                            <input  type="name" id="signuplastname" name="lastname" class="form-input-field"  required/>
                            <label for="exampleInputlastname1" class="form-input-label" >Last name</label>
                        </div>
                        <div class="form-input">
                            <input  type="email" id="signupemail" name="signupemail" class="form-input-field"  required/>
                            <label for="exampleInputEmail1" class="form-input-label" >Email</label>
                        </div>
                        <div class="form-input">
                            <input minlength = "8" id="signuppassword" name="signuppassword" type="password" class="form-input-field" required/>
                            <label for="exampleInputPassword1" class="form-input-label">Password</label>
                        </div>
                        <div class="form-input">
                            <input minlength = "8" id="signupcpassword1" name="signupcpassword" type="password" class="form-input-field" required/>
                            <label for="exampleInputPassword1" class="form-input-label">Comfirm Password</label>
                        </div>
                        <div class="form-action">
                            <button type = "submit" class="form-action-button">Get started</button>
                        </div>
                    </form>
                    <div class="form-card-info">
                        <p>By signing up you are agreeing to our <a href="#">Terms and Conditions</a></p>
                    </div>
                </div>
        </div>
    </div>
</div>
