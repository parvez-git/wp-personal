
jQuery(document).ready(function($){

  $('.bxslider').bxSlider({
    mode: 'vertical',
    options: 'vertical',
    pager: false,
    nextSelector: '#slidermain-next',
    prevSelector: '#slidermain-prev',
    nextText: '<i class="fa fa-long-arrow-right"></i>',
    prevText: '<i class="fa fa-long-arrow-left"></i>'
  });

  $('.related-post-slider').bxSlider({
    slideWidth: 260,
    minSlides: 2,
    maxSlides: 3,
    slideMargin: 15,
    pager: false,

    nextSelector: '#slider-next',
    prevSelector: '#slider-prev',
    nextText: '<i class="fa fa-long-arrow-right"></i>',
    prevText: '<i class="fa fa-long-arrow-left"></i>'
  });


    $('#wppersonalSubmitMessage').on('submit', function(e){

        e.preventDefault();

        var form = $(this),
            name = form.find('#name').val(),
            email = form.find('#email').val(),
            website = form.find('#website').val(),
            message = form.find('#message').val(),
            ajaxurl = form.data('url');

        if( name === '' ){
            $('#name').parent('.col-md-6').addClass('has-error');
            return;
        }

        if( email === '' ){
            $('#email').parent('.col-md-6').addClass('has-error');
            return;
        }

        if( message === '' ){
            $('#message').parent('.col-md-6').addClass('has-error');
            return;
        }
        form.find('input, button, textarea').attr('disabled','disabled');
        $('.js-form-submission').addClass('js-show-feedback');

        $.ajax({
            
            url : ajaxurl,
            type : 'POST',
            data : {
                
                name : name,
                email : email,
                website : website,
                message : message,
                action: 'wppersonal_save_user_contact_form'
                
            },
            error : function( response ){
                $('.js-form-submission').removeClass('js-show-feedback');
                $('.js-form-error').addClass('js-show-feedback');
                form.find('input, button, textarea').removeAttr('disabled');
            },
            success : function( response ){
                if( response == 0 ){

                    setTimeout(function(){
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-error').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled');
                    },1500);

                } else {
                    setTimeout(function(){
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-success').addClass('js-show-feedback');
                        // form.find('input, button, textarea').removeAttr('disabled').val('');
                        form.find('#name, #email, #website, textarea').removeAttr('disabled').val('');
                    },1500);
                }
            }
            
        });

    });


});


// Sidebar Menu 

jQuery(document).on('click','.js-toggleSidebar', function(e){
    e.preventDefault();

    jQuery('.wppersonal-sidebar').toggleClass('sidebar-closed');
    jQuery('body').toggleClass('no-scroll');
    jQuery('.sidebar-overlay').fadeToggle( 320 );

});



