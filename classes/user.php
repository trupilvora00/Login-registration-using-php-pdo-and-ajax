<?php

class User{

    public function login($user,$db){

        if(empty($user['email']) OR empty($user['password'])){

            return 'missing_fields';
        }

        $sql = "SELECT * from `user` WHERE `email` = ?";
        $statement = $db->prepare($sql);

        if(is_object($statement)){

            $statement->bindParam(1, $user['email'], PDO::PARAM_STR);
            $statement->execute();

            if($row = $statement->fetch(PDO::FETCH_OBJ)){

                // debug($row);
                if(password_verify($user['password'], $row->password)){
                    
                    $_SESSION['logged_in'] = [

                        'id' => $row->id,
                        'name' => $row->name
                    ];

                    return "success";
                }

                return "error"; 
            }
        }
    }

    public function signup($user,$image, $db){
        
        // email existence
        // password and confirm password match
        // all fields are mendatory
        
        if(empty($user['name']) OR empty($user['email']) OR empty($user['password']) OR empty($image['image'])){
            return "missing_fields";
        }

        if($user['password'] !== $user['cpassword']){
            return "missmatch_password";
        }
        else if($this->emailExists($user['email'], $db)){
            return "email_exists";
        }
        else{

            
            $sql = "insert into user (name,email,password,verification_code) values(?,?,?,?)";
            $statement = $db->prepare($sql);
            
            if(is_object($statement)){
                
                
                $hash = password_hash($user['password'], PASSWORD_DEFAULT);
                $code = generateCode();
                
                // bind a php variable to a corresponding named or question mark placeholder in sql statement
                $statement -> bindParam(1,$user['name'],PDO::PARAM_STR);
                $statement -> bindParam(2,$user['email'],PDO::PARAM_STR);
                $statement -> bindParam(3,$hash,PDO::PARAM_STR);
                $statement -> bindParam(4,$code,PDO::PARAM_STR);
                $statement->execute();

                
                $lastid = $db->lastInsertId();
                $path = $_FILES['image']['tmp_name'];
                $photo = $_FILES['image']['name'];
                // echo $ext = strtolower(pathinfo($photo,PATHINFO_EXTENSION));

                $targetpath = "upload/".$_FILES['image']['name'];
                
                if(move_uploaded_file($path,$targetpath)){
                    
                    $update = "update user set image=? where id=$lastid";
                    $updatestmt = $db->prepare($update);
                    $updatestmt->bindParam(1,$photo,PDO::PARAM_STR);
                    $updatestmt->execute();
    
                }

                // rowCount() returns the number of rows affected by the last DELETE, INSERT, or UPDATE statement executed by the corresponding PDOStatement object.
                if($statement->rowCount()){
                    return "success";
                }
            }
        }
        return "error";
    }

    private function emailExists($email, $db){
        $sql = "SELECT * from `user` where `email` = ?";
        $statement = $db->prepare($sql);

        if(is_object($statement)){

            $statement -> bindParam(1,$email,PDO::PARAM_STR);
            $statement->execute();
            
            // debug($email);
            if($row = $statement->fetch(PDO::FETCH_OBJ)){
                return true;
            }

            return false;
        }
    }

    public function edit($user,$image,$db){

        if( empty($user['name'])){
            return "missing_fields";
        }
        else if( empty($_FILES['image']['name'])){
            return "missing_fields";
        }
        else{

            $path = $_FILES['image']['tmp_name'];
            $photo = $_FILES['image']['name'];

            $targetpath = "upload/".$_FILES['image']['name'];
            
            
            if(move_uploaded_file($path,$targetpath)){
                
                $a = $_SESSION['logged_in']['id'];

                
                $update = "update user set name=:name,image=:image where id=:id";
                $stmt = $db->prepare($update);
                if(is_object){
    
                    
                    $stmt->bindParam('id',$a,PDO::PARAM_INT);
                    $stmt->bindParam('image',$photo,PDO::PARAM_STR);
                    $stmt->bindParam('name',$user['name'],PDO::PARAM_STR);
                    $stmt -> execute();
                    

                }
                
            
            return "success";   
            }


        }
    }
}

$user = new user;


?>