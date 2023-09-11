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
    .container{
      min-height: 71.6vh;
    }
  </style>
  <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include 'dbconnect.php'; ?>
  <?php include 'header.php'; ?>

  <div class="container">
  <h1>Search results for "<em><?php echo $_GET['search']; ?></em>"</h1>

  <?php 
        $noresult= true;
        $quary = $_GET['search'];
        
        $sql ="SELECT * FROM threads WHERE threads_title REGEXP '$quary'";
        $result=mysqli_query($conn, $sql);

        while($row=mysqli_fetch_assoc($result)){
            $noresult= false;
            $ti = $row['threads_id'];
            $tt = $row['threads_title'];
            $td = $row['threads_desc'];
            $url = "threads.php?t_id=".$ti ;

            echo'
            <div class="result">
                <h3><a href="'.$url.'" class="text-dark">'.$tt.'</a></h3>
                <p> '.$td.'</p>
            </div>
            ';
        }
        if($noresult){
            echo' 
            <div class="container my-4">
            <div class="alert alert-secondary">
                <p class="display-6">did not match any documents...</p>
                <p>Suggestions:
                  <ul>
                    <li>Make sure that all words are spelled correctly.</li>
                    <li>Try different keywords.</li>
                    <li>Try more general keywords.</li>
                  </ul>
                </p>
                </div>
            </div>';
        }
        ?>
  </div>
  <?php include 'footer.php'; ?>

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