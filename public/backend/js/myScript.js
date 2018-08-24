$(document).ready(function(){
    $('.fadeout').delay(3600).fadeOut();
});

// create more image on click add button
$("#addMoreImage").click(function(){
    $('#imageBlock').append(
        '<div id="imageField">'+
        '<button type="button" class="removeQuatationBtn btn btn-custom"><i class="fa fa-close"></i></button>'+
        '<input name="prodImages[]" id="product_more_image_path" type="file">'+
        '</div>'
    );
});
$("#imageBlock").on("click", ".removeQuatationBtn", function (e) {
    $(this).parents("#imageField").remove();
});

$('.customText').on('click','.removeQuatationBtn',function (e) {
    var getData= $(this).attr('data-value');
    $('div.deleteImg').append(
        '<input type="hidden" name="deleteImg['+getData+']" />'
    );
    console.log(getData);
   $(this).parents('.customText').remove();
});
