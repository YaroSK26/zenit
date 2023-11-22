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


//!dalsie js kody ked tak , 

//!  Lokalne ukladanie údajov pomocou localStorage:

// <!-- HTML -->
// <input type="text" id="username" placeholder="Enter your username">
// <button onclick="saveUsername()">Save Username</button>

// <!-- JavaScript -->
// <script>
// function saveUsername() {
//   var username = document.getElementById('username').value;
//   localStorage.setItem('savedUsername', username);
//   alert('Username saved!');
// }

// Získanie hodnoty
// var storedValue = localStorage.getItem('myKey');

// Odstránenie hodnoty
// localStorage.removeItem('myKey');

// Vyčistenie celého Local Storage
// localStorage.clear();




//!lazy loading

// <!-- HTML -->
// <img data-src="image.jpg" alt="Lazy-loaded image" id="lazyImage">
// <button onclick="loadImage()">Load Image</button>

// <!-- JavaScript -->
// <script>
// function loadImage() {
//   var lazyImage = document.getElementById('lazyImage');
//   lazyImage.src = lazyImage.getAttribute('data-src');
// }






//! Sledovanie polohy (Geolocation):

// <!-- HTML -->
// <button onclick="getLocation()">Get Location</button>
// <p id="demo"></p>

// <!-- JavaScript -->
// <script>
// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else {
//     alert('Geolocation is not supported by this browser.');
//   }
// }

// function showPosition(position) {
//   var demo = document.getElementById('demo');
//   demo.innerHTML = 'Latitude: ' + position.coords.latitude + '<br>Longitude: ' + position.coords.longitude;
// }






//!  Dynamické generovanie obsahu pomocou JSON:

// <!-- HTML -->
// <ul id="myList"></ul>
// <button onclick="generateList()">Generate List</button>

// <!-- JavaScript -->
// <script>
// function generateList() {
//   var list = document.getElementById('myList');
//   var data = '{"items": ["Item 1", "Item 2", "Item 3"]}';
//   var jsonData = JSON.parse(data);

//   for (var i = 0; i < jsonData.items.length; i++) {
//     var listItem = document.createElement('li');
//     listItem.textContent = jsonData.items[i];
//     list.appendChild(listItem);
//   }
// }






//! Vytváranie a manipulácia s cookies:

// <!-- HTML -->
// <input type="text" id="cookieValue" placeholder="Enter cookie value">
// <button onclick="setCookie()">Set Cookie</button>

// <!-- JavaScript -->
// <script>
// function setCookie() {
//   var cookieValue = document.getElementById('cookieValue').value;
//   document.cookie = 'myCookie=' + cookieValue;
//   alert('Cookie set!');
// }






//! Získavanie dát z JSON API:

// <!-- HTML -->
// <ul id="usersList"></ul>
// <button onclick="getUsers()">Get Users</button>

// <!-- JavaScript -->
// <script>
// function getUsers() {
//   fetch('https://jsonplaceholder.typicode.com/users')
//     .then(response => response.json())
//     .then(data => {
//       var userList = document.getElementById('usersList');
//       data.forEach(user => {
//         var listItem = document.createElement('li');
//         listItem.textContent = user.name;
//         userList.appendChild(listItem);
//       });
//     })
//     .catch(error => console.error('Error:', error));
// }







//!  Ovládanie videa pomocou HTML5 Video API:

// <!-- HTML -->
// <video id="myVideo" width="320" height="240" controls>
//   <source src="movie.mp4" type="video/mp4">
//   Your browser does not support the video tag.
// </video>
// <button onclick="playPause()">Play/Pause</button>

// <!-- JavaScript -->
// <script>
// function playPause() {
//   var video = document.getElementById('myVideo');
//   if (video.paused) {
//     video.play();
//   } else {
//     video.pause();
//   }
// }
// </script>








// ! Jednoduchý slider pomocou JavaScriptu:

// <!-- HTML -->
// <div id="slider" class="slider">
//   <div class="slide">Slide 1</div>
//   <div class="slide">Slide 2</div>
//   <div class="slide">Slide 3</div>
// </div>
// <button onclick="prevSlide()">Previous Slide</button>
// <button onclick="nextSlide()">Next Slide</button>

// <!-- CSS -->
// <style>
// .slider {
//   overflow: hidden;
//   white-space: nowrap;
// }

