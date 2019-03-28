
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
$(document).ready(function(){
   
    var w_btn = $('.w_am');
   
    w_btn.on('click', function(e){
        var am_v = $('#p_r').val();
        // console.log(am_v);
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "ajax/withdrawl.ajax.php",
            data: {amount: am_v},
            success: function ( data ) {
                if( !data.error ){
                    $('.al_pr').html(data);
                }
            }
        });
    });


    w_btn.on('keyup', function(e){
        var in_am = $('#p_r').val();
        // console.log(am_v);
        // e.preventDefault();
        $.ajax({
            type: "post",
            url: "ajax/withdrawl.ajax.php",
            data: {am_ch: in_am},
            success: function ( data ) {
                if( !data.error ){
                    $('.al_pr').html(data);
                }
            }
        });
    });


    // Total Downline
    
    $('#downline').slideUp(function(){
        
    });
    $('.dl_h > span').addClass('plus');
    $('.dl_h').click(function(){
        
        $('#downline').slideToggle(function(e){
            $('.dl_h > span').toggleClass('minus');
        });
    });

});


// Total Down Line View User Detail

$(document).ready(function(){

    var dn_b = $('.dn_i');
    var dn_i = $('.dn_i').val();

    var td_res = $('.td_res');

    dn_b.on('click', function(e){
        e.preventDefault();
        dn_b = $(this);
        $.ajax({

            type: "post",
            url: "ajax/us_detail.php",
            data: {sid: dn_i},
            beforeSend: function(){
                 
            },
            success: function (data) {
                
                setTimeout(function(){
    
                    if(!data.error) {
                        td_res.html(data);
                        dn_b.html("<span class='spinner-border spinner-border-sm'></span>View Profile");
                    } else {
                        swal({
                            title: "Something Went Wrong"
                        });
                    }
    
    
                }, 2000);
    
            }
    
        });
    });
});

