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

<body>
    <?php
  
    session_start();
    echo '<nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><span class="underlined underline-overflow">S_Discuss</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav_bar_design">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdown">';
            
            require 'dbconnect.php';
            $sql = "SELECT category_id, category_name FROM `s_discuse` ";
            $result = mysqli_query($conn,$sql);
            // $num=mysqli_num_rows($result);

            // if($num>=1){
            //   echo 'yes';
            // }
            // else{
            //   echo 'no';
            // }
            while($row = mysqli_fetch_assoc($result)){
              echo '<a class="dropdown-item"  href="threadlist.php?ctid='.$row['category_id'].'">'.$row['category_name'].'</a>';
            }

            echo '</ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contact.php">Contact</a>
          </li>
        </ul>
          <div>
        <form class="search-box" action="search.php" method="get">
          <input type="text" name="search" placeholder="Search ">
          <button type="reset">
        </form>
        </div>
          ';
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
          echo '
          <p class="text-light my-0 my-sm-0 user_name_login "> Welcome to '.$_SESSION['userfirstname'].'</p>
          <button class="button-48" data-bs-toggle="modal" data-bs-target="#signupModel"><span class="text"><a role = "button" class=" logout_butt" href="logout.php">Logout</a></span></button>
          
          ';
        }
        else{
          echo '
          
          <button class="button-48" data-bs-toggle="modal" data-bs-target="#loginModel"><span class="text">Login</span></button>
          <button class="button-48" data-bs-toggle="modal" data-bs-target="#signupModel"><span class="text">SignUp</span></button>
          ';
        }

      echo'    
      </div>
    </div>
    </nav>';
    include 'login.php';
    include 'signup.php';
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
      echo "<div class='position-absolute alert alert-success alert-dismissible fade show my-0 m-4 mt-4' role='alert' style='width:400px;' >
            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img'>
              <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
            </svg>
            <strong>Succes!</strong>You has been signup successfully. You can login now.!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }

    elseif(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
      echo "<div class='position-absolute alert alert-danger alert-dismissible fade show my-0 m-4 mt-4' role='alert' style='width:400px;'>
              <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img'>
                <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
              </svg>
              <strong></strong>".$_GET['error']."
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
    elseif(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      echo "<div class='position-absolute alert alert-success alert-dismissible fade show m-4 mt-4' role='alert' style=' width:400px;'>
              <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img'>
                <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
              </svg>
              <strong>Success!</strong> You have loged in successfully.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
    elseif(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
      echo "<div class='position-absolute alert alert-danger alert-dismissible fade show my-0 m-4 mt-4' role='alert' style=' width:400px;'>
              <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img'>
                <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
              </svg>
              <strong></strong>".$_GET['loginerror']."
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
    ?>
  <script src="script.js"></script>

      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
      -->
  </body>

</html>