<?php

include  $_SERVER['DOCUMENT_ROOT']. "/test/loginsession.php";
include  $_SERVER['DOCUMENT_ROOT']. "/test/dbconnMS.php";
include  $_SERVER['DOCUMENT_ROOT']. "/header/header.php";



// 현재 페이지 번호 받아오기
if(isset($_GET["page"])){
	$page = $_GET["page"]; // 하단에서 다른 페이지 클릭하면 해당 페이지 값 가져와서 보여줌
}
else {
	$page = 1; // 게시판 처음 들어가면 1페이지로 시작
}


?>
<html>
<body>
<head>
<meta charset="euckr">
<meta http-equiv="Content-Type" content="text/html; charset=euckr"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- 예약 버튼 활성화/비할성화-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
$(document).ready(function() {
$("input:radio[name=send]").click(function(){
if($("input:radio[name=send]:checked").val()=='1'){
$("#year").attr("disabled",false);
$("#year").removeClass("readonly");
$("#month").attr("disabled",false);
$("#month").removeClass("readonly");
$("#day").attr("disabled",false);
$("#day").removeClass("readonly");
$("#hour").attr("disabled",false);
$("#hour").removeClass("readonly");
$("#minute").attr("disabled",false);
$("#minute").removeClass("readonly");

console.log(year);

} else if($("input:radio[name=send]:checked").val()=='2') {
$("#year").attr("disabled",true);
$("#year").addClass("readonly");
$("#month").attr("disabled",true);
$("#month").addClass("readonly");
$("#day").attr("disabled",true);
$("#day").addClass("readonly");
$("#hour").attr("disabled",true);
$("#hour").addClass("readonly");
$("#minute").attr("disabled",true);
$("#minute").addClass("readonly");
}
});
});

</script>

<!--메세지 byte제한-->
<script type="text/javascript">
function textbyte(obj, maxByte){
	var str = obj.value;       //실시간으로 입력한 text값
	var str_len = str.length;  //위 변수에서 입력한 값 길이 확인하기 위해

	var rbyte = 0;			//입력한 text 값
	var rlen = 0;           //90 or 2000 값 제한 걸어놓기 위해 설정
	var one_char = "";
	var str2 = "";

	//문자 byte 계산
	for(var i=0; i<str_len; i++){
		one_char = str.charAt(i);								/*str.charAt(0) str가리키고 잇는 문자열에서 0번째 문자를 char타입으로 변환 String으로 저장된 문자열 중에서 한 글자만 선택해서 char타입으로 변환
		[사용자가 입력을 한글자만 하는 경우는 거의 없기때문에 문자열로 입력을 받아준다]*/
		if(escape(one_char).length > 4){
			//one_char 변환한 문자를 escape(유니코드로 변환해줘서 문자를 판단하게 해줌)  1byte=%XX / 2byte=%uXXXX  변환한 문자가 >4 크면 2byte 한글로 판단
			rbyte += 2;
			console.log(rbyte);                                 //출력해보면 입력한 문자 가장 마지막이 찍힌다 ex)이한솔 = 솔
		}
		else{
			rbyte++;                                            //영문 등 나머지 1Byte
		}

		if(rbyte <= maxByte){
			//maxbyte보다 rbyte가 높으면 rlen변수에 저장 하고 문자열 자르는데 이용
			rlen = i+1;

		}
	}
	//for

	//문자열 자르기
	if(rbyte > maxByte){
		alert("한글 "+(maxByte/2)+"자 / 영문 "+maxByte+"자를 초과 입력할 수 없습니다.");
		str2 = str.substr(0,rlen);               //substr (추출대상문자열 , 추출할 문자 개수)
		obj.value = str2;                        //자르고 남은 문자열(실질적으로 입력완료된 문자열)
		console.log(str2);
		textbyte(obj, maxByte);                  //textbyte함수에 파라미터 넣어준다

	}
	else{
		document.getElementById('byteInfo').innerText = rbyte;          //getElementById 메서드는 주어진 문자열과 일치하는 id 속성을 가진 요소를 찾고, 이를 나타내는 Element 객체를 반환합니다
		//innerText 불필요한 공백을 제거 하고 출력해줌
	}
}
//textbyte
</script>

