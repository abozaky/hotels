$(document).ready(function () {
  $('.summernote').summernote({
    placeholder: 'write Your Article',
    tabsize: 5,
    height: 200
  });
});

$(document).ready(function () {

  $('input').on('change', function () {

    if ($('#inlineRadio1').is(':checked')) {

      $('.offer').show();

    } else if ($('#inlineRadio2').is(':checked')) {

      $('.offer').hide();
    }

  });
});

$('#myForm a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})

$(function () {
  $('.datatable').DataTable()
})

// select box - ajax - cities by country id 
$('#countries').change(function(){
  let val = $(this).val();
  
  $.ajax({

    type: 'GET',

    url: '/hotels/public/dashboard/ajaxRequest/'+val,

    success: function (data) {

      // console.log(data);
      if(data.cities.length){

        // reset all element in cities
        $('.cities').html('');

        let select = `
          <label for="cities">Select City </label>
          <select class="form-control" name="city_id" id="cities"></select>
        `
  
        $('.cities').append(select);
  
        data.cities.forEach(city => {
          // console.log(city)
          let option = `<option value="${city.id}">${city.city_enName} -${city.city_arName}</option>`;
          $('#cities').append(option);
        });
      } else {

        alert('no cities in this country !!!')
        $(".cities").html("");

      }

    }

  });
  
})



