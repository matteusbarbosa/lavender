
<form onsubmit="preventDoubleSubmit(this)" {!! attr($options) !!} >

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    @printArray($fields, "<div class='field'>", "</div>")

</form>