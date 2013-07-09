jQuery(document).ready(function($) {

	var button = $('.follow');
	
	button.on("click",function(){
		var data = {
			action: 'my_action',
			data: $(this).attr("data"),
			whatever: 'xyz'
		};
		
		// We can also pass the url value separately from ajaxurl for front end AJAX implementations
		jQuery.post(ajax_object.ajax_url, data, function(response) {
			button.val('Following');
		});
		
	});
	
});