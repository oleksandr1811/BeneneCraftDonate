$(function(){
	$('body').on('click', '#auth-form [type="submit"]', function(e){
		e.preventDefault();

		var that = $(this);
		var form = $('#auth-form');

		that.prop('disabled', true);

		qx.load_elements(meta.site_url+'auth', qx.getFormValues(form), function(data){

			if(!data.type){ that.prop('disabled', false); return qx.notify(data.text); }

			form.hide();
			$('#success-auth-form').fadeIn('slow');

			setTimeout(function(){
				window.location.href = meta.site_url+'admin';
			}, 1000);
		}, false, function(data){
			that.prop('disabled', false);

			console.log(data);
		});
	});
});