// .slide {
//   display: inline-block;
//   width: 100%;
// }
// </style>

// <!-- JavaScript -->
// <script>
// var currentSlide = 0;

// function showSlide(index) {
//   var slider = document.getElementById('slider');
//   var slides = document.getElementsByClassName('slide');
//   currentSlide = (index + slides.length) % slides.length;
//   slider.style.transform = 'translateX(' + (-currentSlide * 100) + '%)';
// }

// function prevSlide() {
//   showSlide(currentSlide - 1);
// }

// function nextSlide() {
//   showSlide(currentSlide + 1);
// }
// </script>





//!  Ovládanie udalostí klávesnice:

// <!-- JavaScript -->
// <script>
// document.addEventListener('keydown', function(event) {
//   if (event.key === 'ArrowUp') {
//     alert('Up arrow pressed!');
//   } else if (event.key === 'ArrowDown') {
//     alert('Down arrow pressed!');
//   }
// });
// </script>





//! Vytváranie jednoduchého časovača:

// <!-- HTML -->
// <div id="timer">0:00</div>
// <button onclick="startTimer()">Start Timer</button>
// <button onclick="stopTimer()">Stop Timer</button>

// <!-- JavaScript -->
// <script>
// var timerInterval;
// var seconds = 0;

// function updateTimer() {
//   var minutes = Math.floor(seconds / 60);
//   var remainingSeconds = seconds % 60;
//   document.getElementById('timer').innerHTML = minutes + ':' + (remainingSeconds < 10 ? '0' : '') + remainingSeconds;
// }

// function startTimer() {
//   timerInterval = setInterval(function() {
//     seconds++;
//     updateTimer();
//   }, 1000);
// }

// function stopTimer() {
//   clearInterval(timerInterval);
// }
// </script>






//!  Drag and Drop:

// <!-- HTML -->
// <div id="draggableElement" draggable="true" ondragstart="drag(event)">Drag me!</div>
// <div id="dropTarget" ondrop="drop(event)" ondragover="allowDrop(event)">Drop here</div>

// <!-- JavaScript -->
// <script>
// function drag(event) {
//   event.dataTransfer.setData('text', event.target.id);
// }

// function allowDrop(event) {
//   event.preventDefault();
// }

// function drop(event) {
//   event.preventDefault();
//   var data = event.dataTransfer.getData('text');
//   var draggedElement = document.getElementById(data);
//   event.target.appendChild(draggedElement);
// }
// </script>







//! Sledovanie veľkosti okna pre responsívne správanie:

// <!-- JavaScript -->
// <script>
// function checkWindowSize() {
//   var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
//   var height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

//   console.log('Width: ' + width + 'px, Height: ' + height + 'px');
// }

// window.addEventListener('resize', checkWindowSize);
// </script>






//!  Dynamické zmeny farby pozadia:
// html
// Copy code
// <!-- HTML -->
// <div id="colorfulBox" onclick="changeBackgroundColor()">Click me to change color</div>

// <!-- JavaScript -->
// <script>
// function getRandomColor() {
//   var letters = '0123456789ABCDEF';
//   var color = '#';
//   for (var i = 0; i < 6; i++) {
//     color += letters[Math.floor(Math.random() * 16)];
//   }
//   return color;
// }

// function changeBackgroundColor() {
//   var colorfulBox = document.getElementById('colorfulBox');
//   colorfulBox.style.backgroundColor = getRandomColor();
// }
// </script>





//!rest api 
// const apiUrl = 'https://api.example.com/data';
// const accessToken = 'YOUR_ACCESS_TOKEN';

//  Vytvorte HTTP GET požiadavku s hlavičkou pre autentifikáciu

// fetch(apiUrl, {
//   method: 'GET',
//   headers: {
//     'Authorization': `Bearer ${accessToken}`,
//     'Content-Type': 'application/json' // Nastavte obsah na JSON, ak je to potrebné
//   }
// })
//   .then(response => {
//     if (!response.ok) {
//       throw new Error(`Chyba pri komunikácii s API: ${response.status}`);
//     }
//     return response.json(); // Rozparsovanie odpovede vo formáte JSON
//   })
//   .then(data => {
//     console.log('Dáta získané z API:', data);
//   })
//   .catch(error => {
//     console.error('Chyba:', error);
//   });