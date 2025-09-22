
// // carousel auto

$(document).ready(function() {
  let carouselItems = $('.carousel-slides .carousel-slide');
  // carouselItems.first().addClass('active');

  let totalItems = carouselItems.length;
  let currIndex = 0;

  function showItem(currInd) { 
    carouselItems.removeClass('active');
    carouselItems.eq(currInd).addClass('active');
  }

  function autoplay() {
    currIndex = (currIndex + 1) % totalItems;
    showItem(currIndex);
  }

  setInterval(autoplay, 3000);
});


// accordian
$(document).ready(function () {
  $('.accordion-header').click(function () {
    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
      $(this).next('.accordion-content').slideUp(200);
    } else {
      $('.accordion-header').removeClass('active');
      $('.accordion-content').slideUp(200);
      $(this).addClass('active');
      $(this).next('.accordion-content').slideDown(200);
    }
  });
});


// modal

   

    setTimeout(() => {    
        $('.modal').addClass('active');
        // $('.modal').fadein(300);
    }, 5000);

    $('#close-popup').click(function () {

      $('.modal').removeClass("active");
      
    })


// toast

  $(document).ready(function () {
    $('#toast').addClass('show');
    setTimeout(function () {
      $('#toast').removeClass('show');
    }, 3000); 
  });
