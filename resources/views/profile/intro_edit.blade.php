<form action="{{ url("/profile/intro/edit") }}" id="intro_form" method="post">
    {!! csrf_field() !!}
    <textarea name="intro" rows="10" cols="107">{{ Auth::user()->partners->intro }}</textarea>
    <div style="cursor:pointer" id="intro_edit_button2" class="button002 signup002 margin-top-12">수정</div>
    <script>
        $("#intro_edit_button2").click(function () {

            $("#intro_form").submit();
        });
    </script>
</form>
