$(document).ready(function (){

	$('#Goods_cat_id').change(function(){
		$.ajax({
  			url: '/admin/goods/ajax',
  			method:"GET",
  			data:{id:$(this).val()},
  			success: function(data) {
    		$('.attrs').append(data);
  		}
    });
  })
  $('#add').click(function(){
          data=$('.attrs ul li').first().clone();
          data.children('input').val('');
          $('.attrs ul').append(data);
      })
  if ($('#category-form')!=null)
  $('#category-form').liTranslit({
    elName: '#Category_name',    //Класс елемента с именем
    elAlias: '#Category_alias'   //Класс елемента с алиасом
  });
})