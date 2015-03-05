

$(document).ready( function () {

    $('span.use_default').each(function(){

        $(this).bind('click', function () {

            var parent = $(this).find('input').attr('data-parent');

            if($(this).find('input').is(':checked')){

                $('#' + parent).attr('disabled', true);

            } else {

                $('#' + parent).removeAttr('disabled');

            }

        });
    });

});