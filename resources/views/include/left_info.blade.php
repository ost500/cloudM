@if($loginUser->PorC == "P")
    <h5 class="side-tittle">대행사</h5>
@else
    <h5 class="side-tittle">광고주</h5>
@endif
<div>
    <div class="col-md-3">
        @if($loginUser->profileImage == null)
            <img class="partner_profile02" src="{{url('/files/userImage/default')}}">
        @else
            <img class="partner_profile02" src="{{ URL::asset($loginUser->profileImage) }}">
        @endif

    </div>
    <div class="col-md-9">
        <p class="side-title-name">{{ $loginUser->nick }}</p>
        <a href="/setting">
            <div id="tag02">
                <div class="button">기본정보수정</div>
            </div>
        </a>
    </div>
</div>