<?php

    $db_host=  "127.0.0.1";
    $db_user= "zenit_user_34_2";
    $db_password= "zenit_pass_34"; 
    $db_name= "zenit_sk_34";

    //treba zmenit v pripade ze postujeme stranku na internet, udaje ti pridu do emailu napriklad od wedosu,import export database

    $connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    
if ( isset($_GET["id"]) and is_numeric($_GET["id"]) ) {

    $sql = "SELECT * FROM questbook WHERE ID = ". $_GET["id"];
    $result = mysqli_query($connection,$sql);
    $questbook = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>