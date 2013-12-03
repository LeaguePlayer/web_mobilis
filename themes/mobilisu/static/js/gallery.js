(function(jQuery) {
    var gallery;
    var list;
    var imageFrame;
    var currentImage;
    var title;

    function ignoreTempImages() {
        $(document.body).find('.gallery-temp').attr('class', 'gallery-ignore');
    }

    function deselectThumbnail() {
        list.find('.selected').removeClass('selected');
    }

    function selectThumbnail(node) {
        node.addClass('selected');
    }

    function showImage(node) {
        var url = node.attr('href');
        var title = node.attr('title');
        var newImage = $('<img src="' + url + '" class="gallery-temp" />');
        
        newImage.attr('title', title);
        newImage.css({
            position:   'absolute',
            left:       '-10000px',
            top:       '-10000px'
        });
        newImage.appendTo(document.body);
        newImage.load(onLoad);

        deselectThumbnail();
        selectThumbnail(node);
    }

    function alignImage() {
        var x = Math.ceil((imageFrame.width() - currentImage.width()) / 2);
        var y = Math.ceil((imageFrame.height() - currentImage.height()) / 2);
        
        currentImage.css({
            position:   'relative',
            top:        y,
            left:       x
        });
    }

    function onLoad() {
        var img = $(this);

        if(img.hasClass('gallery-ignore')) {
            img.remove();
            return;
        }

        currentImage.remove();
        currentImage = img;
        currentImage.appendTo(imageFrame);
        currentImage.css({
            position:   'relative',
            left:       '0',
            top:        '0'
        })

        title.text(currentImage.attr('title'));

        alignImage();
    }

    function showFirstImage() {
        var first = list.find('a:first');

        if(!first.size())
            return false;

        showImage(first);
    }

    jQuery.fn.gallery = function() {
        gallery = $(this);
        imageFrame = gallery.find('.image');
        currentImage = imageFrame.find('img');
        list = gallery.find('.list');
        title = gallery.find('.title');
        
        gallery.find('.scrollable').scrollable();
        list.find(' .items a').click(function(){
            if(currentImage.size()) {
                currentImage.fadeTo('fast', 0.3);
            }

            var aNode = $(this);

            ignoreTempImages();
            showImage(aNode);

            return false;
        });

        showFirstImage();
    }
})(jQuery);