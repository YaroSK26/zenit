<?php 


class  Book {

    function __construct($bookTitle, $bookAutor) {
        $this->title = $bookTitle;
        $this->autor = $bookAutor;
    }
    // public $autor = "neni zadany autor"; -- nemusi to tu byt zadane pokial nechceme defaault hodnoty

    function bookDescription(){
        return "nazov knihy <br>" . $this->title;
    }
}

// $book = [
//     "title" => "david",
//     "autor" => "brano",
// ];

$book_1 =new Book("harry potter", "rowling");

// $book_1 ->title =  "harry potter";
// $book_1 ->autor =  "rowling";

echo $book_1->bookDescription();    



//   procvicovanie konstruktora

// class Car {
//     function __construct($color, $brand){
//         $this->color = $color;
//         $this->seat = 4;
//         $this->brand = $brand;
//     }
// }

// $car = new Car("cervena", "mithusbisi");
// $car2 = new Car("modra", "mithuasaaabaisi");

// echo $car->color;
// echo $car2->seat;




//--- 4 principy OOP ---
// Zapouzdření (encapsulation)
// -private = atributy a metody jsou přístupné pouze uvnitř classy
// -public = atributy a metody jsou přístupné i mimo classu (zvenčí)




// Abstrakce (abstraction)
// Dědičnost (inheritance)
// Polymorfismus (polymorphism)


// logika
class Bankaccount {
    private $pin;
    public $first_name;
    public $second_name;


    function __construct($first_name, $second_name, $pin){
        $this->first_name = $first_name;
        $this->second_name = $second_name;
        $this->pin = $pin;
    }


}


// použití
$account1 = new Bankaccount("David", "Šetek", 1234);


echo $account1->first_name;
echo "<br>";
echo $account1->second_name;
echo "<br>";
// echo $account1->pin;






//chyby 


// Chyba
/**
 * běžná chyba, která se může vyskytnout kdekoli
 * syntaktické chyby - chybějící středník
 * program funguje, ale ne tak, jak by měl (např. špatně zadaná podmínka)
 * přístup k neexistujícímu indexu v poli
 * bezpečnostní chyby - chybí ochrana proti SQL injection
 */


// Výjimka = Exception
/**
 * neočekávaná nebo vyjímečná situace
 * Pokus o přístup k neexistujícímu souboru
 * Neplatné vstupy od uživatele
 * Problémy při připojení k databázi
 */


 function string_length($str, $min_length){
    if(strlen($str) < $min_length){
       throw new Exception("Váš text je příliš krátký");
    }
    return true;
 }


 try {
    string_length("sup", 5);
    echo "Váš text je v pořádku";
 } catch (Exception $e) {
    echo $e->getMessage();
 } 



 // phpinfo();


// $n1 = 50;
// $n2 = 0;


// try {
//     if ($n2 === 0){
//         throw new Exception("Dělení nulou je zakázané");
//     }
//     $result = $n1 / $n2;
//     echo $result;
// } catch (Exception $e) {
//     error_log("Chyba dělení nulou\n", 3, "./errors/error.log");
//     echo "Typ chyby: " . $e->getMessage();
// }




try {
    echo intdiv(12,5); //celociselne delenie
} catch (DivisionByZeroError $e) {
    echo "Chyba: " . $e->getMessage();
}





$n1 = 15;
$n2 = 0;


try {
    if ($n1 <= 10){
        throw new Exception("Vaše číslo je menší nebo rovno 10");
    }
    return $n1 / $n2;
} catch (DivisionByZeroError $e) {
    echo "Chyba: " . $e->getMessage();
} catch (Exception $e){
    echo "Chyba: " . $e->getMessage();
}


try {
    // nějaký kód včetně otevření souboru
} catch (Exception $e){
    // exception
} finally {
    // uzavři soubor
}



?>


<?php
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

    <form action="index.php" method="POST">
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
</body>
</html>

