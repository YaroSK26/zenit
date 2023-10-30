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
