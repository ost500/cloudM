<?php
$sub_menu = "400100";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'w');

$id = $_GET['id'];


if ($w == '')
{
    $required_mb_id = 'required';
    $required_mb_id_class = 'required alnum_';
    $required_mb_password = 'required';
    $sound_only = '<strong class="sound_only">필수</strong>';

    $project['mb_mailling'] = 1;
    $project['mb_open'] = 1;
    $project['mb_level'] = $config['cf_register_level'];
    $html_title = '추가';
}
else if ($w == 'u')
{
    $sql = "select *, a.id as p_id, b.id as c_id
			from {$g5['project_table']} as a, {$g5['contract_table']} as b
			where a.id = '$id' and
				a.id = b.p_id";
    $project = sql_fetch($sql);


	$sql = "select count(*) as cnt
			from {$g5['area_table']}
			where p_id = '$id'";
	$row = sql_fetch($sql);
	$areas_total = $row[cnt];

	$sql = "select *
			from {$g5['area_table']}
			where p_id = '$id'
			order by id asc";
	$area_result = sql_query($sql);
}
else
    alert('제대로 된 값이 넘어오지 않았습니다.');


$area_index = 0;


$g5['title'] .= '프로젝트 관리';
include_once('./admin.head.php');

include_once('../plugin/jquery-ui/datepicker.php');

// add_javascript('js 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_javascript(G5_POSTCODE_JS, 0);    //다음 주소 js
?>

<form name="fproject" id="fproject" action="./project_form_update.php" onsubmit="return fproject_submit(this);" method="post" enctype="multipart/form-data">
<input type="hidden" name="w" value="<?php echo $w ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" name="token" value="">
<input type="hidden" name="id" value="<?php echo $id ?>">

