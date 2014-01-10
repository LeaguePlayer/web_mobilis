$(document).ready(function (){
  action=location.href.indexOf('goods/create')>0;
  if (action==true) action='create'; else action='update';
	$('#Goods_cat_id').change(function(){
    len=document.location.href.length;
    id=document.location.href.substring(document.location.href.lastIndexOf('/')+1,len);
		$.ajax({
  			url: '/admin/goods/ajax',
  			method:"GET",
  			data:{item:$(this).val(),action:action,id:id},
  			success: function(data) {
          if (data!='')
          {
            $('.attrs').html('<label for="">Характеристики</label>');
        		$('.attrs').append(data);
          }
  		}
    });
  });
  $('#Goods_cat_id').change();
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