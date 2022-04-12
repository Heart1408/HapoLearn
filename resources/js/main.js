$(document).ready(function () {  
  $('#showMenu').click(function () {
    $('#headerMenuList').toggleClass('show-menu');
    $('#showMenu > i').toggleClass('fa-xmark');
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

  if($('#loginForm input').hasClass('is-invalid')) {
    $('#loginRegisterForm').addClass('active-form');
  }

  if($('#registerForm input').hasClass('is-invalid')) {
    $('#loginRegisterForm').addClass('active-form');
    $('#openRegisterFormBtn').addClass('active');
    $('#openLoginFormBtn').removeClass('active');
    $('#registerForm').css('display', 'block');
    $('#loginForm').css('display', 'none');
  }

  $('#openLoginFormBtn').click(function () {
    $('#loginForm').css('display', 'block');
    $('#registerForm').css('display', 'none');
    $(this).addClass('active');
    $('#openRegisterFormBtn').removeClass('active');
  })

  $('#openRegisterFormBtn').click(function () {
    $('#loginForm').css('display', 'none');
    $('#registerForm').css('display', 'block');
    $(this).addClass('active');
    $('#openLoginFormBtn').removeClass('active');
  })

  $('#openMessageBtn').click(function () {
    $('#message').toggleClass('open-message');
  })

  $('#closeMessageBtn').click(function () {
    $('#message').removeClass('open-message');
  })

  $('[data-toggle="tooltip"]').tooltip();
});
