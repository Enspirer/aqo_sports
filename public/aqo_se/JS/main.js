// Scroll Nav 
$(document).ready(function () {
  $(window).scroll(function () {
    var sc = $(window).scrollTop();
    if (sc > 100) {
      $(".bottom").addClass("sticky");
      $(".logoDark").removeClass("d-none");
    } else {
      $(".bottom").removeClass("sticky");
      $(".logoDark").addClass("d-none");
    }
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $('#back-to-top').fadeIn();
    } else {
      $('#back-to-top').fadeOut();
    }
  });
  // scroll body to 0px on click
  $('#back-to-top').click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 400);
    return false;
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
    $('input[name="daterange"]').daterangepicker({
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
