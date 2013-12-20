$(document).ready(function(){
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