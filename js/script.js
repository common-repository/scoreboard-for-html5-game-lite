(function($) {
    "use strict";
    
    jQuery(document).ready(function($){
        $('#datatable').on('change', function() {
            window.location.href = this.value;
        });
    
        $("#sfhg_score_form").validate({
            rules: {
                 name: {
                     required: true,
                     minlength: 3
                 },
                 email: {
                     required: true,
                     minlength: 3
                 },
                 score: {
                     required: true,
                     number: true
                 },
             }
         });
    
         $("#sfhg_filter_form").validate({
            rules: {
                   score_min: {
                    required: true,
                    number: true
                },
                score_max: {
                    required: true,
                    number: true
                },
                email: {
                    required: true,
                    minlength: 3
                }
            }
        });
    
        $("#sfhg_game_form").validate({
            rules: {
                 tablename: {
                     required: true,
                     minlength: 3,
                     nowhitespace: true,
                     lettersonly: true
                 }
             },
             messages: {
                 tablename: {
                     lettersonly: "Must enter letters only"
                 }
             }
         });
    
        $(".sfhg-container .postbox-header").on( "click", function() {
            if ($(this).parent().find('.inside').is(":hidden")) {
              $(this).parent().toggleClass("closed").find('.inside').show()
            } else {
              $(this).parent().find('.inside').hide()
            }
        })
    });
})(jQuery); 