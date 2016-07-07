@if($loginUser->PorC == "P")
    <h5 class="side-tittle">파트너스</h5>
@else
    <h5 class="side-tittle">클라이언트</h5>
@endif
<div>
    <div class="col-md-3">
        <img class="partner_profile02" src="{{ URL::asset($loginUser->profileImage) }}">
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