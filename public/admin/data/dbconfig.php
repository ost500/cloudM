<?php
include_once($_SERVER['DOCUMENT_ROOT']."/../admin_dbconfig.php");

$g5['admin_table'] = 'g5_member'; // 관리자 테이블
$g5['partner_table'] = 'partners'; // 파트너 테이블
$g5['client_table'] = 'clients'; // 클라이언트 테이블
$g5['project_table'] = 'projects'; // 프로젝트 테이블
$g5['application_table'] = 'applications'; // 지원 목록 테이블
$g5['contract_table'] = 'contracts'; // 지원자 선정 테이블
$g5['file_table'] = 'projects_proposals'; // 제안서/견적서 테이블
$g5['area_table'] = 'projects_areas'; // 분야 테이블
$g5['portfolio_table'] = 'portfolios'; // 포트폴리오 테이블
$g5['faq_table'] = 'faqs'; // 자주하시는 질문 테이블
$g5['faq_master_table'] = 'faq_masters'; // 자주하시는 질문 마스터 테이블
?>