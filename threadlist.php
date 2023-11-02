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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style.css">
    <title>Doubt_Hub</title>
    <style>
    div.absolute {
        text-align: right;
    }
    @media (min-width: 992px) {
        /* Styles for screens larger than or equal to 992px (desktop) */
        .card-body {
            display: flex;
            align-items: center;
        }

        .card-body .rounded-circle {
            width: 60px;
            height: 60px;
        }

        /* Adjust other styles as needed */
    }
    </style>
</head>

<body>
    <?php include 'dbconnect.php'; ?>
    <?php include 'header.php'; ?>

    <?php 
    $id = $_GET['ctid'];
    $sql = "SELECT * FROM `s_discuse` WHERE category_id=$id";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $cn = $row['category_name'];
        $cd = $row['category_description'];
    }
    ?>

    <!-- threadlist question-->
    <?php 
    $insert = false;
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $pblm_t = $_POST['title'];
        $pblm_desc = $_POST['desc'];

        $pblm_t = str_replace("<","&lt", $pblm_t);
        $pblm_t = str_replace(">","&gt", $pblm_t);
        $pblm_t = str_replace("'","&apos;",$pblm_t);
        $pblm_t = str_replace("¢","&cent;",$pblm_t);
        $pblm_t = str_replace("£","&pound;",$pblm_t);
        $pblm_t = str_replace("¥","&yen;",$pblm_t);
        $pblm_t = str_replace("€","&euro;",$pblm_t);
        $pblm_t = str_replace("©","&copy;",$pblm_t);
        $pblm_t = str_replace("®","&reg;",$pblm_t);


        $pblm_desc = str_replace("<","&lt;", $pblm_desc);
        $pblm_desc = str_replace(">","&gt;", $pblm_desc);
        $pblm_desc = str_replace("'","&apos;",$pblm_desc);
        $pblm_desc = str_replace("¢","&cent;",$pblm_desc);
        $pblm_desc = str_replace("£","&pound;",$pblm_desc);
        $pblm_desc = str_replace("¥","&yen;",$pblm_desc);
        $pblm_desc = str_replace("€","&euro;",$pblm_desc);
        $pblm_desc = str_replace("©","&copy;",$pblm_desc);
        $pblm_desc = str_replace("®","&reg;",$pblm_desc);

        $user_id = $_POST['user_id'];
        
        $sql = "INSERT INTO `threads` (`threads_title`, `threads_desc`, `threads_cat_id`, `threads_user_id`, `timestemp`) VALUES ('$pblm_t', '$pblm_desc ', '$id', '$user_id', current_timestamp());";

        $result = mysqli_query($conn,$sql);
        if($result){
            $insert = true;
            if($insert){
                echo "<div class='position-absolute alert alert-success alert-dismissible fade show my-0 m-4 mt-4' role='alert' style=' width:400px;'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img'>
                            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
                        </svg>
                        <strong>Succes!</strong>Your query has been added..!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            }
        }
    }
    ?>
    <?php
        $web;  
        if($id==1){
            $web="https://www.python.org/";
        }
        if($id==2){
            $web="https://www.java.com/en/";
        }
        if($id==3){
            $web="https://www.djangoproject.com/";
        }
        if($id==4){
            $web="https://www.php.net/";
        }
        if($id==5){
            $web="https://www.geeksforgeeks.org/c-plus-plus/";
        }

    ?>
    <div class="container my-4">
        <div class="alert-secondary p-4" style="border-radius:10px;">
            <h1 class="display-4">Welcome to
                <?php echo $cn;?> forums
            </h1>
            <hr class="my-4">            
            <p> A programming language is a set of symbols, grammars and rules with the help of which one is
                able to translate algorithms to programs that will be executed by the computer. The programmer
                communicates with a machine using programming languages. Most of the programs have a
                highly structured set of rules.The primary classifications of programming languages are: 
                Machine Languages, Assembly Languages, High level Languages. 
            </p>
            <p class="lead">
                <?php echo $cd;?>
            </p>
            <a href= "<?php echo $web; ?>"  class="btn btn-success btn-lg" role="button"> learn more</a>
        </div>
    </div>
    

    <div class="container ">
        <h1 class="py-2">Post a Question</h1>

        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
            echo'
            <div class="container  bg-transparent">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <form action="'.$_SERVER['REQUEST_URI'].'" method="post" class="bg-transparent" style="border-radius: 10px; border: 2px solid #deb10f; padding:10px; color:#F2F2F2;">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                                        <input type="text" placeholder="title" class="form-control" id="title" name="title" aria-describedby="emailHelp" required>
                                        <div id="emailHelp" class="form-text">keep your title as short and crisp as possible</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Elloborate Your Problem</label>
                                        <textarea placeholder="Write your comment here!" class="form-control" id="desc" name="desc" row="3" required></textarea>
                                    </div>
                                    <input type="hidden" name="user_id" value = '.$_SESSION['user_id'].'>
                                    <button type="submit" class="btn btn-success ">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                ';
        }
        else{
            echo 'You are not logged in. Please login to be able to post';
        }
    ?>
    </div>


    <section>
        <div class="container my-5 mt-2 py-5 bg-transparent">
            <div class="row d-flex justify-content-center">

                <h3 class="py-2">Browse Questions</h3>
                <div class="col-md-12 col-lg-10">
                    <?php 
                        $id = $_GET['ctid'];
                        $sql = "SELECT * FROM `threads` WHERE threads_cat_id=$id";
                        $result = mysqli_query($conn,$sql);

                        $noresult= true;
                        while($row=mysqli_fetch_assoc($result)){
                            $noresult= false;
                            $ti = $row['threads_id'];
                            $tt = $row['threads_title'];
                            $td = $row['threads_desc'];
                            $tdt = $row['timestemp'];
                            $thread_user_id = $row['threads_user_id'];

                            $sql2 = "SELECT user_firstname,user_lastname FROM `users` WHERE user_id='$thread_user_id' ";
                            $result2 = mysqli_query($conn,$sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            
                            

                            echo'
                            <div class="card text-dark mt-4" style="box-shadow: rgba(183, 178, 178, 0.573) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; border-radius: 10px;">
                                <div class="card-body p-4">
                                    <div class="d-flex flex-start">
                                        <img class="rounded-circle shadow-1-strong me-3"
                                            src="https://picsum.photos/60/60?random=1" alt="avatar"
                                            width="60" height="60" />
                                        <div>
                                            <div class="d-flex align-items-center" >   
                                                <h5 class="fw-bold mb-1 " style="min-width:720px">'.$row2['user_firstname'].' '.$row2['user_lastname'].'</h5> 
                                                <p class="fw-bold my-0 " >'.$tdt.'</p>
                                            </div>
                                            <div class="d-flex align-items-center mb-1">
                                                <p class="mb-0">
                                                <h6 class="fw-bold" style="min-width:740px"><a href="threads.php?t_id='.$ti.'" class="text-dark" style="text-decoration: none; display: inline-block;">'.$tt.'</a></h6>
                                                    <span class="badge bg-success text-right">Approved</span>
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center mb-1" >
                                                <p class="mt-0" style="min-width:790px; max-width:5px;"><span style="font-size:20px; display:block; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                                                '.$td.' </span></p>
                                                <a href="#!" class="link-danger"><i class="icon fas fa-heart"></i></a>
                                                <a href="#!" class="text-dark"><i class="icon fas fa-comment ms-2"></i></a>
                                                <a href="#!" class="link-white"><i class="icon fas fa-share ms-2"></i></a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>';
                                
                        }
                        if($noresult){
                            echo' 
                            <div class="card text-dark mt-4" style="box-shadow: rgba(183, 178, 178, 0.573) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; border-radius: 10px;">
                                <div class="card-body p-4">
                                    <div class="d-flex flex-start">
                                    
                                    <p class="display-6">No Threads Found...<br>
                                    </p>
                                        
                                    </div>
                                    <div class="d-flex flex-start">
                                    
                                    <h6>Be the first person to ask a question.</h6>
                                        
                                    </div>
                                </div>
                            </div>';
                        } 
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer2.php'; ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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