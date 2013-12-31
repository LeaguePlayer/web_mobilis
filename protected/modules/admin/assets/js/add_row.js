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

  $('.attrs').on('click','ul li a',function(){
    $this=$(this);
    $.ajax({
      url: "/admin/category/AttrDelete",
      type:"POST",
      data:{cat_id: $(this).data('cat'), attr_id: $(this).data('attr')},
      success:function(data)
      {
      }
    });
      $this.closest('li').slideUp(200, function() {
          $(this).remove();
        });
    return false;
  })
  $('#add').click(function(){
          $('.attrs ul').append('<li><input type="text" name="attr[]" id="attr"><a class="del_btn" href="#" ></a></li>');
      })
  $('#category-form').liTranslit({
    elName: '#Category_name',    //Класс елемента с именем
    elAlias: '#Category_alias'   //Класс елемента с алиасом
  })
})