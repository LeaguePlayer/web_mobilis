$(function(){
  $("#menu-1 li")
    .mouseenter(function(){
      $(this).addClass("hover");
    })
    .mouseleave(function(){
      $(this).removeClass("hover");
    });

    $("#menu-1 ul:first>li").each(function(){
      var liNode = $(this);
      var ulNode = liNode.find(">ul");
      var liWidth = liNode.width();
      var ulWidth = ulNode.width();
      if(ulWidth < liWidth) {
        ulNode.width(liWidth);
      }
    });
});