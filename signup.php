<!--***************************old version ************************* -->

<!-- <div class="modal fade" id="signupModel" tabindex="-1" aria-labelledby="signupModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModelLabel">SignUp for S_Discuss Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/phpt/forum_project/signupheader.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="signupemail" name="signupemail"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signuppassword" name="signuppassword">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Comfirm Password</label>
                        <input type="password" class="form-control" id="signupcpassword1" name="signupcpassword">
                        <div id="emailHelp" class="form-text">Enter same password</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create account</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div> -->


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
                    <form class="form-card-form" action="/phpt/forum_project/signupheader.php" method="post">


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
