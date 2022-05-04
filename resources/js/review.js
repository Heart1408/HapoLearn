$(document).ready(function () {
  $courseId = $('#courseId').val();

  $('#sendReviewMessage').click(function (e) {
    e.preventDefault();
    var comment = $('#comment').val();
    var vote = $("input[name='vote']:checked").val();
    if (comment || vote) {
      $.ajax({
        type: 'post',
        url: "/storereviews",
        data: {
          'id': $courseId,
          'comment': comment,
          'vote': vote,
        },
        dataType: 'json',
        success: function (data) {
          console.log(data)
          if (data == 1) {
            loadreviews($courseId);
          }
          $('#comment').val("");
          $("input[name='vote']").prop('checked', false);
        }
      })
    }
  })

  loadreviews($courseId);
  loadstarcolor();
});

function loadreviews($courseId) {
  $.ajax({
    type: 'get',
    url: "/getreviews",
    data: {
      'id': $courseId
    },
    dataType: 'json',
    success: function (data) {
      console.log(data);
      let html = '';
      let itemRate = '';
      data.reviews.forEach(review => {
        html += addReview(review)
      })
      itemRate += addItemRate(data);
      $('#showRatingDetail').html(itemRate);
      $('#listReviews').html(html);
      $('#numberReview').html(data.number_review + ' Reviews')
      if (data.total_rating == null) {
        data.total_rating = 0;
      }
      if (data.avg_rate == null) {
        data.avg_rate = 0;
      }
      $('#number-vote').html(data.total_rating + ' Ratings')
      $('#avgRate').html(parseFloat(data.avg_rate).toFixed(1));
      loadstarcolor();
    }
  })
}

function addItemRate(data){
  let html = '';
  for (var i = 5; i > 0; i--) {
    html += '<div class="item-rate">'
    html += '<div class="rate-number-text">' + i + ' stars </div>'
    html += '<div class="progress" id="progressFiveStar">'
    var progress = 0;
    var number_vote = 0;
    if (data.total_rating != null) {
      switch(i) {
        case 5:
          progress = (data.five_star/data.total_rating)*100;
          number_vote = data.five_star;
          break;
        case 4:
          progress = (data.four_star/data.total_rating)*100;
          number_vote = data.four_star;
          break;
        case 3:
          progress = (data.three_star/data.total_rating)*100;
          number_vote = data.three_star;
          break;
        case 2:
          progress = (data.two_star/data.total_rating)*100;
          number_vote = data.two_star;
          break;
        default:
          progress = (data.one_star/data.total_rating)*100;
          number_vote = data.one_star;
      }
    }
    html += '<div class="progress-bar" role="progressbar" style="width: ' + progress + '%"></div>'
    html += '</div>'
    html += '<div class="vote-number">' + number_vote + '</div>'
    html += '</div>'
  }
  return html;
}

function addReview(review) {
  let html = '';
  html += '<div class="review-item">'
  html += '<div class="user-info">';
  html += '<div class="avartar">'
  html += '<img src="' + review.avartar + '" alt="avartar">';
  html += '</div>'
  html += '<p class="name">' + review.name + '</p>'
  html += '<div class="star" rate="' + review.pivot.rate + '">';
  html += '<i class="fas fa-star"></i>';
  html += '<i class="fas fa-star"></i>';
  html += '<i class="fas fa-star"></i>';
  html += '<i class="fas fa-star"></i>';
  html += '<i class="fas fa-star"></i>';
  html += '</div>'
  var time = new Date(review.pivot.updated_at)
  html += '<div class="time">' + time.toDateString() + ' at ' + time.toLocaleTimeString() + '</div>'
  html += '</div>'
  if (review.pivot.comment == null) {
    review.pivot.comment = '';
  }
  html += '<p class="review-message">' + review.pivot.comment + '</p>'
  html += '</div>'
  return html;
}

function loadstarcolor() {
  $(".star").each(function () {
    var rate = $(this).attr('rate');
    for (var i = 0; i < rate; i++) {
      $(this).find('i').eq(i).css('color', '#FFD567')
    }
  });
}
