<?php
    include "./assets/database.php";

function createStudent($connection, $MenoPriezvisko, $mail){

    $sql = "INSERT INTO newsletter (MenoPriezvisko,mail)
VALUES (?,?)";

$statement = mysqli_prepare($connection, $sql);

    if ($statement === false) {
    echo mysqli_error($connection);
} else {
    mysqli_stmt_bind_param($statement, "ss", $_POST["MenoPriezvisko"], $_POST["mail"]);


    if(mysqli_stmt_execute($statement)) {
        $id = mysqli_insert_id($connection);

        return $id;
    } else {
        echo mysqli_stmt_error($statement);
    }
}
}


?>