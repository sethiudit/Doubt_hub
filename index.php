<?php
/*session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("Location: index.php");
  exit;
}*/
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style.css">
    <title>S_Discuss.!</title>
</head>

<body class="boddd">
    <?php include 'header.php'; ?>
    <?php include 'dbconnect.php'; ?>

    <!-- <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="http://source.unsplash.com/2400x700/?apple,code" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="http://source.unsplash.com/2400x700/?programmers,microsoft" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="http://source.unsplash.com/2400x700/?coding,apple" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>    -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">...</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

    <div class="container">
        <p> &nbsp;</p>
        <h2 class="text-center">
            <!-- <span class="underlined underline-overflow">S_Discuss</span><br>  -->
            <span class="underlined underline-clip">Browzer Categories</span>
        </h2>
    </div>
    <div class="cont">
        <div class="carousel">
            <div class="carousel__face"><span></span></div>
            <div class="carousel__face"><span></span></div>
            <div class="carousel__face"><span></span></div>
            <div class="carousel__face"><span></span></div>


            <div class="carousel__face"><span>
              <div class="logo-container aa">
                <div class="logo-holder">
                  <a class = "a-3d" href="#">
                  <!-- <i class="fa-solid fa-book-open i_3d"></i> -->
                  <div class="left_name">
                    <h3 class="h3_3d">Design by</h3>
                    <p class="p_3d">Sumit kumar...!</p>
                  </div>
                  </a>
                </div>
              </div>
              </span>
            </div>



            <div class="carousel__face"><span></span></div>
            <div class="carousel__face"><span></span></div>
            <div class="carousel__face"><span></span></div>
            <div class="carousel__face"><span></span></div>
        </div>
    </div>
    <p> &nbsp;</p>
    <p> &nbsp;</p>
    <p> &nbsp;</p>
    <p> &nbsp;</p>
    <p> &nbsp;</p>
    <p> &nbsp;</p>
    <p> &nbsp;</p>
    <p> &nbsp;</p>
    <p> &nbsp;</p>
    <!-- category cantainer start here-->
    <div class="container">
        <div class="row">
            <?php
        $sql = "SELECT * FROM `s_discuse`";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          $ci = $row['category_id'];
          $cn = $row['category_name'];
          $cd = $row['category_description'];
          echo '
          <section class="articles" style="width: 25rem;">
            <article>
              <div class="article-wrapper">
                <figure>
                  <img src="http://source.unsplash.com/400x280/?'.$cn.',coding" alt="" />
                </figure>
                <div class="article-body">
                  <h2>'.$cn.'</h2>
                  <p>
                  '.substr($cd,0,110).'...
                  </p>
                  <a href="threadlist.php?ctid='.$ci.'" class="read-more">
                    Read more <span class="sr-only">about this is some title</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
              </div>
            </article>
          </section>
          ';
        }
        ?>
        </div>
    </div>


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