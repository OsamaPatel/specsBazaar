let navbar = document.querySelector(".navbar");
let serForm = document.querySelector(".search-form");

document.querySelector("#menu-btn").onclick = () => {
  navbar.classList.toggle("active");
};

document.querySelector("#close-navbar").onclick = () => {
  navbar.classList.remove("active");
};

document.querySelector("#search-btn").onclick = () => {
  serForm.classList.toggle("active");
};

window.onscroll = () =>{
  navbar.classList.remove("active");
  serForm.classList.remove("active");
  loginForm.classList.remove('active');
  detail.style.visibility= "hidden";
  detail.style.opacity= "0";
};

let slides = document.querySelectorAll(".home .homesub .slide");
let index = 0;

function next() {
  slides[index].classList.remove("active");
  index = (index + 1) % slides.length;
  slides[index].classList.add("active");
};

function prev() {
  slides[index].classList.remove("active");
  index = (index - 1 + slides.length) % slides.length;
  slides[index].classList.add("active");
};


let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');



formBtn.addEventListener('click', () =>{
    loginForm.classList.add('active');
});

formClose.addEventListener('click', () =>{
    loginForm.classList.remove('active');
});

let hidbtn = document.querySelector("#hid4");

hidbtn.addEventListener('click', () =>{
  formBtn.style.display="none";
});





var swiper = new Swiper(".subcat-slider", {
  loop: true,
  grabCursor : true,
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 2,
    },
    550: {
      slidesPerView: 3,
    },
    850: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 6,
    },
  },
});






var swiper = new Swiper(".products-slider", {
  loop: true,
  grabCursor : true,
  spaceBetween: 20,
  autoplay: {
        delay: 2500,
        disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    550: {
      slidesPerView: 2,
    },
    850: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 3,
    },
  },
});


var swiper = new Swiper(".arrivals-slider", {
  loop: true,
  grabCursor : true,
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    550: {
      slidesPerView: 2,
    },
    850: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
  },
});


var swiper = new Swiper(".blogs-slider", {
  loop: true,
  grabCursor : true,
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    650: {
      slidesPerView: 2,
    },
    1200: {
      slidesPerView: 3,
    },
  },
});

let usr = document.querySelector('#use');
  let detail = document.querySelector('.userr');


  usr.addEventListener('click', () => {
    detail.style.visibility= "visible";
    detail.style.opacity= "1";
  });

let clo = document.querySelector('#close-profile');

 clo.addEventListener('click', () => {
      detail.style.visibility= "hidden";
      detail.style.opacity= "0";
    });




