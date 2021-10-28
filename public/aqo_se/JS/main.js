// Scroll Nav 
$(document).ready(function () {
  
  // Avatar Drop Down 
  // document.querySelector('.mini-photo-wrapper').addEventListener('click', function() {
  //   document.querySelector('.menu-container').classList.toggle('active');
  // });

  // side nav-toggl 
  $('.nav-toggle').click(function(e) {
  
    e.preventDefault();
    $("html").toggleClass("openNav");
    $(".nav-toggle").toggleClass("active");
  
  });
 
});

// Mobile Navigation
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}


// Date Range Select 
$(function() {
    $('input[name="date_range"]').daterangepicker({
      opens: 'left'
    }, function(start, end, label) {
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
  });


// Navigtion 
var elem = $('.nav-item');
var index;

elem.each(function(i){
  
  var elemWidth = $(this).innerWidth();
  var border = $(this).find('.border');
  
  $(this).mouseover(function() {
    
    border.show();
    
    if (!index && index != 0) {
      border.css('left', 0);
    }
    
    if ( $(this).index() > index ) {
      border.css('left', -elemWidth + 'px');
      border.animate({
        left: 0
      }, 200);
    }
    
    if ( $(this).index() < index ) {
      border.css('left', 'auto');
      border.css('right', -elemWidth + 'px');
      border.animate({
        left: 0
      }, 200);
    }
    
    index = $(this).index();
    
  });
  
  $(this).mouseout(function() {
    $(this).find('.border').hide();
  });
  
});

$('.nav').mouseleave(function() {
  index = undefined;
});


