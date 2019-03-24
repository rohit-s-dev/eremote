
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



// Ajax
$(document).ready(function(){
    var doneBtn = $('.done');
       
        
    doneBtn.on('click', function(e){
        e.preventDefault();
        // console.log( $(this) );
        var uid = $(this).attr('href');
        $.ajax({
            url: 'ajax/pinreq.ajax.php',
            type: 'POST',
            data: {user_id: uid},
            success: function(data) {
                if(!data.error) {
                    $('.shm').html(data);
                }
            }
        });
    });


    // Active Ajax------------------------------------------------------------------------
    var active = $('.active');

    active.on('click', function(e){
        e.preventDefault();
        var activeUid = $(this).attr('href');

        console.log(activeUid);

        $.ajax({
            type: "POST",
            url: "ajax/ac.inac.ajax.php",
            data: {ac_uid: activeUid},
            success: function (data) {
                if(!data.error) {
                    $('.main').html(data);
                }
            }
        });
    });

    // Inactive
    var inactive = $('.inactive');

    inactive.on('click', function(e){
        e.preventDefault();

        inactiveUID = $(this).attr('href');
        
        $.ajax({
            type: "POST",
            url: "ajax/ac.inac.ajax.php",
            data: {inactive: inactiveUID},
            success: function (data) {
                if (!data.error) {
                    $('.main').html(data);
                }
            }
        });
    });

    // Delete

    var dBtn = $('.delete');

    dBtn.on('click', function(e){
        e.preventDefault();
        var dbtnuid = $(this).attr('href');
        // alert(dbtnuid);
        $.ajax({
            type: "post",
            url: "ajax/ac.inac.ajax.php",
            data: {dbtnuid: dbtnuid},
            success: function (data) {
                if (!data.error) {
                    $('.main').html(data);
                }
            }
        });
    });

});



