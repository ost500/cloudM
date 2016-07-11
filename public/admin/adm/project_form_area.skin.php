<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-06-15
 * Time: AM 11:48
 */
?>
<div class="form-group" data-area-index="<?=$i?>">
    <div class="col-xs-2" style="padding-left:0px;">
        <select id="optgroups<?=$i?>" name="areas[<?=$i?>][0]" class="frm_input">
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
                <option value="컨텐츠 배포">컨텐츠 배포</option>
                <option value="체험단 모집">체험단 모집</option>
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
        <script> $(function() { $("#optgroups<?=$i?>").val("<?=$areas[area]?>"); }); </script>
    </div>

    <div class="col-xs-2" style="padding-left:10px;">
        <input type="text" class="frm_input" name="areas[<?=$i?>][1]" value="<?php echo $areas['price']?>" placeholder="견적"/>
    </div>
    <div class="col-xs-2" style="padding-left:10px;">
        <input type="text" class="frm_input" name="areas[<?=$i?>][2]" value="<?php echo $areas['commission']?>" placeholder="수수료"/>
    </div>
    <div class="col-xs-5" style="padding-left:10px;">
        <input type="text" class="frm_input" name="areas[<?=$i?>][3]" value="<?php echo $areas['memo']?>" size="60" placeholder="한줄메모"/>
    </div>
    <div class="col-xs-1" style="padding-left:10px;">
        <button type="button" class="btn-xs btn-azure <?=($i==0)?"addButton":"removeButton";?>"><i class="fa fa-<?=($i==0)?"plus":"minus";?>"></i>
        </button>
    </div>
</div>