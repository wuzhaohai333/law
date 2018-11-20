$(function(){
	var a=10;
	$(".person_wallet_recharge .ul li").click(function(e){
		var money = $(this).find('h2').html();
		$(this).addClass("current").siblings("li").removeClass("current");
		$(this).children(".sel").show(0).parent().siblings().children(".sel").hide(0);
		$('#amount').html(money);
	});
	$("#txt").blur(function(){
		$(".person_wallet_recharge .ul li").removeClass("current");
		$(".person_wallet_recharge .ul li").children(".sel").hide(0);
		$('#amount').html($(this).val());
	});

	$(".botton").click(function(e){
		var txt = $("#txt").val();
		if(!$(".person_wallet_recharge .ul li").hasClass('current') && txt ==''){			
		layer.open({
            content: '请选择或输入金额',
            style: 'background:rgba(0,0,0,0.6); color:#fff; border:none;',
            time:3
           });
           return false;
		}
		if(!$(".person_wallet_recharge .ul li").hasClass('current')){
			if( txt < a){
				layer.open({
	            content: '金额必须是10元以上',
	            style: 'background:rgba(0,0,0,0.6); color:#fff; border:none;',
	            time:3
	           });
	           return false;
			}
		}
		$(".f-overlay").show();
		$(".addvideo").show();
	})
	$(".cal").click(function(e){
		$(".f-overlay").hide();
		$(".addvideo").hide();
	})
});
