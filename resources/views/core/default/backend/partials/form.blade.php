
<form onsubmit="preventDoubleSubmit(this)" {!! attr($options) !!} >

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    @printArray($fields, "<div class='field'>", "</div>")

</form>

<script>

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

</script>