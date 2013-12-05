$(document).ready(function(){
	curr=count=parseInt($('.carusel').children().length);
	$('.gallery').gallery();
	$('.list').find('img').click(function(){
		$('.title').text($(this).attr('title'));
	})
	$('.carusel').children('ul').width($('.carusel').children('ul').children().width()*$('.carusel').children('ul').children().length);
	$(".jCarouselLite").jCarouselLite({
        btnNext: ".leftside",
        btnPrev: ".rightside",
        visible:1
    });
})