
jQuery(document).ready(function($) {
    $('#save_student_progress').click(function(e) {
        e.preventDefault();
        $('#modules_form').append('<input type="hidden" id="save_student_progress_indication" name="save_student_progress_indication" />');
        $('#modules_form').submit();
    });
});



function check_for_mandatory_answers() {

    // Skip checking if moving backwards
    if( jQuery("#dont_save_student_progress_indication" ).length > 0 ) {
        return true;
    }

    if (jQuery("#save_student_progress_indication").length == 0) {

        var mandatory_errors = 0;

        /* Input Text Element validation */
        jQuery('input[type=text]').each(function() {
            if (jQuery(this).attr("data-mandatory") == 'yes') {

                var element_val = jQuery(this).val();

                if (element_val.trim() == '') {
                    mandatory_errors++;
                }
            }
        });

        /* Input Textarea Element validation */
        jQuery('textarea').each(function() {
            if (jQuery(this).attr("data-mandatory") == 'yes') {

                var element_val = jQuery(this).val();

                if (element_val.trim() == '') {
                    mandatory_errors++;
                }
            }
        });

        /* Input File Element validation */
        jQuery('input[type=file]').each(function() {
            if (jQuery(this).attr("data-mandatory") == 'yes') {

                var element_val = jQuery(this).val();

                if (element_val.trim() == '') {
                    mandatory_errors++;
                }
            }
        });

        /* Checkbox Input Element validation*/
        jQuery('.checkbox_answer_group').each(function() {
            if (jQuery(this).attr("data-mandatory") == 'yes') {
                if (jQuery('input[type=checkbox]:checked').length == 0) {
                    mandatory_errors++;
                }
            }
        });

        /* Radio Button Input Element validation*/
        jQuery('.radio_answer_group').each(function() {
            if (jQuery(this).attr("data-mandatory") == 'yes') {
                if (jQuery('input[type=radio]:checked').length == 0) {
                    mandatory_errors++;
                }
            }
        });

        if (mandatory_errors == 0) {
            return true;
        } else {
            jQuery('.mandatory_message').show("slow");
            return false;
        }

    } else {
        return true;
    }
}

function change_stop_page( e ) {

    var $ = jQuery;
    var target = e.currentTarget;

    var action = jQuery("#modules_form").attr("action");
    var active_page = jQuery('#navigation-pagination .active a').html();
    var last_page = jQuery('#navigation-pagination li:last-child a').html();


    var button = parseInt( $( target ).html() );

    jQuery("#modules_form").attr("action", action + 'page/' + parseInt( button ) + '/');

    if( button < active_page ) {
        // Don't submit normally
        $('#modules_form').append('<input type="hidden" id="dont_save_student_progress_indication" name="dont_save_student_progress_indication" />');
        $("#modules_form" ).submit();
    } else {
        // Submit normally!
        $('.submit-elements-data-button' ).click();
    }

}

jQuery(document).ready(function() {
    jQuery('.save_elements_message_ok').delay(2000).fadeOut('slow');

    /* Submit data on pagination */
    jQuery('.module-pagination a').click(function(e) {
        e.preventDefault();

        jQuery('#go_to_page').val(jQuery(this).html());

        change_stop_page( e );

    });

    jQuery('.submit-elements-data-button').click(function(e) {
        //e.preventDefault();

        var next_page = 0;
        var action = jQuery("#modules_form").attr("action");
        var direct_url = '';

        jQuery("#modules_form").remove('.event_origin');

        var active_page = jQuery('#navigation-pagination .active a').html();
        var last_page = jQuery('#navigation-pagination li:last-child a').html();


        if (e.originalEvent) {//clicked button directly, not pagination

            jQuery("#modules_form").append('<input type="hidden" name="event_origin" value="button" />');


            if (active_page != last_page) {
                next_page = parseInt(active_page) + 1;
            } else {
                direct_url = front_vars.stops_archive_url;
                next_page = parseInt(last_page);// done button + 1;
            }
        } else {
            jQuery("#modules_form").append('<input type="hidden" name="event_origin" value="pagination" />');
            next_page = jQuery('#go_to_page').val();
        }

        //if (!isNaN(active_page)) {}
        if (direct_url != '') {
            //jQuery("#modules_form").attr("action", direct_url);
            jQuery("#modules_form").attr("action", action);
        } else {
            jQuery("#modules_form").attr("action", action + 'page/' + parseInt(next_page) + '/');
        }

        //return false;
    });

    // Use data-link attribute to follow links
    jQuery('button').click(function(event) {
        if (jQuery(this).data('link')) {
			event.preventDefault();
            window.location.href = jQuery(this).data('link');
        }
    });


});