<div class="tbl_frm01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?></caption>
    <colgroup>
        <col class="grid_4">
        <col>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>

	<tr>
		<td width="50%" colspan="2">
			<p style="font-size: 18px; font-weight: bold;">업체관리</p>
			<table width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<th scope="row"><label for="title">프로젝트명<?php echo $sound_only ?></label></th>
					<td><input type="text" name="title" value="<?php echo $project['title'] ?>" id="project_name" class="frm_input" style="width:90%;">
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="name">담당자<?php echo $sound_only ?></label></th>
					<td>
						<input type="text" name="charger_name" value="<?php echo $project['charger_name'] ?>" id="name" required class="frm_input required" style="width:90%;" minlength="3" maxlength="20">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="phone">연락처<?php echo $sound_only ?></label></th>
					<td><input type="text" name="charger_phone" value="<?php echo $project['charger_phone'] ?>" id="phone" required class="frm_input required" style="width:90%;" maxlength="20"></td>
				</tr>

				<tr>
					<th scope="row"><label for="company_type">회사형태<strong class="sound_only">필수</strong></label></th>
					<td>
						<select name="company_type" id="company_type" required class="required frm_input">
							<option value="">선택</option>
							<option value="개인" selected="">개인</option>
							<option value="팀">팀</option>
							<option value="개인 사업자">개인 사업자</option>
							<option value="법인 사업자">법인 사업자</option>
							<option value="기타">기타</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="mb_signature">광고주소개</label></th>
					<td><textarea  name="mb_signature" id="mb_signature"><?php echo $project['mb_signature'] ?></textarea></td>
				</tr>
			</table>
		</td>
		<td width="50%" width="50%" colspan="2" valign="top">
			<p style="font-size: 18px; font-weight: bold;">계약관리</p>
			<table width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<th scope="row"><label for="title">계약일<?php echo $sound_only ?></label></th>
					<td><input type="text" name="contract_date" value="<?php echo $project['contract_date'] ?>" id="contract_date" class="frm_input" style="width:20%;">
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="name">계약금액<?php echo $sound_only ?></label></th>
					<td>
						<input type="text" name="contract_pay" value="<?php echo $project['contract_pay'] ?>" id="contract_pay" class="frm_input" style="width:20%;" minlength="3" maxlength="20">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="phone">결제여부<?php echo $sound_only ?></label></th>
					<td>
						<select name="charge_check" id="charge_check" class="frm_input">
							<option value="">선택</option>
							<option value="1">결제</option>
							<option value="0">결제전</option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="phone">결제일<?php echo $sound_only ?></label></th>
					<td><input type="text" name="charge_date" value="<?php echo $project['charge_date'] ?>" id="charge_date" class="frm_input" style="width:20%;" maxlength="20"></td>
				</tr>

				<tr>
					<th scope="row"><label for="phone">입금형태<?php echo $sound_only ?></label></th>
					<td>
						<select name="charge_type" id="charge_type" class="frm_input">
							<option value="">선택</option>
							<option value="선불">선불</option>
							<option value="후불">후불</option>
							<option value="분납">분납</option>
						</select>
				</tr>

				<tr>
					<th scope="row"><label for="phone">지급형태<?php echo $sound_only ?></label></th>
					<td>
						<select name="type_pay" id="type_pay" class="frm_input">
							<option value="">선택</option>
							<option value="선불">선불</option>
							<option value="프로젝트 종료 후 지급">프로젝트 종료 후 지급</option>
							<option value="2분할 지급">2분할 지급</option>
							<option value="3분할 지급">3분할 지급</option>
						</select>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="phone">프로젝트 기간<?php echo $sound_only ?></label></th>
					<td><input type="text" name="start_work_date" value="<?php echo $project['start_work_date'] ?>" id="start_work_date" class="frm_input" style="width:20%;" maxlength="20"> ~ <input type="text" name="finish_work_date" value="<?php echo $project['finish_work_date'] ?>" id="finish_work_date" class="frm_input" style="width:20%;" maxlength="20"></td>
				</tr>

				<tr>
					<th scope="row"><label for="phone">종료일<?php echo $sound_only ?></label></th>
					<td><input type="text" name="finish_work_date" value="<?php echo $project['finish_work_date'] ?>" id="finish_work_date" class="frm_input" style="width:20%;" maxlength="20"></td>
				</tr>
			</table>
		</td>
	</tr>


    <tr>
        <th scope="row"><label for="area">매체<strong class="sound_only">필수</strong></label></th>
        <td colspan="3">
			<div class="bts">
				<div class="container-fluid pull-left">
					<div class="row">
						<div class="col-xs-12" id="demoContainer" style="height: auto; padding-left:0;">
<?php
	for ($i = 0; $areas = sql_fetch_array($area_result); $i++)
	{
		include("./project_form_area.skin.php");

		if ($areas_total > ($i+1)) $area_index++;
	}

	if ($i == 0) include("./project_form_area.skin.php");
