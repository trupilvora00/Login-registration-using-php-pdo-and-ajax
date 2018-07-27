<?php
    require_once 'includes/init.php';
    
    // session_start();

    if(!isset($_SESSION['logged_in'])){
        header("location:index.php?error=Please login to your account");
    }

    $a = $_SESSION['logged_in']['id'];
    

    $statement = $db->prepare("select * from user where id= ?");
    $statement -> bindParam(1, $a, PDO::PARAM_INT );
    $statement->execute();
    
    $row = $statement->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">

    <title>LOGIN/REGISTRATION</title>
</head>

<body>
    
<div class="container">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- <img src="" alt="Brand logo"> -->
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse mr-auto p-3" id="navbarNav">
            
            <form class="form-inline my-2 my-lg-0 ml-auto">
                
                
                <a href="signout.php" class="btn btn-danger  my-2 my-sm-0" 
                 >Sign out</a>
                
            </form>
        </div>
    </div>
</nav>

    <div class="jumbotron">
        <h1>User Profile</h1>
        <h6>Name: <?php echo ucfirst($row['name'])?></h6>
        
        <h6>Email: <?php echo $row['email']?></h6>
    </div>

    
</div>




            


    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" ></script>
</body>

</html>