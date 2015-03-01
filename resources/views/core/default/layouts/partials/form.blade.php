
<form onsubmit="submit.disabled=true;return true;" {!! attr($options) !!} >

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    @printArray($fields, "<div class='field'>", "</div>")

</form>