<?php

    $db_host=  "127.0.0.1";
    $db_user= "vsetko_user";
    $db_password= "vsetko_pass"; 
    $db_name= "vsetko";

    //treba zmenit v pripade ze postujeme stranku na internet, udaje ti pridu do emailu napriklad od wedosu,import export database

    $connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    
if ( isset($_GET["id"]) and is_numeric($_GET["id"]) ) {

    $sql = "SELECT * FROM users";
    $result = mysqli_query($connection,$sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

     $sql2 = "SELECT * FROM users";
    $result2 = mysqli_query($connection,$sql2);
    $ziaci = mysqli_fetch_all($result2, MYSQLI_ASSOC);
}
?>