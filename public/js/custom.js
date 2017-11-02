function highlightStar(obj,id) {
  removeHighlight(id);
  $('#fundraiser-'+id+' li').each(function(index) {
    $(this).addClass('highlight');
    if(index == $('#fundraiser-'+id+' li').index(obj)) {
      return false;
    }
  });
}

function removeHighlight(id) {
  $('#fundraiser-'+id+' li').removeClass('selected');
  $('#fundraiser-'+id+' li').removeClass('highlight');
}

function addRating(obj,id) {

  $('#fundraiser-'+id+' li').each(function(index) {
    $(this).addClass('selected');
    $('#fundraiser-'+id+' #rating').val((index+1));
    if(index == $('#fundraiser-'+id+' li').index(obj)) {
      return false;
    }
  });
  var d = 12;
  $.ajax({
    method:'POST',
    url: '/add_rating',
    data:{'id' : id,'rating': $('#fundraiser-'+id+' #rating').val(),_token: $('input[name="_token"]').val()},
    success: function(response){ // What to do if we succeed
      console.log(response);
      window.location.href = '/review/'+id;
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
     // console.log(JSON.stringify(jqXHR));
      //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }

  });
}

function resetRating(id) {
  if($('#fundraiser-'+id+' #rating').val() != 0) {
    $('#fundraiser-'+id+' li').each(function(index) {
      $(this).addClass('selected');
      if((index+1) == $('#fundraiser-'+id+' #rating').val()) {
        return false;
      }
    });
  }
}