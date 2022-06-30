<?php
require $_SERVER["DOCUMENT_ROOT"] . "/testfile/project/login/loginsession.php";
?>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/testfile/css/menu.css" rel="stylesheet" type="text/css">
</head>
<div id="header" style="margin-top: 20px;">
	<div class="headTop">
		<div class="innerWrap">

			<?php if (!$login_session) { ?>

				<div class="btnsWrap">
					<a href="/easy/" class="btnsFav" title="간편접속"></a>
					<a href="/qna/" class="btnsCus" title="고객센터"></a>
					<a href="/recvNumber/" class="btnsCus5" title="발신번호 등록"></a>
				</div>

				<a href="/" class="logo" title="문자천국"></a>
				<div class="sitm">
					<!-- 로그인 전 :S -->
					<ul class="deftLst">
						<li class="tp">
							<a href="/testfile/project/login/login.php" class="txt">로그인</a>
						</li>
						<li class="tp">
							<span class="line"></span>
							<a href="/notice/alert_sms_info.php" class="txt">마이페이지</a>
						</li>
						<li class="tp">
							<span class="line"></span>
							<a href="/subscriber3/" class="txt">회원가입</a>
						</li>
						<li class="tp">
							<span class="line"></span>
							<a href="/subscriber3/find_id.php" class="txt">아이디 찾기</a>
						</li>
						<li class="tp">
							<span class="line"></span>
							<a href="/subscriber3/find_pass.php" class="txt">비밀번호 재설정</a>
						</li>
					</ul>
			<?php } else if ($login_session) { ?>
					<div class="btnsWrap">
						<a href="/easy/" class="btnsFav" title="간편접속"></a>
						<a href="/qna/" class="btnsCus" title="고객센터"></a>
						<a href="/recvNumber/" class="btnsCus5" title="발신번호 등록"></a>
						<a href="/recvNumber/" class="btnsCus2" title="발신번호 등록"></a>
						<a href="/recvNumber/" class="btnsCus3" title="발신번호 등록"></a>
					</div>
					<a href="/" class="logo" title="문자천국"></a>
					<div class="sitm">
						<div class="userInfo">
							<div class="intmg">
								<span class="msg">안녕하세요, <span class="ccb"><?php echo $_SESSION['id'] ?></span>님!</span>
								<a href="/notice/alert_sms_info.php" class="btns init txts"><span class="line"></span>마이페이지</a>
								<a href="/testfile/project/login/logout.php" class="btns init txts"><span class="line"></span>로그아웃</a>
							</div>
							<div class="intfil">
								<div class="inftLt">
									<div class="infli">
										<span class="lb">보유잔액</span>
										<div class="tt">
											<span class="vtt"><span id='vMoney'></span>999,999,999</span>원
										</div>
										<a href="javascript:buycouponLayer()" class="btns img mainBtns002">요금충전하기</a>
									</div>
									<div class="infli">
										<span class="lb">마일리지</span>
										<div class="tt">
											<span class="vtt"><span id='vMileage'></span>999,999,999</span>M
										</div>
										<a href="/event/mileage/new_mileage_giftcon.php" class="btns img mainBtns003">마일리지 교환</a>
									</div>
								</div>
								<div class="inftRt">
									<div class="infrt">
										<span class="btns block img mainBtns004">전송 가능건 수 조회</span>
									</div>
									<div class="infli">
										<div class="lb img mainBtns005">
											<select class="lbSel cstSelect">
												<option value='sms'>단문 문자</option>
												<option value='lms'>장문 문자</option>
												<option value='mms'>포토 문자</option>
												<option value='talk'>알림톡</option>
												<option value='auto'>실속 건수</option>
											</select>
										</div>
										<div class="tt">
											<span class="vtt"><span id='send_count_view'></span>99999</span>건
										</div>
										<a href="/send_s/" id='menuLink' class="btns img mainBtns006">전송</a>
									</div>
								</div>
							</div>
						</div>
					<!-- 로그인 후 :E -->
					<iframe name='chk_hit2' border='0' width='0' height='0' frameborder='0'></iframe>
				<?php } ?>
				</div>
		</div>
	</div>
	<div class="headCont">
		<div class="gnbArea">
			<div class="gnbbg"></div>
			<div class="innerWrap">
				<a href="/" class="gnbLogo" title="logo"></a>
				<!-- 대메뉴 영역:S -->
				<div class="gnb">
					<ul class="lst">
						<li class="tp tp1">
							<a href="/send_lms/" class="txt" title="장문 문자"></a>
							<ul class="depth2">
								<li class="tp">
									<a href="/send_lms/" class="txt">장문문자</a>
								</li>
								<li class="tp">
									<a href="/send_lmsg/" class="txt">장문대량<br>단체전송</a>
								</li>
								<li class="tp">
									<a href="/send_lmse/step1.php" class="txt">장문엑셀<br>대량전송</a>
								</li>
							</ul>
						</li>
						<li class="tp tp0">
							<a href="/send_s/" class="txt" title="단문 문자"></a>
							<ul class="depth2">
								<li class="tp">
									<a href="/send_s/" class="txt">단문문자</a>
								</li>
								<li class="tp">
									<a href="/send_g/" class="txt">대량<br>단체문자</a>
								</li>
								<li class="tp">
									<a href="/excel_send/step1.php" class="txt">엑셀 대량<br>전송</a>
								</li>
							</ul>
						</li>
						<li class="tp tp4">
							<a href="/mms_editor/" class="txt" title="포토문자"></a>
							<ul class="depth2">
								<li class="tp">
									<a href="/mms_editor/" class="txt">포토문자플러스<font color='#168cff'><b>+</b></font></a>
								</li>
								<li class="tp">
									<a href="/new_mms/" class="txt">포토문자</a>
								</li>
								<li class="tp">
									<a href="/mmsg/" class="txt">포토문자대량<br>단체전송</a>
								</li>
							</ul>
						</li>
						<li class="tp tp2">
							<a href="/send_ge/" class="txt" title="선거 문자"></a>
							<ul class="depth2">
								<li class="tp">
									<a href="/send_ge/" class="txt">선거문자<br>(자동동보)</a>
								</li>
								<!--li class="tp">
									<a href="/send_ge/index_manual.php" class="txt">선거문자20건<br>(수동분할)</a>
								</li-->
								<li class="tp">
									<a href="/el_mms/" class="txt">선거포토문자<br>(자동동보)</a>
								</li>
								<!--li class="tp">
									<a href="/el_mms/index_manual.php" class="txt">선거포토20건<br>(수동분할)</a>
								</li-->
								<li class="tp">
									<a href="/election/taxCertificate.php" class="txt">선거문자<br>세금계산서</a>
								</li>
							</ul>
						</li>
						<li class="tp tp3">
							<a href="/send_ad/" class="txt" title="광고문자"></a>
							<ul class="depth2">
								<li class="tp">
									<a href="/send_ad/" class="txt">광고문자</a>
								</li>
							</ul>
						</li>
						<li class="tp tp12">
							<a href="/talk/kakaoSend.php" class="txt" title="알림톡"></a>
							<ul class="depth2">
								<li class="tp">
									<a href="/talk/kakaoSend.php" class="txt">알림톡 발송하기</a>
								</li>
								<li class="tp">
									<a href="/talk/profile.php" class="txt">발신프로필 설정</a>
								</li>
								<li class="tp">
									<a href="/talk/templateCreate.php" class="txt">템플릿 등록/관리</a>
								</li>
								<li class="tp">
									<a href="/talk/" class="txt">알림톡소개</a>
								</li>
							</ul>
						</li>
						<li class="tp tp5">
							<a href="/result/lms_result.php" class="txt" title="예약전송관리"></a>
							<ul class="depth2">
								<li class="tp">
									<a href="/result/lms_result.php" class="txt">장문문자 </a>
								</li>
								<li class="tp">
									<a href="/result/sms_result.php" class="txt">단문문자</a>
								</li>
								<li class="tp">
									<a href="/result/election_sms_result.php" class="txt">선거문자</a>
								</li>
								<li class="tp">
									<a href="/result/ad_sms_result.php" class="txt">광고문자 </a>
								</li>
								<li class="tp">
									<a href="/result/mms_result.php" class="txt">포토문자 </a>
								</li>
								<li class="tp">
									<a href="/result/api_sms_result.php" class="txt">웹연동</a>
								</li>
								<li class="tp">
									<a href="/result/fax_result.php" class="txt">팩스</a>
								</li>
								<li class="tp">
									<a href="/result/fail_result.php" class="txt">전송실패<br>환불내역</a>
								</li>
							</ul>
						</li>
						<li class="tp tp6">
							<a href="/address/grp_manage_form.php" class="txt" title="주소록"></a>
							<ul class="depth2">
								<li class="tp">
									<a href="/address/grp_manage_form.php" class="txt">주소록관리</a>
								</li>
								<li class="tp">
									<a href="/address/group_add_form.php" class="txt">주소록<br>직접입력 </a>
								</li>
								<li class="tp">
									<a href="/excel_addr/step1.php" class="txt">엑셀파일<br>등록  </a>
								</li>
								<li class="tp">
									<a href="/file/addr_copy_step1.php?type=excel" class="txt">엑셀파일<br>붙여넣기 </a>
								</li>
								<li class="tp">
									<a href="/file/addr_copy_step1.php?type=text" class="txt">텍스트파일<br>붙여넣기</a>
								</li>
								<li class="tp">
									<a href="/address/addr_env_form.php" class="txt">주소록 환경설정</a>
								</li>
							</ul>
						</li>
						<li class="tp tp7">
							<a href="/autoPay/autoPay.php" class="txt" title="부가서비스"></a>
							<ul class="depth2">
								<li class="tp">
									<a href="/biz/" class="txt">기업 DB연동</a>
								</li>
								<li class="tp">
									<a href="/apiSend/" class="txt">기업 웹연동</a>
								</li>
								<li class="tp">
									<a href="/autoPay/autoPay.php" class="txt">실속요금제 </a>
								</li>
								<li class="tp">
									<a href="/send_fax/" class="txt">팩스보내기 </a>
								</li>
								<li class="tp">
									<a href="/event/mileage/new_mileage_giftcon.php" class="txt">마일리지<br>선물신청</a>
								</li>
								<li class="tp">
									<a href="/send_event/" class="txt">무료문자</a>
								</li>
								<li class="tp">
									<a href="/ansim/" class="txt">안심번호</a>
								</li>
							</ul>
						</li>
						<li class="tp2 tp9">
							<a href="javascript:buycouponLayer()" class="txt2" title="충전"></a>
							<ul class="depth2">
							</ul>
						</li>
					</ul>
				</div>
				<!-- 대메뉴 영역:E -->
			</div>
		</div>
	</div>
</div>
</html>
