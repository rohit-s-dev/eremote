
/*=============================================
=            referral link             =
=============================================*/

var ref_link = $('.ref-link');
var ref_link_text = $('.ref-link span');
var ref_link_text_show = 'ref-show';

$(ref_link_text).on('click', function () {

    ref_link.addClass(ref_link_text_show);

    if(ref_link.hasClass(ref_link_text_show)) {
        $('.ref-link_close').show();
    } else {
        $('.ref-link_close').hide();
    }
});

$('.ref-link_close').on('click', function(){
    ref_link.removeClass(ref_link_text_show);
    $('.ref-link_close').hide();
});


/*=====  End of referral link  ======*/

