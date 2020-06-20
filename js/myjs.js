// JavaScript Document
$(function(){	



	//焦点图轮播1
	;(function(){  
	 var timer=null;
		var num=0;
		 function sport(){ 
		 	clearInterval(timer);
		 	timer=setInterval(function(){ 
				num++;
				if(num>4){  
					num=0;
				}
			$('.pro_left01_c01 ol li').eq(num).addClass('current').siblings().removeClass('current');
			$('.pro_left01_c01 ul').stop().animate({marginLeft:num*-521},1000);
		 },3000);}
		 
		 sport();
		 
			$('.pro_left01_c01').hover(function() {
				clearInterval(timer);
			},function(){ 
				sport();
			});
			
			$('.pro_left01_c01 ol li').mouseover(function() {
				$(this).addClass('current').siblings().removeClass('current');
				var index=$(this).index();
				$('.pro_left01_c01 ul').stop().animate({marginLeft:index*-521},1000);
				num=index;
			});
	})();
	
	
	//焦点图轮播2
	;(function(){  
	 var timer=null;
		var num=0;
		 function sport(){ 
		 clearInterval(timer);
		 timer=setInterval(function(){ 
			num++;
			if(num>5){  
				num=0;
			}
			$('.pro_left01_c03 ol li').eq(num).addClass('current').siblings().removeClass('current');
			$('.pro_left01_c03 .lunbo2').stop().animate({marginLeft:num*-521},1000);
		 },3000);}
		 
		 sport();
		 
			$('.pro_left01_c03').hover(function() {
			clearInterval(timer);
			},function(){ 
			sport();
			});
			
			$('.pro_left01_c03 ol li').mouseover(function() {
				$(this).addClass('current').siblings().removeClass('current');
				var index=$(this).index();
				$('.pro_left01_c03 .lunbo2').stop().animate({marginLeft:index*-521},1000);
				num=index;
			});
	})();
	
	
	//回到顶部
	$('.box .num09').click(function() {
        $('html,body').animate({scrollTop:0},600);
    });
	
	
	//导航鼠标移上事件
	;(function(){  
		$('.header_r .li01').hover(function() {
			$(this).children('div').stop().toggle();
		});
	})();
	
	
	//pro_list
	;(function(){	
	
		$('.pro_left01_l>div>span').each(function(index, element) {
				var pic=index+1;
			$(element).css('background','url(images/pro_left_list0'+pic+'.png) no-repeat 11px center');
		});
	
	
		$('.pro_left01_l>div').hover(function() {
			$(this).css('background','#f94a14').children('.theme').show();
		},function(){
			$(this).css('background','none').children('.theme').hide();
		});
		
	})();
		
	
	
	
	//Tab栏 
	;(function(){
		$('.pro_right02 li').mouseover(function(){
			$(this).addClass('cur03').siblings().removeClass('cur03');
			var num=$(this).index();
			$('.pro_right02 span').eq( num ).show().siblings().hide();
		});
	})();
	
	;(function(){ 
		$('.pro_right03>ul>li').hover(function(){
			$(this).children('.lis').toggle();
        });
	
	})();



});

