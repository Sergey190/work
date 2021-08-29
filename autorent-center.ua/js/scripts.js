$(document).ready(function () {
	
	$('.nav a').click(function () {

		$('.nav a').removeClass('active')
		$(this).addClass('active');

	});


$('.menu li').on('click',function(){
  var targetBlock = $(this).data('content');
  $('.'+targetBlock).show().siblings('.hide').hide();
});



$('#country').change(function(){
    var selectval= $(this).val(); // Получим значение из select со значением #participation
    if( selectval== 'musician' ) {
        $('.musician_input_div').show();
    } else {
        $('.musician_input_div').hide();
    }
});
  



	
});