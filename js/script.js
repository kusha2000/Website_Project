let navbar = document.querySelector('.header .flex .navbar');


document.querySelector('.header .flex #menu-btn img').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}
