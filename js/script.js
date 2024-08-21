function scrollSlides(direction) {
    const carousel = document.querySelector('.carousel');
    const slideWidth = document.querySelector('.slide').offsetWidth;
    const scrollAmount = direction * (slideWidth + 20); // 20 is the margin between slides
    carousel.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
    });
}


document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navUl = document.querySelector('nav ul');

    menuToggle.addEventListener('click', function() {
        navUl.classList.toggle('showing');
    });
});


const menu = document.querySelector('.menu-toggle');
const close = document.querySelector('.close');
const nav = document.querySelector('nav');

menu.addEventListener('click', ()=>{
    nav.classList.add('open-nav')
});
close.addEventListener('click', ()=>{
    nav.classList.remove('open-nav')
});