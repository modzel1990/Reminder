$(window).scroll(function () {
    navbar = document.getElementById('navbar');
    navspacer = document.getElementById('navspacer');
    navHeight = navbar.offsetHeight;
    if($(window).scrollTop() > 0) {
      $(navbar).addClass('sticky');
      $(navspacer).height(navHeight).css('display: block;');
    } else {
      $(navbar).removeClass('sticky');
      $(navspacer).height(0).css('display: hidden;');
    }
  });

  // Nav Mobile
$(document).ready(function() {
    nav = document.getElementById('navbar');
    $("#navmobilebtn").click(function(){
      $(nav).fadeToggle();
    });
});