?>
							<!-- The template for adding new field -->
							<div class="form-group hide" id="areaTemplate">
								<div class="col-xs-2" style="padding-left:0px;">
									<select id="optgroups" name="area" class="frm_input">
										<option value="">매체 선택</option>
										<optgroup label="매체 광고">
											<option value="네이버CPC">네이버CPC</option>
											<option value="언론보도">언론보도</option>
											<option value="구글광고">구글광고</option>
											<option value="페이스북광고">페이스북광고</option>
											<option value="매체 기타">매체 기타</option>
										</optgroup>
										<optgroup label="바이럴">
											<option value="네이버SEO">네이버SEO</option>
											<option value="컨텐츠배포">컨텐츠배포</option>
											<option value="체험단모집">체험단모집</option>
											<option value="바이럴 기타">바이럴 기타</option>
										</optgroup>
										<optgroup label="운영대행">
											<option value="블로그">블로그</option>
											<option value="페이스북페이지">페이스북페이지</option>
											<option value="기타SNS">기타SNS</option>
											<option value="홈페이지">홈페이지</option>
											<option value="운영대행 기타">운영대행 기타</option>
										</optgroup>
										<optgroup label="1회성 프로젝트">
											<option value="개발">개발</option>
											<option value="디자인">디자인</option>
											<option value="웹툰">웹툰</option>
											<option value="영상">영상</option>
											<option value="1회성 프로젝트 기타">1회성 프로젝트 기타</option>
										</optgroup>
									</select>
								</div>
								<div class="col-xs-2" style="padding-left:10px;">
									<input type="text" class="frm_input" name="price" placeholder="견적" />
								</div>
								<div class="col-xs-2" style="padding-left:10px;">
									<input type="text" class="frm_input" name="commission" placeholder="수수료" />
								</div>
								<div class="col-xs-5" style="padding-left:10px;">
									<input type="text" class="frm_input" name="memo" size="60" placeholder="한줄메모" />
								</div>
								<div class="col-xs-1" style="padding-left:10px;">
									<button type="button" id="addButton" class="btn-xs btn-default removeButton"><i class="fa fa-minus"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</td>
	</tr>

	<tr>
        <th scope="row"><label for="category">업종</label></th>
        <td colspan="3">
		<select name="category" id="category" required class="required frm_input">
			<option value="">선택</option>
			<option value="의료">의료</option>
			<option value="법률">법률</option>
			<option value="스타트업">스타트업</option>
			<option value="프랜차이즈">프랜차이즈</option>
			<option value="교육/대학교">교육/대학교</option>
			<option value="쇼핑몰">쇼핑몰</option>
			<option value="기타">기타</option>

		</select>
		</td>
    </tr>
	<tr>
        <th scope="row"><label for="purpose">마케팅 진행목적</label></th>
        <td colspan="3">
		<select name="purpose" id="purpose" required class="required frm_input">
			<option value="">선택</option>
			<option value="단기 매출증대">단기 매출증대</option>
			<option value="웹사이트 유입증가">웹사이트 유입증가</option>
			<option value="상담 DB확보">상담 DB확보</option>
			<option value="이벤트 참여">이벤트 참여</option>
			<option value="상품인지">상품인지</option>
			<option value="장기 브랜딩">장기 브랜딩</option>
			<option value="기타">기타</option>
		</select>
		</td>
    </tr>
    <tr>
        <th scope="row"><label for="estimated_duration">마케팅 진행 기간 (개월/년)</label></th>
        <td><input type="text" name="estimated_duration" value="<?php echo $project['estimated_duration'] ?>" id="estimated_duration" class="frm_input" size="60" maxlength="20"></td>
        <th scope="row"><label for="budget">총 예산(혹은 월 예산) (원) </label></th>
        <td><input type="text" name="budget" value="<?php echo $project['budget'] ?>" id="budget" class="frm_input" size="60" maxlength="20"></td>
    </tr>
    <tr>
        <th scope="row"><label for="detail_content">프로젝트내용</label></th>
        <td colspan="3"><textarea  name="detail_content" id="detail_content" style="height:300px;"><?php echo $project['detail_content'] ?></textarea></td>
    </tr>
	<tr>
        <th scope="row"><label for="deadline">모집 마감일자</label></th>
        <td><input type="text" name="deadline" value="<?php echo $project['deadline'] ?>" id="deadline" required class="required frm_input" size="60" maxlength="20"></td>
        <th scope="row"><label for="expected_start_date">프로젝트 예상 시작일  </label></th>
        <td><input type="text" name="expected_start_date" value="<?php echo $project['expected_start_date'] ?>" id="expected_start_date" required class="required frm_input" size="60" maxlength="20"></td>
    </tr>

	<tr>
        <th scope="row"><label for="meeting_way">사전미팅 </label></th>
        <td>
		<select name="meeting_way" id="meeting_way" required class="required frm_input">
			<option value="">선택</option>
			<option value="오프라인 미팅">오프라인 미팅</option>
			<option value="온라인 미팅">온라인 미팅 (카카오톡, skype, 행아웃 등)</option>
			<option value="온/오프라인 미팅">오프라인 미팅</option>
		</select>
		</td>
        <th scope="row"><label for="address_sido">사전 미팅 지역</label></th>
        <td>
		<select name="address_sido" id="address_sido" class="frm_input">
			<option value="">선택</option>
			<option value="서울특별시">서울특별시</option>
			<option value="부산광역시">부산광역시</option>
			<option value="대구광역시">대구광역시</option>
			<option value="인천광역시">인천광역시</option>
			<option value="광주광역시">광주광역시</option>
			<option value="대전광역시">대전광역시</option>
			<option value="울산광역시">울산광역시</option>
			<option value="세종특별자치시">세종특별자치시</option>
			<option value="경기도">경기도</option>
			<option value="강원도">강원도</option>
			<option value="충청북도">충청북도</option>
			<option value="충청남도">충청남도</option>
			<option value="전라북도">전라북도</option>
			<option value="전라남도">전라남도</option>
			<option value="경상북도">경상북도</option>
			<option value="경상남도">경상남도</option>
			<option value="제주특별자치도">제주특별자치도</option>
		</select>
		</td>
    </tr>

	<tr>
        <th scope="row"><label for="managing_experience">마케팅 진행 경험여부 </label></th>
        <td>
		<select name="managing_experience" id="managing_experience" required class="required frm_input">
			<option value="">선택</option>
			<option value="있음">있습니다</option>
			<option value="없음">없습니다</option>
		</select>
		</td>
        <th scope="row"><label for="reason">프로젝트 등록 사유</label></th>
        <td>
		<select name="reason" id="reason"required class="required frm_input">
			<option value="">선택</option>
			<option value="견적문의">견적문의</option>
			<option value="시장조사">시장조사</option>
			<option value="실제진행">실제진행</option>
		</select>
		</td>
    </tr>

    </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey='s'>
    <a href="./project_list.php?<?php echo $qstr ?>">목록</a>
