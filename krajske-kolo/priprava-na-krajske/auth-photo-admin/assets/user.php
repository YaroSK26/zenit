<?php
function createUser($connection, $meno, $priezvisko, $email, $password, $role){

     $sql = "INSERT INTO user (meno, priezvisko, email, password, role)
    VALUES (?, ?,?,?,?,?)";
   
    $statement = mysqli_prepare($connection, $sql);

     if (!$statement) {
        echo mysqli_error($connection);
    } else {
       mysqli_stmt_bind_param($statement, "ssss", $meno, $priezvisko, $email, $password, $role);


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

function getUserRole($connection, $id) {
    $sql = "SELECT role FROM user WHERE id = ?";

    $statement = mysqli_prepare($connection, $sql);

    if ($statement) {
        mysqli_stmt_bind_param($statement,"i",$id);

        if (mysqli_stmt_execute($statement)) {
            $result = mysqli_stmt_get_result($statement);
            $user_role = mysqli_fetch_row($result);
            $user_role_string = $user_role[0];

            return $user_role_string;
        }
    }else {
        echo mysqli_error($connection);
    }
}










//! obrazky 


function insertImage($connection, $user_id, $image_name){
    $sql  = "INSERT INTO image (user_id, image_name) VALUES (?, ?)";
    $statement = mysqli_prepare($connection, $sql);

    if (!$statement) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($statement, "is", $user_id, $image_name);

        mysqli_stmt_execute($statement);
        $id = mysqli_insert_id($connection);

        if(!empty($id)) {
            echo "Successfully inserted image with id: $id";
            echo "<script>window.location.href = '../upload-images/photos.php';</script>";
            return $id;
        } else {
            echo mysqli_stmt_error($statement);
        }
    }
}


function getImagesByUserId($connection, $user_id) {
    $sql = "SELECT image_name FROM image WHERE user_id = ?";
    
    $statement = mysqli_prepare($connection, $sql);

    if ($statement) {
        mysqli_stmt_bind_param($statement, "i", $user_id);

        if (mysqli_stmt_execute($statement)) {
            $result = mysqli_stmt_get_result($statement);
            $images = mysqli_fetch_all($result, MYSQLI_ASSOC);

            mysqli_stmt_close($statement); 

            return $images;
        } else {
            echo mysqli_stmt_error($statement); 
        }
    } else {
        echo mysqli_error($connection);
    }
}

    function deletePhotoFromDirectory($path){
        try {
            if(!file_exists($path)){
                throw new Exception("chybicka so suborom sa vloudila");
            }

            if(unlink($path)){
                return true;
            } else{
                throw new Exception("chybicka");
            }
        } catch (Exception $e){ {
            echo "chybicka: ".$e->getMessage();
        }
    }
}

function deletePhotoFromDatabase($connection, $image_name){
    $sql = "DELETE FROM image WHERE image_name = ?";
    $statement = mysqli_prepare($connection, $sql);

    if ($statement) {
        mysqli_stmt_bind_param($statement, "s", $image_name);
        mysqli_stmt_execute($statement);

        if (mysqli_affected_rows($connection) > 0) {
            echo "Image deleted successfully.";
        } else {
            throw new Exception("Image not found in the database.");
        }

        mysqli_stmt_close($statement); 
    } else {
        throw new Exception("Error: " . mysqli_error($connection));
    }
}

?>