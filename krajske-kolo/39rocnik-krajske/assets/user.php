<?php
    require "database.php";

    function createUser($connection, $meno, $password, $role){

     $sql = "INSERT INTO users (meno, heslo, role)
    VALUES (?,?,?)";
   
    $statement = mysqli_prepare($connection, $sql);

     if (!$statement) {
        echo mysqli_error($connection);
    } else {
       mysqli_stmt_bind_param($statement, "sss", $meno, $password, $role);


        mysqli_stmt_execute($statement);
        $id = mysqli_insert_id($connection);

        if(!empty($id)) {
            echo "uspesne vlozeni user s id: $id";
            
            echo "<script>window.location.href = './admin.php';</script>";
            return $id;

        } else {
            echo mysqli_stmt_error($statement);
        }
    }
}


function auth($connection, $loginMeno , $loginPassword){
    $sql = "SELECT heslo FROM users WHERE meno = ?";

    $statement = mysqli_prepare($connection, $sql);

    if ($statement) {
        mysqli_stmt_bind_param($statement, "s", $loginMeno);

        if (mysqli_stmt_execute($statement)) {
            $result = mysqli_stmt_get_result($statement);

            if($result->num_rows !== 0){
                $password_database = mysqli_fetch_row($result);  // v promenne je pole 
                $user_password_database = $password_database[0];

                if ($user_password_database) {
                return password_verify($loginPassword, $user_password_database);
                }
            } else{
                echo "chyba pri zadavani mena ";
                echo "<a href='login.php'> spat </a>";

            }

            
        }
    } else {
        echo mysqli_error($connection);
         echo "<script>window.location.href = './index.php';</script>";
    }

    


}


function getUserId($connection, $LoginMeno) {
    $sql = "SELECT ID FROM users WHERE meno = ?";

    $statement = mysqli_prepare($connection, $sql);

    if ($statement) {
        mysqli_stmt_bind_param($statement,"s",$LoginMeno);

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
    $sql = "SELECT role FROM users WHERE ID = ?";

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
?>