<?php

        require "./auth.php";
        session_start();

        //zistovanie ci je user prihlaseny
        if (!isLoggedIn()) {
                die("nepovoleny vstup");
        }

        $role = $_SESSION["role"];

        //!FORMULAR
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require './vendor/PHPMailer/src/Exception.php';
        require './vendor/PHPMailer/src/PHPMailer.php';
        require './vendor/PHPMailer/src/SMTP.php';

        $meno = "";
        $priezvisko= "";
        $email = "";
        $text = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $meno = $_POST["meno"];
        $priezvisko= $_POST["priezvisko"];
        $email = $_POST["email"];
        $text = $_POST["text"];

        $errors = [];

        if (filter_var($email , FILTER_VALIDATE_EMAIL ) === false) {
            $errors[] = "ZLY EMAIL";
        }

        if(empty($errors)){
            //odosli data z formulara
            $mail = new PHPMailer(true);

            try {


            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";
            $mail->Username = "jaroba0@gmail.com";
            $mail->Password =  "ntyejidjljzmcjes";
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;


            $mail->setFrom("jaroba0@gmail.com");
            $mail->addAddress("jaroba0@gmail.com");
            $mail->Subject ="vyplneni formular";
            $mail->Body = "Jméno: {$meno} {$priezvisko} \nEmail: {$email} \nZpráva: {$text}" ;

            //treba zmenit udaje pri uplodovani na internet


            $mail->send();
            echo "</br>";
            
            echo "zprava odoslana"; 

        } catch (Exception $e) {
            echo "Zpráva nebyla odeslána: ", $mail->ErrorInfo;
        }

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
           <h1>kontaktny formular</h1>

    <form action="formular.php" method="POST">
            <input type="text" name="meno" placeholder="meno" required value="<?= $meno; ?>"><br>
            <input type="text" name="priezvisko" placeholder="priezvisko" required value="<?= $priezvisko; ?>"><br>
            <input type="email" name="email" placeholder="email" required value="<?= $email; ?>"><br>
            <textarea name="text" placeholder="text" ><?= $text; ?></textarea><br>
            <button type="submit">odoslat</button>
    </form>

    <div class="errors">
        <?php if(!empty($errors)):?>
                    <ul><?php foreach($errors as $e):?>
                                <li><?= $e ?></li>
                        <?php endforeach; ?>
                    </ul>
            <?php endif; ?>
    </div>

    <a href="login.php">spat</a>

</body>
</html>