<?php

    $db_host=  "127.0.0.1";
    $db_user= "zenituser39_2";
    $db_password= "zenitpass39_2"; 
    $db_name= "zenitKK39";

//treba zmenit v pripade ze postujeme stranku na internet, udaje ti pridu do emailu napriklad od wedosu , import export database


    $connection = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }

    $sql = "SELECT * FROM offers";
    $result = mysqli_query($connection,$sql);
    $offers = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql2 = "SELECT * FROM comments";
    $result2 = mysqli_query($connection,$sql2);
    $comments = mysqli_fetch_all($result2, MYSQLI_ASSOC);

     $sql3 = "SELECT * FROM users";
    $result3 = mysqli_query($connection,$sql3);
    $users = mysqli_fetch_all($result3, MYSQLI_ASSOC);
?>