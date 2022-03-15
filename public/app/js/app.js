$(document).ready(function () {
  $('#showMenu').click(function () {
    $('#headerMenuList').toggleClass('show-menu');
    $('.fa-solid').toggleClass('fa-xmark');
  })

  $('.slick-slider').slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    prevArrow: '<button class="slick-prev slick-arrow"><i class="fa-solid fa-angle-left"></i></button>',
    nextArrow: '<button class="slick-next slick-arrow"><i class="fa-solid fa-angle-right"></i></button>',

    responsive: [
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('#loginRegisterFormBtn').click(function () {
    $('#loginRegisterForm').addClass('active-form');
  })

  $('#closeForm').click(function () {
    $('#loginRegisterForm').removeClass('active-form');
  })

  $('#openLoginFormBtn').click(function () {
    $('#loginForm').css('display', 'block');
    $('#registerForm').css('display', 'none');
  })

  $('#openRegisterFormBtn').click(function () {
    $('#loginForm').css('display', 'none');
    $('#registerForm').css('display', 'block');
  })

  $('#openMessageBtn').click(function () {
    $('#message').toggleClass('open-message');
  })

  $('#closeMessageBtn').click(function () {
    $('#message').removeClass('open-message');
  })

  $('.contact-logo').mouseenter(function () {
    $('.contact-logo > a').toggleClass('contact-active');
    $('.info-contact').toggleClass('info-contact-active');
  })
});
