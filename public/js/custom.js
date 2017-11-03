$(function () {

  //submit comment details from comment form
  $('#review_form').on('submit', function (e) {

    var $id = $('#id').val();
    var $rating = $('#fundraiser-' + $id + ' #rating').val(); //$('#rating').val();

    e.preventDefault();

    var data = $('form').serializeArray();
    data.push({'id': $id, 'rating': $rating});

    $.ajax({
      type: 'POST',
      url: '/add_review',
      data: $.param(data),
      success: function (response) { // What to do if we succeed
        if (response.status == 'success') {
          alert("Thank you for your review!");
          location.href = '/';
        }
        else if (response.status == 'error') {
          alert("Error adding review!");
        }
      }
    });

  });


  // js function for adding a new fundraiser
  $('#new_fundraiser_form').validate({
    rules: {
      new_fundraiser: {
        required: true
      }
    },
    submitHandler: function(form) {
      $.ajax({
        url: '/add_fundraiser',
        type: 'POST',
        data: $(form).serialize(),
        success: function (response) { // What to do if we succeed
          if (response.status == 'success') {
            alert("Thank you for adding a new fundraiser");
            location.href = '/';
          }
          else if (response.status == 'error') {
            alert("Error adding fundraiser!");
          }
        },
        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
          console.log(JSON.stringify(jqXHR));
          //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
      });
    }

  });

});


function highlightStar(obj, id) {
  removeHighlight(id);
  $('#fundraiser-' + id + ' li').each(function (index) {
    $(this).addClass('highlight');
    if (index == $('#fundraiser-' + id + ' li').index(obj)) {
      return false;
    }
  });
}

function removeHighlight(id) {
  $('#fundraiser-' + id + ' li').removeClass('selected');
  $('#fundraiser-' + id + ' li').removeClass('highlight');
}


// adds just the star ratings
function addRating(obj, id) {

  $('#fundraiser-' + id + ' li').each(function (index) {
    $(this).addClass('selected');
    $('#fundraiser-' + id + ' #rating').val((index + 1));
    if (index == $('#fundraiser-' + id + ' li').index(obj)) {
      return false;
    }
  });

  var $rating = $('#fundraiser-' + id + ' #rating').val();
  $.ajax({
    method: 'POST',
    url: '/add_rating',
    data: {
      'id': id,
      'rating': $rating,
      _token: $('input[name="_token"]').val()
    },
    success: function (response) { // What to do if we succeed
      if (response.status == 'success') {
        alert("Thank you for your " + $rating +" rating!");
        location.href = '/review/' + id;
      }
      else if (response.status == 'error') {
        alert("Error adding rating!");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
      console.log(JSON.stringify(jqXHR));
      //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }

  });
}

function resetRating(id) {
  if ($('#fundraiser-' + id + ' #rating').val() != 0) {
    $('#fundraiser-' + id + ' li').each(function (index) {
      $(this).addClass('selected');
      if ((index + 1) == $('#fundraiser-' + id + ' #rating').val()) {
        return false;
      }
    });
  }
}