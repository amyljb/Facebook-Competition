/*
 ==========================================================================
 === Theme: Default Responsive Theme
 === By: Ebow
 === Website: http://ebow.ie
 === Version: 1.0
 === For: Main Javascript File
 ========================================================================== 
 */

// On Ready
$(document).ready(function () {
    
    // See more button
    $('.see_more').click(function(){
        var button = $(this);
        if ( button.hasClass('active') ) {
            button.toggleClass('active');
            button.text('See more');
            $('footer .footer_bottom ol').toggleClass('active');
        } else {
            button.toggleClass('active');
            button.text('See less');
            $('footer .footer_bottom ol').toggleClass('active'); 
        }
    });
    
    // Scroll to Rules
    $("label.css-label a").click(function(e) {
        e.preventDefault;
        $('html, body').animate({
            scrollTop: $("#rules").offset().top
        }, 500);
    });
    
    // Form validation
    $("#competition").validate({
        rules: {
            fname: "required",
            lname: "required",
            country : "required",
            question : "required",
            email: {
                required: true,
                email: true
            },
            terms: "required"
        },
        messages: {
            fname: "Please enter your first name.",
            lname: "Please enter your last name.",
            email: "Please enter a valid email address.",
            country: "Please select your country.",
            question: "Please answer the question.",
            terms: "Please accept the competition rules."
        },
        errorPlacement: function(error, element) {
            if ( element.attr('id') == 'terms' ) {
                error.insertAfter(element.next('.css-checkboxlabel'));
                $('.terms_holder').addClass('with_error');
            } else if ( element.hasClass('custom_radio') ) {
                $('.radio_holder .radio_errors').append(error);
            } else if ( element.hasClass('select_country') ) {
                $('.select_outer').append(error);
                $('.select_outer .select_wrapper').addClass('with_error');
            } else {
                error.insertAfter(element);
            }
        }
    });

});

// On Load
(function ($) {
    $(window).load(function () {

    });
})(jQuery);