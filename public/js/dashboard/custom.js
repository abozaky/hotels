$(document).ready(function() {
        $('#summernote').summernote({
        	 placeholder: 'write Your Article',
        tabsize: 5,
        height: 300
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

