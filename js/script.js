let navbar = document.querySelector('.header .flex .navbar');


document.querySelector('.header .flex #menu-btn img').onclick = () =>{
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