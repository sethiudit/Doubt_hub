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
    <?php include 'dbconnect.php'; ?>
    <?php include 'header.php'; ?>
    <?php 
        $id = $_GET['t_id'];
        $sql = "SELECT * FROM `threads` WHERE threads_id=$id";
        $result = mysqli_query($conn,$sql);

        $noresult = true;
        while($row=mysqli_fetch_assoc($result)){
            $noresult = false;
            $ti = $row['threads_id'];
            $tt = $row['threads_title'];
            $td = $row['threads_desc'];
            $tdt = $row['timestemp'];
        }
    ?>

    <!-- for comment insert-->
    <?php 
    $insert = false;
    $id = $_GET['t_id'];
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $comment = $_POST['comment'];
        $comment = str_replace("<","&lt;",$comment);
        $comment = str_replace(">","&gt;",$comment);
        $user_id = $_POST['user_id'];
        
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_dt`) VALUES ('$comment', '$id', '$user_id', current_timestamp())";

        $result = mysqli_query($conn,$sql);
        if($result){
            //echo "Database created successfully...!";
            $insert = true;
        }
    }
    ?>
    <?php
    if($insert){
        echo " <div class='position-absolute alert alert-success alert-dismissible fade show  my-0 m-4 mt-4' role='alert' style=' width:400px;'>
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img'>
                    <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
                </svg>
                <strong>Succes!</strong>Your comment has been added...!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>";
    }
    ?>
    <div class="container my-4">
        <div class="alert-info p-3" style="border-radius:10px;">
            <h3 class="display-5"><?php echo $tt;?> !</h3>
            <hr class="my-4">
            <strong>Description : </strong><?php echo $td;?>
            
        </div>
    </div>

    <div class="container mt-3">

        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
            echo'
                <form action="'.$_SERVER['REQUEST_URI'].'" method="post" class="bg-transparent">
                    <div style="width: 40%; height: 50px; float:left;">  
                            <input type="text" placeholder="Type your Comment..." class="form-control mb-2" id="desc" name="comment"  style="width:500px; height:50px; border-radius: 25px; " required>
                            <input type="hidden" name="user_id" value = '.$_SESSION['user_id'].'>
                    </div>
                    <div style="width:60%; height: 50px; float:left;">
                        <button type="submit" class="btn btn-success" style="font-family: verdana; font-weight: lighter;  border-radius: 25px; height:50px; background-image: linear-gradient(-45deg, #ff5959, #ff4040,#ff8033,#d74177);">Post Comment</button>
                    </div>
                </form>';
        }
        else{
            echo 'You are not logged in. Please login to be able to post comment';
        }
        ?>
    </div>
    <p> &nbsp;</p>
    <p> &nbsp;</p>
    <div class="container ">
        <h1 class="py-2">Comments</h1>

        <?php 
        $id = $_GET['t_id'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($conn,$sql);
        $noresult=true;
        while($row=mysqli_fetch_assoc($result)){
            $noresult=false;
            $ci = $row['comment_id'];   
            $cc = $row['comment_content'];
            $comment_user = $row['comment_by'];
            $date_time = $row['comment_dt'];

            $sql2 = "SELECT user_firstname,user_lastname FROM `users` WHERE user_id='$comment_user' ";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
        
            echo'
                <div class="d-flex my-3" style=" width: 600px; padding: 10px; border: 2px solid #deb10f; box-shadow: rgba(183, 178, 178, 0.573) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; border-radius: 10px;">
                    
                    <img src="https://picsum.photos/60/60?random=1" class="me-3 rounded-circle" style="width: 60px; height: 60px;">
                    <div>
                    <h5 class="fw-bold my-0">'.$row2['user_firstname'].' '.$row2['user_lastname'].'</h5>
                        <p>
                            '.$cc.'
                        </p>
                    </div>              
                </div>';
        }
        if($noresult){
            echo' 
            <div class="d-flex my-3" style=" width: 600px; padding: 10px; border: 2px solid #deb10f; box-shadow: rgba(183, 178, 178, 0.573) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; border-radius: 10px;">
                    <div>
                    <p class="display-6">No Result Found...</p>
                <p>Be the first person to ask a question.</p>
                    </div>              
                </div>';
        }
        ?>
    </div>

    <p> &nbsp;</p>

    <?php include 'footer2.php'; ?>
    <script src="script.js"></script>

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