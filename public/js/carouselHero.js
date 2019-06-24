// Make hero carousel to swipe even on hover
$('.carousel').carousel({
    "pause": "false"
});

// Length of transition of slides
$(document).ready(function() {
  jQuery.fn.carousel.Constructor.TRANSITION_DURATION = 6000
});