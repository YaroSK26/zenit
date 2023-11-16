  //!kalkulacka
  let cislo1Value, cislo2Value, operatorValue, vysledekValue;
        const cislo1 = document.querySelector(".cislo1");
        const cislo2 = document.querySelector(".cislo2");
        const operator = document.querySelector(".operator");
        const a = document.querySelector(".a");

        cislo1.addEventListener("input", (e) => {
            cislo1Value = e.target.value;
        });

        cislo2.addEventListener("input", (e) => {
            cislo2Value = e.target.value;
        });

        operator.addEventListener("input", (e) => {
            operatorValue = e.target.value;
        });

      function vypocet(e) {
    e.preventDefault();

    // Kontrola, či sú všetky hodnoty definované
    
        const vysledekValue = eval(`${cislo1Value} ${operatorValue || "+"} ${cislo2Value}`);
        console.log(vysledekValue);
        a.innerHTML = `Výsledok: ${vysledekValue}`;
    
}





//!cas

    const b = document.querySelector(".b")
    
    const time = new Date()
    console.log(time.getFullYear(), time.getMonth(), time.getDate())

    b.innerHTML = time;


//!timeout

    const c = document.querySelector(".c");

    setTimeout(() => {
        c.innerHTML = "caves"
    }, 5000);

    //  setInterval(() => {
    //    alert("preslo 5 sekund je tu alert")
    //  }, 5000);


