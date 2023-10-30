


<?php
        require "../../assets/database.php";
        require "../../assets/user.php";
        require "../auth.php";


        session_start();

    if (!isLoggedIn()) {
        die("nepovoleny pristup");
    }

    $user_id = $_SESSION["logged_in_user_id"] ;
     if(isset($_POST["submit"]) && isset($_FILES["image"])){

        var_dump($_FILES["image"]);

        $image_name = $_FILES["image"]["name"];
        $image_size = $_FILES["image"]["size"];
        $image_tmp_name = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];

        if ($error === 0){
            if ($image_size > 9000000){

               echo "<script>window.location.href = '../photos.php';</script>";

            } else {
                $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                $image_extension_lower_case = strtolower($image_extension); 

                $allowed_extensions = ["jpg", "jpeg", "png"];

                if(in_array($image_extension_lower_case, $allowed_extensions)){
                    //sestavujeme unikátní název obrázku
                    $new_image_name = uniqid("IMG-", true) . "." . $image_extension; 

                    if(!file_exists("../uploads/" . $user_id)){
                        mkdir("../uploads/" . $user_id, 0755, true);
                    }
                    
                    $image_upload_path = "../uploads/" . $user_id . "/" . $new_image_name;
                    move_uploaded_file($image_tmp_name, $image_upload_path);

                    //vlozeni img do databaze

                    insertImage($connection, $user_id, $new_image_name);


                } else {
                  echo "<script>window.location.href = '../admin/photos.php';</script>";
                }
            }
        } else {
           echo "<script>window.location.href = '../admin/photos.php';</script>";
        }
    }
    
?>