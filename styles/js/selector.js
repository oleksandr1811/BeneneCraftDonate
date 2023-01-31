$(document).ready(function(){
	$.ajax({
		type: "POST",
		url: "select.php",
		dataType: "html",
		data: {get_id:''},
		success: function(s) {
			$('.qiwi').attr('buy_id', s);
			$('.unitpay').attr('buy_id', s);
		}
	});
});

$(document).on('click', '.qiwi', function(){
	let id = $(this).attr('buy_id');
	$.ajax({
		type: "POST",
		url: "select.php",
		dataType: "html",
		data: {qiwi:id},
		success: function(link) {
			window.location.href = link;
		}
	});
});

$(document).on('click', '.unitpay', function(){
	let id = $(this).attr('buy_id');
	$.ajax({
		type: "POST",
		url: "select.php",
		dataType: "html",
		data: {unitpay:id},
		success: function(link) {
			window.location.href = link;
		}
	});
});