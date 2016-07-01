다음 주소를 클릭해서 비밀번호를 변경하세요 <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
