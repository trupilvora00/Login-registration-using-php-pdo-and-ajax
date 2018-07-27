<?php

require_once "includes/init.php";

if(isset($_SESSION["logged_in"])){

    // assigning a empty array
    $_SESSION = [];

    // successfully expiring cookie
    setcookie(session_name(), session_id(), time()-1000,"/");

    // this deletes the session file of xampp from tmp
    session_destroy();

    header("location:index.php");
}
else{
    header("location:index.php");
}

?>