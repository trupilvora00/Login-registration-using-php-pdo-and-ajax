<?php

require_once "includes/init.php";

// debug($_POST);
$status = $user->signup($_POST,$db);

if($status == "success"){

    echo json_encode([
        
        'success'=>'success' , 
        'message'=>'<p class="alert alert-success">You are signed up successfully!</p>',
        'signout' => 1
    ]); 
}

if($status == "missing_fields"){

    echo json_encode([
        
        'error'=>'error' , 
        'message'=>'<p class="alert alert-danger">All fields mendatory!</p>'
        
    ]);
}

if($status == "email_exists"){
    
    echo json_encode([
        
        'error' => 'error',
        'message' => '<p class="alert alert-danger">Email already exists!</p>'
    ]);
}

if($status == "missmatch_password"){
    
    echo json_encode([
        
        'error' => 'error',
        'message' => '<p class="alert alert-danger">missmatch password</p>'
    ]);
}

if($status == "error"){

    echo json_encode([
        
        'error'=>'error' , 
        'message'=>'<p class="alert alert-danger">Failed to sign you up!</p>',
        
    ]);
}

?>
