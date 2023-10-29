
<?php 

/**
 * get
 * @param object - connection
 * @param integer - id
 * @return mixed - assoc pole
 */
function getStudent($connection,$id, $columns = "*"){
    $sql = "SELECT $columns FROM  questbook WHERE id = ?";

    $statement = mysqli_prepare($connection,$sql);

    if ($statement === false){
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($statement, "i" , $id);

       if( mysqli_stmt_execute($statement) === true ) {
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
       }
    }
}

/**
 * update
 * @param object - connection
 * @return string - $autor
 * @return string - $text2
 * @param integer - $id
 * @return  -true
 */
function updateStudent($connection, $autor, $text2, $id){
    $sql = "UPDATE questbook SET Autor = ?, text2 = ? WHERE ID = ?";

    $statement = mysqli_prepare($connection, $sql);

        if (!$statement) {
        echo mysqli_error($connection);
    }else{
        mysqli_stmt_bind_param($statement,"ssi", $autor, $text2, $id);

        if (  mysqli_stmt_execute($statement)){
        echo "informace boli upravene";
            return true;
        }
    }

}
/**
 * delete 
 * @param object - connection
 * @param integer - $id
 * @return -true
 */
function deleteStudent($connection, $id){
    $sql = "DELETE FROM questbook WHERE id = ?";

    $statement = mysqli_prepare($connection, $sql);

    if (!$statement) {
        echo mysqli_error($connection);
    }else{
        mysqli_stmt_bind_param($statement,"i", $id);

        if ( mysqli_stmt_execute($statement)) {
            return true;
        }
    }
}


function getAllStudents($connection,$columns = "*"){
    $sql = "SELECT $columns
            FROM questbook";


    $result = mysqli_query($connection, $sql);
   
    if ($result === false) {
        echo mysqli_error($connection);
    } else {
        $allStudents = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $allStudents;    
    }
}


function createStudent($connection, $autor, $text2){

     $sql = "INSERT INTO questbook (Autor,text2)
    VALUES (?, ?)";
   
    $statement = mysqli_prepare($connection, $sql);

     if ($statement === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($statement, "ss", $_POST["Autor"], $_POST["text2"]);


        if(mysqli_stmt_execute($statement)) {
            $id = mysqli_insert_id($connection);
            echo "Úspěšně vložen quest s id: $id";

             
            //    if (isset($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] != "off") {
            //     $url_protocol = "https";
            // } else {
            //     $url_protocol = "http";
            // }

            // localhost = $_SERVER["HTTP_HOST"]
           
            // header("location: $url_protocol://" . $_SERVER["HTTP_HOST"] . "/NenavidimZenit/krajske-kolo/priprava-na-krajske/one-quest.php?id=$id");
            return $id;
        } else {
            echo mysqli_stmt_error($statement);
        }
    }
}