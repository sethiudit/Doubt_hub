
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="S_discuss_logo.png"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <!-- <link rel="stylesheet" href="style.css">     -->

    <title>Doubt_Hub</title>
    <style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;
    }
    </style>
</head>

<body>
    <?php include 'dbconnect.php'; ?>
    <?php include 'header.php'; ?>

    <!-- ****************************************************old version code************************** -->
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- <div class="container my-4">
        <div class="alert alert-secondary">
            <h1 class="display-4">Hello Guys</h1>
            <hr class="my-4">
            <p>If you have any problem regarding to website visit so you can contact with mail.</p>
            <p>  Support mail: <b> sumitkumawat1716@gmail.com</b>
            </p>
        </div>
    </div> -->


    <!-- *******************************************new version code*********************************************** -->
    <div class="landing_page">
        <div class="responsive-container-block_contact big-container">
            <!-- <img class="bg-img" id="iq5bf"
                src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/clothes-bg.png"> -->
            <div class="responsive-container-block_contact container">
                <div class="responsive-cell-block_contact1 wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12 left-one">
                    <div class="content-box">
                        <p class="contact-text-blk section-head">
                            Support for help
                        </p>
                        <p class="contact-text-blk section-subhead">
                        Thanks for connecting with us. Please feel free to contact us through this form if you have any questions or other things about this website. We will reply as soon as.
                        </p>
                        <div class="icons-container">
                            <a class="share-icon">
                                <img class="img"
                                    src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-twitter.png">
                            </a>
                            <a class="share-icon">
                                <img class="img"
                                    src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-facebook.png">
                            </a>
                            <a class="share-icon">
                                <img class="img"
                                    src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-google.png">
                            </a>
                            <a class="share-icon">
                                <img class="img"
                                    src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-instagram.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="responsive-cell-block_contact wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-6 right-one" id="i1zj">
                    <form class="form-box"  action="/website_issue_send.php" method="post" name="reset">
                        <div class="container-block form-wrapper">
                            <p class="contact-text-blk contactus-head">
                                <a class="link" href="">
                                </a>
                                Get a quote
                            </p>
                            <p class="contact-text-blk contactus-subhead">
                                We will get back to you in 24 hours
                            </p>
                            <div class="responsive-container-block_contact">
                                <div class="responsive-cell-block_contact wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12"
                                    id="i10mt-7">
                                    <input class="contact-from-input" id="ijowk-7" name="FirstName" placeholder="First Name" style="color:#f2f2f2;" require/>
                                </div>
                                <div class="responsive-cell-block_contact wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12"
                                    id="i1ro7">
                                    <input class="contact-from-input" id="indfi-5" name="LastName" placeholder="Last Name" style="color:#f2f2f2;" require/>
                                </div>
                                <div class="responsive-cell-block_contact wk-tab-12 wk-mobile-12 wk-desk-6 wk-ipadp-6 emial"
                                    id="ityct">
                                    <input type="email" class="contact-from-input" id="ipmgh-7" name="contect_Email" placeholder="Email" style="color:#f2f2f2;" require/>
                                </div>
                                <div class="responsive-cell-block_contact wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                                    <input  type="tel" minlength = "10" pattern="[0-9]{10}" class="contact-from-input" id="imgis-6" name="PhoneNumber" placeholder="Phone Number" style="color:#f2f2f2;">
                                </div>
                                <div class="responsive-cell-block_contact wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12"
                                    id="i634i-7">
                                    <textarea aria-placeholder="Type message here" name="issue" class="contact-from-textinput" id="i5vyy-7"
                                        placeholder="Type message here" style="color:#f2f2f2;"></textarea>
                                </div>
                            </div>
                            
                            <button class="submit-btn">
                                Get quote
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include 'footer2.php'; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>