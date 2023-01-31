$(document).ready(function () {
    $('.phpmc_buy').submit(function () {
        if(!$(this).data('ready')) {
            check($(this));
            return false;
        }
    });
    $('.select-group').change(function () {
        check($(this).parents('form'));
    });
    var nick_time = false;
    $('.input-nick').keyup(function () {
        if(nick_time) clearTimeout(nick_time);
        $(this).parents('form').find('.buy_btn').text('Загрузка..').prop('disabled',true);
        nick_time = setTimeout(()=>{
            check($(this).parents('form'));
        },500);
    });
    var promo_time = false;
    $('.input-promo').keyup(function () {
        if(promo_time) clearTimeout(promo_time);
        $(this).parents('form').find('.buy_btn').text('Загрузка..').prop('disabled',true);
        promo_time = setTimeout(()=>{
            check($(this).parents('form'));
        },500);
    });
	
	$.post('/engine/ajax.php?type=stat/online',{},function(data){
		$('#online').html(data);
	});
	
	$.post('/engine/ajax.php?type=stat/slots',{},function(data){
		$('#slots').html(data);
	});
	
	$.post('/engine/ajax.php?type=donaters',{},function(data){
		$('#donaters').html(data);
	});
	
	var date = new Date();
	var day = date.getDate() + 1;
	var month = date.getMonth() + 1 ;
	if(day >= 32) { day = day - 1 }
	
	$(".row").countdown("2021/" + month + "/" + day, function(event) {
		$('.second').text(event.strftime('%H'));
		$('.third').text(event.strftime('%M'));
		$('.four').text(event.strftime('%S'));
	});
});

function check(form) {
    if(form.find('.input-nick').val().length === 0) return form.find('.buy_btn').text('Введите ник').prop('disabled',true);
    if(form.find('select option:selected').is(':disabled')) return form.find('.buy_btn').text('Выберите здесь').prop('disabled',true);
    $(form).data('ready',false);
    form.find('.buy_btn').text('Загрузка..').prop('disabled',true);
    var price = $(form).find('select option:selected').data('price');
    var group_id = $(form).find('select option:selected').data('id');
    $.post('/engine/ajax.php',{
        nick: form.find('.input-nick').val(),
        promo: form.find('.input-promo').val(),
        group: group_id,
        srv: form.find('.input-srv_id').val()
    },function (data) {
		var btn = data.split('|')
		if(btn[3] == 1) $(form).find('.vk_id').html('<div class="input-group"><input class="form-control" name="vk_id" placeholder="Ваш ID VK для консоли"><span class="input-group-btn"><button class="btn btn-info" type="button" data-toggle="modal" data-target="#vk_id_info">Где взять?</button></span></div><br>');
		else $(form).find('.vk_id').html("");

		$(form).find('.buy_btn').text(btn[1]).prop('disabled',false);
		$(form).data('ready',true);
    });
}