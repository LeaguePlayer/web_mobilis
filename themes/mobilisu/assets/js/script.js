$(document).ready(function(){
	if($('.carusel').find('li').length==0)
	{
		$('.rightside').css('display','none');
		$('.leftside').css('display','none');
	} else
	$(".jCarouselLite").jCarouselLite({
        btnNext: ".leftside",
        btnPrev: ".rightside",
        visible:1,
    });
    	$('.thumbs a').fancybox({
			helpers	: {
				thumbs	: {
					width	: 50,
					height	: 50
				}
			}
		});
})