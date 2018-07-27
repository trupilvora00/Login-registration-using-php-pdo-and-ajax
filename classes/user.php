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

    public function signup($user, $db){
        
        // email existence
        // password and confirm password match
        // all fields are mendatory

        if(empty($user['name']) OR empty($user['email']) OR empty($user['password'])){
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

            // $statement = bindParam(1, $email, PDO::PARAM_STR);
            $statement -> bindParam(1,$email,PDO::PARAM_STR);
            $statement->execute();
            
            // debug($email);
            if($row = $statement->fetch(PDO::FETCH_OBJ)){
                return true;
            }

            return false;
        }
    }
}

$user = new user;


?>