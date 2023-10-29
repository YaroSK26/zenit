<?php
function createUser($connection, $meno, $priezvisko, $email, $password){

     $sql = "INSERT INTO user (meno, priezvisko, email, password)
    VALUES (?, ?,?,?)";
   
    $statement = mysqli_prepare($connection, $sql);

     if (!$statement) {
        echo mysqli_error($connection);
    } else {
       mysqli_stmt_bind_param($statement, "ssss", $meno, $priezvisko, $email, $password);


        mysqli_stmt_execute($statement);
        $id = mysqli_insert_id($connection);

        if(!empty($id)) {
            echo "uspesne vlozeni user s id: $id";
            
            echo "<script>window.location.href = '../admin/after-registration.php';</script>";
            return $id;

        } else {
            echo mysqli_stmt_error($statement);
        }
    }
}

function isEmailRegistered($connection, $email) {
        $sql = "SELECT id FROM user WHERE email = ?";
        $statement = mysqli_prepare($connection, $sql);

        if (!$statement) {
            echo mysqli_error($connection);
        } else {
            mysqli_stmt_bind_param($statement, "s", $email);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);

            return mysqli_stmt_num_rows($statement) > 0;
        }

        return false;
    }


function auth($connection, $loginEmail , $loginPassword){
    $sql = "SELECT password FROM user WHERE email = ?";

    $statement = mysqli_prepare($connection, $sql);

    if ($statement) {
        mysqli_stmt_bind_param($statement, "s", $loginEmail);

        if (mysqli_stmt_execute($statement)) {
            $result = mysqli_stmt_get_result($statement);

            if($result->num_rows !== 0){
                $password_database = mysqli_fetch_row($result);  // v promenne je pole 
                $user_password_database = $password_database[0];

                if ($user_password_database) {
                return password_verify($loginPassword, $user_password_database);
                }
            } else{
                echo "chyba pri zadavani emailu ";
            }

            
        }
    } else {
        echo mysqli_error($connection);
    }

    


}


function getUserId($connection, $LoginEmail) {
    $sql = "SELECT id FROM user WHERE email = ?";

    $statement = mysqli_prepare($connection, $sql);

    if ($statement) {
        mysqli_stmt_bind_param($statement,"s",$LoginEmail);

        if (mysqli_stmt_execute($statement)) {
            $result = mysqli_stmt_get_result($statement);
            $user_id = mysqli_fetch_row($result);
            $user_id_string = $user_id[0];

            return $user_id_string;
        }
    }else {
        echo mysqli_error($connection);
    }
}
?>