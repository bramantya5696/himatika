// hamburger script
const hamburger = document.querySelector(
  ".navbar .nav-bar .nav-list .hamburger"
);
const mobile_menu = document.querySelector(".navbar .nav-bar .nav-list .menu");
const menu_item = document.querySelectorAll(
  ".navbar .nav-bar .nav-list .menu li"
);
const navbar = document.querySelector(".navbar.container");
const scroll_to_top = document.querySelector(".scroll-to-top");

scroll_to_top.addEventListener("click", () => {
  document.documentElement.scrollTop = 0;
})

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  mobile_menu.classList.toggle("active");
});

menu_item.forEach((item) => {
  item.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    mobile_menu.classList.toggle("active");
  });
});
// end hamburger script

// scroll script
document.addEventListener("scroll", () => {
  var scroll_position = window.scrollY;
  if (scroll_position > 250) {
    navbar.style.backgroundColor = "#2d3436";  
    scroll_to_top.style.bottom = "30px";  
  } else {
    navbar.style.backgroundColor = "transparent";
    scroll_to_top.style.bottom = "-50px";  
  }
});
// end scroll script

// preloader
setTimeout(function () {
  $('#preloader').fadeToggle();
}, 1500);
// end preloader

// scrollreveal
ScrollReveal({
  reset:true,
  distance:'20px',
  duration:'2500',
  delay:400
});

ScrollReveal().reveal('.scroll-reveal-default');

ScrollReveal().reveal('.section-title', {reset:false});
// scrollreveal header
ScrollReveal().reveal('#header .header .intro', {distance:'30px', delay:1000});
ScrollReveal().reveal('#header .header hr', {distance:'0',scale:0.7});
ScrollReveal().reveal('#header .header .keterangan',{delay:2000, origin: 'top'});
// end scrollreveal header

// scrollreveal about section
ScrollReveal().reveal('#about .about .section-title',{origin:'left'});
ScrollReveal().reveal('#about .about .tentang-himatika .logo-himatika', {delay:500, origin:'bottom'});
ScrollReveal().reveal('#about .about .tentang-himatika .deskripsi', {delay:700, origin:'top'});
ScrollReveal().reveal('#about .about .link', {delay:900, origin:'top'});
ScrollReveal().reveal('#about .about .video', {delay:900, origin:'top'});
// end scrollreveal about section

// scrollreveal mathein
ScrollReveal().reveal('#mathein .mathein .matoz', {origin:'left'});
ScrollReveal().reveal('#mathein .mathein .thein', {origin:'right'});
// end scrollreveal mathein

// scrollreveal artikel section
ScrollReveal().reveal('#artikel .artikel .section-title', {delay:500});
ScrollReveal().reveal('#artikel .artikel .boxes .box', {interval:500});
// end scrollreveal artikel section

// scrollreveal gallery
ScrollReveal().reveal('#gallery .gallery .box .image-gallery a', {interval:500});
// end scrollreveal gallery

// scrollreveal himatika
ScrollReveal().reveal('#himatika .himatika > .description', {reset:false});
ScrollReveal().reveal('#himatika .himatika .vi-mi .vision', {reset:false});
ScrollReveal().reveal('#himatika .himatika .vi-mi .mission', {reset:false});

// end scrollreveal himatika

// scrollreveal kabinet
ScrollReveal().reveal('#kabinet .kabinet .kab-list .kab-box', {interval:500});
// end scrollreveal kabinet

// scrollreveal aboutcabinet
ScrollReveal().reveal('#about-cabinet .about-cabinet .icon');
// end scrollreveal aboutcabinet

// scrollreveal vm
ScrollReveal().reveal('#vm .vm .part', {reset:false});
// end scrollreveal vm

// scrollreveal kabinet-baru
ScrollReveal().reveal('#kabinet-baru .kabinet-baru .unit .ga-item .ga-margin', {interval:500});
// end scrollreveal kabinet-baru

// scrollreveal contact
ScrollReveal().reveal('#contact .contact .media', {origin:'top'});
// end scrollreveal contact



// end scrollreveal
document.getElementById("year").innerHTML = new Date().getFullYear();