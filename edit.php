<?php

require_once "includes/init.php";

$status = $user -> edit($_POST,$_FILES,$db);


if($status == "success"){

    echo json_encode([
        
        'success'=>'success' , 
        'message'=>'<p class="alert alert-success">Your profile edited                   successfully!</p>',
        'url' => 'profile.php',
        
    ]); 
}

if($status == "missing_fields"){

    echo json_encode([
        
        'error'=>'error' , 
        'message'=>'<p class="alert alert-danger">All fields mendatory!</p>'
        
    ]);
}


?>