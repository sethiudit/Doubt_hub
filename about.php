<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>S_Discuss.!</title>
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

<!-- ****************old version********************* -->

    <!-- <div class="container my-4">
        <div class="alert alert-secondary">
            <h1 class="display-4">welcome to our website</h1>
            <hr class="my-4">
            <p>Hello friends, this is programming language discussion website.
                We will provide a chat board for communication where you can ask your doubts and answer any other
                questions you may have.
                If you want to communicate with other users, you must first log in to the website with email and your
                personal password.
                Here you can see different threads for different programming languages, so you can see any one according
                to your profession.
            </p>
        </div>
    </div> -->

    <!-- <p> &nbsp;</p>
    <p> &nbsp;</p>
    <p> &nbsp;</p>
    <p> &nbsp;</p>
    <p> &nbsp;</p> -->

<!-- *****************************new version*************************     -->
    <div class="responsive-container-block bigContainer">
        <div class="responsive-container-block Container">
            <div class="imgContainer">
                <!-- <img class="blueDots" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/aw3.svg"> -->
                <img class="mainImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/aw2.svg">
            </div>
            <div class="responsive-container-block textSide">
                <p class="text-blk heading">
                    About Us
                </p>
                <p class="text-blk subHeading">
                Hello friends, this is programming language discussion website.
                We will provide a chat board for communication where you can ask your doubts and answer any other
                questions you may have.
                If you want to communicate with other users, you must first log in to the website with email and your
                personal password.
                Here you can see different threads for different programming languages, so you can see any one according
                to your profession.
                </p>
                <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <div class="cardImgContainer">
                        <img class="cardImg"
                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
                    </div>
                    <div class="cardText">
                        <p class="text-blk cardHeading">
                            Python
                        </p>
                        <p class="text-blk cardSubHeading">
                        Its design philosophy emphasizes code readability.
                        </p>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <div class="cardImgContainer">
                        <img class="cardImg"
                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
                    </div>
                    <div class="cardText">
                        <p class="text-blk cardHeading">
                            Java
                        </p>
                        <p class="text-blk cardSubHeading">
                           It's used in all kinds of applications like Mobile, desktop applications etc.
                        </p>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <div class="cardImgContainer">
                        <img class="cardImg"
                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
                    </div>
                    <div class="cardText">
                        <p class="text-blk cardHeading">
                            C++
                        </p>
                        <p class="text-blk cardSubHeading">
                         it can be used in developing browsers, operating systems, and applications, as well as in-game etc.
                        </p>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <div class="cardImgContainer">
                        <img class="cardImg"
                            src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
                    </div>
                    <div class="cardText">
                        <p class="text-blk cardHeading">
                            PHP
                        </p>
                        <p class="text-blk cardSubHeading">
                        It was created by Danish-Canadian programmer in 1993 and released in 1995.
                        </p>
                    </div>
                </div>
                <a href="index.php">
                    <button class="explore">
                        Explore our Services
                    </button>
                </a>
            </div>
            <img class="redDots" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/cw3.svg">
        </div>
    </div>
    <?php include 'footer2.php'; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
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