<?php
include  $_SERVER['DOCUMENT_ROOT']. "/header/header.php";
include  $_SERVER['DOCUMENT_ROOT']. "/test/loginsession.php";
include  $_SERVER['DOCUMENT_ROOT']. "/test/dbconnMS.php";
?>
<html>
<head>
<meta charset="euckr">
<meta http-equiv="Content-Type" content="text/html; charset=euckr"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<h3>장문보내기</h3>
<!-- 예약 버튼 활성화/비할성화-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
$(document).ready(function() {
$("input:radio[name=send]").click(function(){             //라디오 버튼을 누르면 시작
if($("input:radio[name=send]:checked").val()=='1'){   //라디오에 체크된 버튼이 .val==1이냐 판단
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

<!--문자 btye 계산-->
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
		one_char = str.charAt(i);								//str.charAt(0) str가리키고 잇는 문자열에서 0번째 문자를 char타입으로 변환 String으로 저장된 문자열 중에서 한 글자만 선택해서 char타입으로 변환
		//[사용자가 입력을 한글자만 하는 경우는 거의 없기때문에 문자열로 입력을 받아준다]
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
		console.log("잘린문자열"+str2);
		textbyte(obj, maxByte);                  //textbyte함수에 파라미터 넣어준다

	}
	else{
		document.getElementById('byteInfo').innerText = rbyte;          //getElementById 메서드는 주어진 문자열과 일치하는 id 속성을 가진 요소를 찾고, 이를 나타내는 Element 객체를 반환합니다
		//innerText 불필요한 공백을 제거 하고 출력해줌
	}
}
//textbyte

</script>

<div style="padding-top: 100;margin-left: 251px;">
<h3>장문 보내기</h3>
  <!--폼 값을 넘길때는 name으로 사용 -->
  <form name="LMSsend" method="GET" action="LMSact.php" >
  <textarea style="resize : none;"  rows="10"  cols="50"  name="lms"  id="lms"  onKeyup="javascript:textbyte(this,2000)" placeholder="장문"></textarea>
  <span id="byteInfo">0</span>/2000Byte
  <input type="text" class="" name="MSfrom" placeholder="발신번호">
  <input type="text" class="" name="MSto" placeholder="보내는사람">

  <input type="radio" name="send" id="1" value="1" ><label >예약</label>
  <input type="radio" name="send" id="2" value="2" checked><label>예약안함</label>

  <table>
  <tr>
    <td>



      <form name="date"><!--폼 컨트롤 하기 위해 따로 폼으로 냅둔다 버튼에 따라 옵션값 보이게 설정-->
      <select class="" id="year" name="year" disabled=true >
      <!--년 마다 월이 달라질태니 수정-->
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      </select>
      <select class="" name="month" id="month" disabled=true >
      <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option>
      <option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
      </select>

      <select class="" name="day" id="day" disabled=true>
      <!--월 마다 30/31 윤달 달라지기 때문에 설정해야됌-->
      <option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option>
      <option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
      <option value="15">15</option>
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
    </tr>
  </td>
  </table>
  <input type="submit" id="submit" class="" value="보내기" >
  </form>
  <div style="padding-top:50">
    <table  cellpadding="2" cellspacing="1" border="1" style="text-align: center;">
    <tr>
	  <th>번호</th>
      <th>USERDATA</th>
      <th style=""> MSG_SEQ </th>
      <th style=""> CUR_STATE </th>
      <th style=""> RSLT_DATE </th>
      <th style=""> REPORT_DATE </th>
      <th style=""> REQ_DATE  </th>
      <th style=""> RSLT_CODE</th>
      <th style=""> RSLT_CODE2  </th>
      <th style=""> RSLT_NET  </th>
      <th style=""> CALL_TO </th>
      <th style=""> CALL_FROM</th>
      <th style=""> MMS_BODY </th>
      <th style=""> MSG_TYPE  </th>
      <th style=""> CONT_SEQ </th>
    </tr>
    <?php
    $session=$_SESSION['id'];
    $sql = "SELECT  @ROWNUM:=@ROWNUM+1, A.*
			FROM msg_data A JOIN mms_contents_info B
			ON A.CONT_SEQ  = B.CONT_SEQ AND A.USERDATA='$session'
			,(SELECT @ROWNUM:=0) R
			ORDER BY @ROWNUM DESC";
    $row=mysqli_query($conn,$sql);
    while($result = mysqli_fetch_array($row)) {
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
		<td style="padding-left:30px"> <?php echo $result['MMS_BODY']."<br>" ?> </td>
		<td style="padding-left:40px"> <?php echo $result['MSG_TYPE']."<br>" ?> </td>
		<td> <?php echo $result['CONT_SEQ']."<br>" ?> </td>
    <?php } ?>
	</tr>
    </table>
  </div>
</div>
</head>
</html>
