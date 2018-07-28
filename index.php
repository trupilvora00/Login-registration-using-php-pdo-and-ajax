<?php

    session_start();

    if(isset($_SESSION['logged_in'])){
        header("location:profile.php");
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">

    <link rel="stylesheet"  href="style.css">

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
                
                <button class="btn btn-danger mr-3 my-2 my-sm-0" type="button" data-toggle="modal" data-target="#signup">Register</button>
                <button class="btn btn-danger  my-2 my-sm-0" 
                type="button" data-toggle="modal" data-target="#login">Login</button>
                
            </form>
        </div>
    </div>
</nav>

    <div class="jumbotron">
        <h1>Hello Visitor!!</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium adipisci harum autem! Sint quod dignissimos aliquam recusandae ut explicabo, perferendis rerum reprehenderit provident </p>

        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#signup">Join us today</a>
    </div>
</div>

<!-- login box -->

    <div class="modal fade " id="login" tabindex="-1" role="dialog"                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    Login
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="auth.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off">
                            <small id="emailHelp" class="form-text text-muted" >We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control"placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" >
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">login</button>
                    </form>
                    <br>
                    <p><a href="#" data-toggle="modal" data-target="#send-password-link">Forgot your Password?</a></p>
                </div>
                <div class="modal-footer" style="align-self: center;">

                </div>
            </div>
        </div>
    </div>

<!-- /login box -->

<!-- login box -->

<!-- reset password -->
    <div class="modal fade " id="send-password-link" tabindex="-1" role="dialog"                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    Send me reset password link
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Send Password Link</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

<!-- /reset password box -->

<!-- registration box -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog"                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    Registration
                </div>

                <div class="modal-body">
                    <form class="form" method="POST" action="signup.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label >Full Name</label>
                            <input type="text" name="name" class="form-control">
                            
                        </div>
                        <div class="form-group">
                            <label >email</label>
                            <input type="email" name="email" class="form-control" aria-describedby="emailHelp" >
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label >Upload image</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Sign me up!</button>
                    </form>
                </div>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
<!-- /registration box -->

    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
    <script src="js/script.js"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" ></script>
</body>

</html>