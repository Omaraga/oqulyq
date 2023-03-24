/*
author: Boostraptheme
author URL: https://boostraptheme.com
License: Creative Commons Attribution 4.0 Unported
License URL: https://creativecommons.org/licenses/by/4.0/
*/

const toggle = document.querySelectorAll('.toggle')
const headerNav = document.querySelector('.header-nav')
const burgerClose = document.querySelector('.burgerClose')
const burger = document.querySelector('.burger')
const headerUser = document.querySelector('.header-user')
const headerUserSelect = document.querySelector('.header-user__select')
let headerUserView = true

const cardPrev = document.querySelectorAll('.c-card__header')
const vid = document.querySelectorAll(".myVideo");
const vid2 = document.querySelectorAll(".c-card__img");
cardPrev.forEach(block => {
    block.querySelector(".c-card__img").addEventListener('mouseover', img => {
        block.style.transition = 'scale(1.1)'
            img.target.className = 'c-card__img d-none'
        block.querySelector(".myVideo").className = 'myVideo d-block'
        block.querySelector(".myVideo")
    })
    block.querySelector(".myVideo").addEventListener('mouseout', video => {
        block.querySelector(".c-card__img").className = 'c-card__img d-block'
        video.target.className = 'myVideo d-none'
    })
})

if(headerNav){
    burger.addEventListener('click', e => {
        headerNav.classList.add('active')
    })
}
if(burgerClose){
    burgerClose.addEventListener('click', e => {
        headerNav.classList.remove('active')
    })
}
if (window.innerWidth < 992 && window.innerWidth > 675){
    $('.welcome-slick').slick({
        slidesToShow: 2,
        autoplay: true,
        autoplaySpeed: 3000,
    });
}
if (window.innerWidth < 675){
    $('.welcome-slick').slick({
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 3000,
    });
}

$('.toggle').click(function (e){
    e.preventDefault();
    $(this).find('.toggle-text').toggle(500);
    $(this).toggleClass("open", 1500);
});
/* ----- HEADER ----- */
if (headerUser){
    headerUser.onclick = viewUser
}

function viewUser(){
    headerUserView = true
    console.log(headerUserView)
    if(headerUserView) {
        headerUserSelect.style.display = 'flex'
    }else{
        headerUserSelect.style.display = 'none'
    }
}
document.addEventListener( 'click', (e) => {
    const withinBoundaries = e.composedPath().includes(headerUser);

    if ( !withinBoundaries && headerUserSelect) {
        headerUserSelect.style.display = 'none';
        headerUserView = false
    }
})
$('.part-slick').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
});