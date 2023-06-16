let navbar = document.querySelector('.header .flex .navbar');


var icon=document.getElementById("icon-dark");

icon.onclick=function(){
  document.body.classList.toggle("dark-theme");
}

document.querySelector('.header .flex #menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

var swiper = new Swiper(".phones-slider", {
   slidesPerView: 1,
   spaceBetween: 20,
   loop:true,
   grapCursor:true,
   centeredSlides:true,
   autoplay: {
      delay: 9500,
      disableOnInteraction: false,
    },
   pagination: {
     el: ".swiper-pagination",
     clickable: true,
   },
   breakpoints: {
     0: {
       slidesPerView: 1,
     },
     768: {
       slidesPerView: 2,

     },
     991: {
       slidesPerView: 3,

     },
   },
 });