<!--빈칸검사-->
<script>
function check(){

	var sessionid = "<?php  echo $_SESSION['id']; ?>" ;
	var f =document.MSsend;
	var input = $('#MSfrom').val();
	var regPhone = /^01([0|1|6|7|8|9])-?([0-9]{3,4})-?([0-9]{4})$/;
	console.log(sessionid);
	//로그인 안하면 문자 못 보낸다
	if(sessionid){
		if (f.MSfrom.value==""){
			alert("발신번호를 입력해주세요");
			f.MSfrom.focus();
			return false;
		}

		if (f.MSto.value==""){
			alert("받는사람을  입력해주세요");
			f.MSto.focus();
			return false;
		}

		if (f.MSfrom.regPhone.test(input) == false) {
			alert("휴대폰 번호 아니네?");
			return false;
		}

		if (f.Msto.regPhone.test(text) == false) {
			alert("휴대폰 번호 아니네?");
			return false;
		}

	}
	else{
		alert("로그인을 해주세요");
		return false;
	}
}
//function
</script>



<!--keyup 번호입력할때 숫자만 입력 하게 -->
<script>
$(document).ready(function(){
$('#MSfrom').keyup(function(){

var regNumber = /^[0-9]*$/;
var input = $('#MSfrom').val();

console.log(input);
if(!regNumber.test(input)){
alert("숫자만 입력가능합니다");
$('#MSfrom').val(input.replace(/[^0-9]/g , ""));  //숫자 말고 다른거 입력하면 그 문자 없앤다 ""
}
});
});
</script>