</div>
</form>

<script type="text/javascript">
$(function(){
    $("#deadline", "#contract_date", "#charge_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+365d" });
	$("#start_work_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+365d" });
	$("#finish_work_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+365d" });
	$("#expected_start_date").datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd", showButtonPanel: true, yearRange: "c-99:c+99", maxDate: "+365d" });
});
</script>

<script type="text/javascript">
$(function(){
    $("#area").val("<?=$project[area]?>");
	$("#category").val("<?=$project[category]?>");
	$("#purpose").val("<?=$project[purpose]?>");
	$("#meeting_way").val("<?=$project[meeting_way]?>");
	$("#address_sido").val("<?=$project[address_sido]?>");
	$("#managing_experience").val("<?=$project[managing_experience]?>");
	$("#reason").val("<?=$project[reason]?>");
	$("#charge_type").val("<?=$project[charge_type]?>");
	$("#charge_check").val("<?=$project[charge_check]?>");
	$("#type_pay").val("<?=$project[type_pay]?>");
});
</script>

<script>
function fproject_submit(f)
{
    if (!f.mb_icon.value.match(/\.gif$/i) && f.mb_icon.value) {
        alert('아이콘은 gif 파일만 가능합니다.');
        return false;
    }

    return true;
}
</script>


<script>
	$(document).ready(function() {
		var areaIndex = <?=$area_index?>;

		$('#fproject')
			// Add button click handler
			.on('click', '.addButton', function() {
				areaIndex++;

				var $template = $('#areaTemplate'),
					$clone    = $template
						.clone()
						.removeClass('hide')
						.removeAttr('id')
						.attr('data-area-index', areaIndex)
						.insertBefore($template);

				// Update the name attributes
				$clone
					.find('[name="area"]').attr('name', 'areas[' + areaIndex + '][0]').end()
					.find('[name="price"]').attr('name', 'areas[' + areaIndex + '][1]').end()
					.find('[name="commission"]').attr('name', 'areas[' + areaIndex + '][2]').end();
			})

			// Remove button click handler
			.on('click', '.removeButton', function() {
				var $row  = $(this).parents('.form-group'),
					index = $row.attr('data-area-index');

				if (index < areaIndex) {
					alert('하위 필드부터 삭제하세요.');
					return;
				}

				// Remove element containing the fields
				$row.remove();

				areaIndex--;
			});
	});
</script>

<script src="/js/multiple-select.js"></script>

<script>
	// for all
	$(".multiselect").multipleSelect({
		width:'50%'
	});
</script>

<?php
include_once('./admin.tail.php');
?>