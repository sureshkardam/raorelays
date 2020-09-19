$(function(){
	$('.menu-bt,.close-menu').click(function(){
		$('.navbar-dark.bg-dark').slideToggle(350);
		$('.menu-bt').toggleClass('active');
		return false
	});
	$('.form-wraper form').hide();
	$('.select-form').on('change', function(){
		var selectValue = $(this).val();
		if (selectValue != 'default' && selectValue != '' && selectValue != 0){
			$('.form-wraper form[data-id="'+selectValue+'"]').fadeIn().siblings('form').hide();
		}
	});
	//var addForm = $('.add-events-fields');
	$('.form-wraper').on('click', '.add-events-trigger', function(){
		var addForm = $(this).prev('.add-events-fields').clone();
		$(this).before(addForm);
		return false;
	});
	$('.search-bt').click(function(){
		$('body').addClass('search-active');
	});
	$('.search-bar .close').click(function() {
		$('body').removeClass('search-active');
	});
	$('body').on("keypress keyup blur",function (e){
        if (e.which == 27) $('.close').click();   // esc
    });
    $(document).keyup(function(e) {
        if (e.which == 27) $('.close').click();   // esc
    });
});