<!--keyup 번호입력할때 한글 안되게-->
<script>
$(document).ready(function(){
$('#MSto').keyup(function(){

var regNumber = /^[0-9]*$/;
var input = $('#MSto').val();
console.log(input);
if(!regNumber.test(input)){
alert("숫자만 입력가능합니다");
$('#MSto').val(input.replace(/[^0-9]/g , ""));
}
});
});
</script>
<div style="padding-top: 100;margin-left: 251px;">
  <div>
    <h3>단문보내기</h3>
    <!-- 어떤 값을 눌렀는지 파악하기 위해 value -->
    <?php
    ?>
    <form name="MSsend" id="MSsend" method="GET"  onsubmit="return check()" action="SMSact.php" >
    <textarea style="resize : none;"  rows="10"  cols="50"  name="sms"  id="sms"  onKeyup="javascript:textbyte(this,90)" placeholder="단문" required></textarea>
    <span id="byteInfo">0</span>/90Byte
    <input type="text" class="" name="MSfrom"  id="MSfrom" placeholder="발신번호">
    <input type="text" class="" name="MSto" id="MSto" placeholder="받는사람">
    <!--get으로 데이터 넘기려고 했는데 id값을 뺴버리면 전송이 안됌 -->
    <input type="radio" name="send" id="1" value="1" ><label >예약</label>
    <input type="radio" name="send" id="2" value="2" checked><label>예약안함</label>
    <table>
    <!--예약 기능-->
    <form name="date"><!--폼 컨트롤 하기 위해 따로 폼으로 냅둔다 버튼에 따라 옵션값 보이게 설정-->
    <select class="" id="year" name="year" disabled=true >
    <!--년 마다 월이 달라질태니 수정-->
    <option value="2022">2022</option>
    </select>
    <select class="" name="month" id="month" disabled=true >
    <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option>
    <option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">012</option>
    </select>
    <select class="" name="day" id="day" disabled=true>
    <!--월 마다 30/31 윤달 달라지기 때문에 설정해야됌-->
    <option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option>
    <option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
    </select>
    <select class="" name="hour" id="hour" disabled=true >
    <option value="00">00시</option><option value="01">01시</option><option value="02">02시</option><option value="03">03시</option><option value="04">04시</option><option value="05">05시</option>
    <option value="06">06시</option><option value="07">07시</option><option value="08">08시</option><option value="09">09시</option><option value="10">10시</option><option value="11">11시</option>
    <option value="12">12시</option><option value="13">13시</option><option value="14">14시</option><option value="15">15시</option><option value="16">16시</option><option value="17">17시</option>
    <option value="18">18시</option><option value="19">19시</option><option value="20">20시</option><option value="21">22시</option><option value="23">23시</option>
    </select>
    <select class="" name="minute" id="minute" disabled=true>
    <option value="00">00분</option><option value="01">01분</option><option value="02">02분</option><option value="03">03분</option><option value="04">04분</option><option value="05">05분</option>
    <option value="12">12분</option><option value="15">15분</option><option value="17">17분</option><option value="20">20분</option><option value="30">30분</option>
    <option value="36">36분</option><option value="44">44분</option><option value="47">47분</option>
    <option value="50">50분</option><option value="53">53분</option><option value="56">56분</option><option value="59">59분</option>
    </select>
    </form>
    </table>
    <input type="submit" id="submit" class="" value="보내기" >
    <input type="button" value="test버튼" onclick="test()">
    </form>
  </div>

  <div>
    <table  cellpadding="2" cellspacing="1" border="1" style="text-align: center;">
    <tr>
      <th>번호</th>
      <th>USERDATA</th>
      <th style="padding-left:10px"> MSG_SEQ </th>
      <th style="padding-left:10px"> CUR_STATE </th>
      <th style="padding-left:10px"> RSLT_DATE </th>
      <th style="padding-left:10px"> REPORT_DATE </th>
      <th style="padding-left:10px"> REQ_DATE  </th>
      <th style="padding-left:10px"> RSLT_CODE</th>
      <th style="padding-left:10px"> RSLT_CODE2  </th>
      <th style="padding-left:10px"> RSLT_NET  </th>
      <th style="padding-left:10px"> CALL_TO </th>
      <th style="padding-left:10px"> CALL_FROM</th>
      <th style="padding-left:10px"> SMS_TXT </th>
      <th style="padding-left:10px"> MSG_TYPE  </th>
      <th style="padding-left:10px"> CONT_SEQ </th>
    </tr>
    <?php
    $session=$_SESSION['id'];
    $sql =  "SELECT *
    FROM msg_data
    where USERDATA='$session' and MSG_TYPE='4'";

    $row=mysqli_query($conn,$sql);
    $total_record = mysqli_num_rows($row);   //페이징 하기 위한 총 개수
    $list = 10; // 한 페이지에 보여줄 게시물 개수
    $block_cnt = 5; // 하단에 표시할 블록 당 페이지 개수
    $block_num = ceil($page / $block_cnt); // 현재 페이지 블록
    $block_start = (($block_num - 1) * $block_cnt) + 1; // 블록의 시작 번호
    $block_end = $block_start + $block_cnt - 1; // 블록의 마지막 번호

    $total_page = ceil($total_record / $list); // 페이징한 페이지 수

    if($block_end > $total_page){
    	$block_end = $total_page; // 블록 마지막 번호가 총 페이지 수보다 크면 마지막 페이지 번호를 총 페이지 수로 지정함
    }

    $total_block = ceil($total_page / $block_cnt); // 블록의 총 개수
    $page_start = ($page - 1) * $list; // 페이지의 시작 (SQL문에서 LIMIT 조건 걸 때 사용)

    $sql2 =  "SELECT  @ROWNUM:=@ROWNUM+1, A.*
    FROM msg_data A ,(SELECT @ROWNUM:=0) R
    where USERDATA='$session' and MSG_TYPE='4'
    ORDER BY @ROWNUM:=@ROWNUM+1 DESC LIMIT $page_start,$list";
    $row2=mysqli_query($conn,$sql2);

    echo "page스타트:".$page_start."<br>";
    echo "한 페이지에 보여줄 게시물 개수:".$list."<br>";
    echo "page:".$page."<br>";
    echo "페이징한 페이지 수".$total_page."<br>";
    echo "total_record:".$total_record;


    while($result = mysqli_fetch_array($row2)){
    	$title = $result['@ROWNUM:=@ROWNUM+1'];
    	/* 제목 글자수가 30이 넘으면 ... 표시로 처리해주기 */
    	if(strlen($title)>30){
    		$title=str_replace($result["@ROWNUM:=@ROWNUM+1"],mb_substr($result["@ROWNUM:=@ROWNUM+1"],0,30,"utf-8")."...",$result["@ROWNUM:=@ROWNUM+1"]);
    	}
    ?>
    <tr>
      <td> <?php echo $result['@ROWNUM:=@ROWNUM+1']."<br>"?> </td>
      <td> <?php echo $result['USERDATA']."<br>" ?> </td>
      <td> <?php echo $result['MSG_SEQ']."<br>" ?> </td>
      <td> <?php echo $result['CUR_STATE']."<br>" ?> </td>
      <td> <?php echo $result['RSLT_DATE']."<br>" ?> </td>
      <td> <?php echo $result['REPORT_DATE']."<br>" ?> </td>
      <td> <?php echo $result['REQ_DATE']."<br>" ?> </td>
      <td> <?php echo $result['RSLT_CODE']."<br>" ?> </td>
      <td> <?php echo $result['RSLT_CODE2']."<br>" ?> </td>
      <td> <?php echo $result['RSLT_NET']."<br>" ?> </td>
      <td> <?php echo $result['CALL_TO']."<br>" ?> </td>
      <td style="padding-left:10px"> <?php echo $result['CALL_FROM']."<br>" ?> </td>
      <td style="padding-left:30px">  </td>
      <td style="padding-left:40px"> <?php echo $result['MSG_TYPE']."<br>" ?> </td>
      <td> <?php echo $result['CONT_SEQ']."<br>" ?> </td>
    </tr>
    <?php } ?>
    </table>
    <!-- 게시물 목록 중앙 하단 페이징 부분-->
    <ul class="">
      <?php
    	if ($page <= 1){
    		// 빈 값
    	}
    	else {
    		if(isset($unum)){
    			echo "<li class=''><a class='' href='/test/SMSform.php?page=1' aria-label='Previous'>처음</a></li>";
    		}
    		else {
    			echo "<li class=''><a class='' href='/test/SMSform.php?page=1' aria-label='Previous'>처음</a></li>";
    		}
    	}
    	echo $unum;
    	if ($page <= 1){
    		// 빈 값
    	}
    	else {
    		$pre = $page - 1;
    		if(isset($unum)){
    			echo "<li class='page-item'><a class='page-link' href='/test/SMSform.php?page=$pre'>◀ 이전 </a></li>";
    		}
    		else {
    			echo "<li class='page-item'><a class='page-link' href='/test/SMSform.php?page=$pre'>◀ 이전 </a></li>";
    		}
    	}

    	for($i = $block_start; $i <= $block_end; $i++){
    		if($page == $i){
    			echo "<li class='page-item'><a class='page-link' disabled><b style='color: #df7366;'> $i </b></a></li>";
    		}
    		else {
    			if(isset($unum)){
    				echo "<li class='page-item'><a class='page-link' href='/SMSform/test.php?page=$i'> $i </a></li>";
    			}
    			else {
    				echo "<li class='page-item'><a class='page-link' href='/test/SMSform.php?page=$i'> $i </a></li>";
    			}
    		}
    	}

    	if($page >= $total_page){
    		// 빈 값
    	}
    	else {
    		$next = $page + 1;
    		if(isset($unum)){
    			echo "<li class=''><a class='page-link' href='/test/SMSform.php?page=$next'> 다음 ▶</a></li>";
    		}
    		else {
    			echo "<li class=''><a class='page-link' href='/test/SMSform.php?page=$next'> 다음 ▶</a></li>";
    		}
    	}

    	if($page >= $total_page){
    		// 빈 값
    	}
    	else {
    		if(isset($unum)){
    			echo "<li class=''><a class='page-link' href='/test/SMSform.php?page=$total_page'>마지막</a>";
    		}
    		else {
    			echo "<li class=''><a class='page-link' href='/test/SMSform.php?page=$total_page'>마지막</a>";
    		}
    	}
      ?>
    </ul>

  </div>
</div>
</head>
</body>
</html>

