//automaticky vypisovanie textu
    const heading =  document.getElementById("text");
    const input =  document.getElementById("speed-input");
    const text = "JARO vyhra zenit";
    let idLetter = 1;
    let delay = 500 / input.value

    function printText() {
       heading.innerText =  text.slice(0, idLetter);
       idLetter++;

       if (idLetter > text.length) {
                idLetter = 1 
       }

     setTimeout(printText, delay);
      
    }

    printText();

    input.addEventListener("input", (e) => {
      delay = 500 / e.target.value;

      //galery 1
    });

        const slides = document.querySelectorAll(".slide");
        slides.forEach((slide) => {
            slide.addEventListener("click", (e) => {
                    deleteActiveClass();
                    slide.classList.add("active");
            })
        })
   

    function deleteActiveClass(){
        slides.forEach((slide) => {
            slide.classList.remove("active");
        })
    }

    //search

    const  input2 = document.querySelector(".input");
    const  search = document.querySelector(".search");
    const  btn = document.querySelector(".btn");

    btn.addEventListener("click", () => {
        search.classList.toggle("active");
        input2.focus();
    })



    //galeria 2 

    const containerSlider = document.querySelector(".container-slider");
    const slideLeft = document.querySelector(".slide-left");
    const slideRight = document.querySelector(".slide-right");
    const arrowDown = document.querySelector(".arrow-down");
    const arrowUP = document.querySelector(".arrow-up");
    const slidesLength = slideRight.querySelectorAll("div").length;

    // console.log(slidesLength);

    let numberActiveSlide = 0;

    slideLeft.style.top = `-${(slidesLength - 1) * 100}vh`;


    arrowUP.addEventListener("click", function () {
      changeSlide("up");
    });
    arrowDown.addEventListener("click", function () {
      changeSlide("down");
    });

    function changeSlide(direction) {
      const sliderHeight = containerSlider.clientHeight;
      // console.log(sliderHeight);

      if (direction === "up") {
        numberActiveSlide++;
        if (numberActiveSlide > slidesLength - 1) {
          numberActiveSlide = 0;
        }
      } else {
        numberActiveSlide--;
        if (numberActiveSlide < 0) {
          numberActiveSlide = slidesLength - 1;
        }
      }
      // console.log(numberActiveSlide);

      slideRight.style.transform = `translateY(-${
        numberActiveSlide * sliderHeight
      }px)`;
      slideLeft.style.transform = `translateY(${
        numberActiveSlide * sliderHeight
      }px)`;
    }



    // filter

    const result = document.querySelector(".user-list");
    const input3 = document.querySelector(".input-filter");
    const usersList = [];

    getData();

    input3.addEventListener("input", (e)  => {
        dataFilter(e.target.value)
    });

async function getData() {
  const allUsers = await fetch("https://randomuser.me/api?results=50");

  const data = await allUsers.json();
  result.innerHTML = "";
  data.results.forEach((user) => {
      const li = document.createElement("li");
      li.innerHTML = `
        <img src="${user.picture.large}" alt="${user.name.first}">
        <div class="user-information">
              <h3>${user.name.first} ${user.name.last}</h3>
              <p>${user.location.city}</p>
        </div>
      `
      
      result.appendChild(li);
      usersList.push(li);
      
  });

};

function dataFilter(inputText) {
  usersList.forEach((oneUser) => {
    if (oneUser.innerText.toLowerCase().includes(inputText.toLowerCase())) {
      oneUser.classList.remove("hide");
    } else {
      oneUser.classList.add("hide");
    }
  });
}
