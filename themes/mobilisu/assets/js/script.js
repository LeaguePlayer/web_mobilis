$(document).ready(function(){
	if($('.carusel').find('li').length==1)
	{
		$('.rightside').css('display','none');
		$('.leftside').css('display','none');
	} else
	$(".jCarouselLite").jCarouselLite({
        btnNext: ".leftside",
        btnPrev: ".rightside",
        visible:1,
    });
    	
		$('.kitchen').find('a').fancybox({
			helpers	: {
				thumbs	: {
					width	: 50,
					height	: 50
				}
			}
		});
})