$(document).ready(function() {
        $('.summernote').summernote({
        	 placeholder: 'write Your Article',
        tabsize: 5,
        height: 200
        });
    });

$(document).ready(function() {

	$('input').on('change',function(){

       if ($('#inlineRadio1').is(':checked')) {

       		$('.offer').show();

       }else if($('#inlineRadio2').is(':checked')){

       		$('.offer').hide();
       }
		
	});
 });

 $('#myForm a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  })

  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  
 