<?php
include  $_SERVER['DOCUMENT_ROOT']. "/header/header.php";
?>
<!DOCTYPE html>
<html>
<body>
<html>


<head>
  <meta charset="euc-kr">
  <meta http-equiv="Content-Type" content="text/html; charset=euc-kr"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<h3>포토문자보내기</h3>
<!-- 예약 버튼 활성화/비할성화-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
$(document).ready(function() {
  $("input:radio[name=send]").click(function(){             //라디오 버튼을 누르면 시작
      if($("input:radio[name=send]:checked").val()=='1'){   //라디오에 체크된 버튼이 .val==1이냐 판단
          $("#year").attr("disabled",false);
          $("#year").removeClass("readonly");                  //클래스를 지워야 실행이 된다는데 아닌것 같은데 그냥 냅둬봄
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
<div class="">
<!--폼 값을 넘길때는 name으로 사용 -->
<form name="sendMS" method="GET" action="MMSact.php" >
<textarea style="resize : none;"  rows="10"  cols="50"  name="mms"  id="mms"  onKeyup="javascript:textbyte(this,2000)" placeholder="단문"></textarea>
<span id="byteInfo">0</span>/2000Byte
<input type="text" class="" name="MSfrom" placeholder="발신번호">
<input type="text" class="" name="MSto" placeholder="보내는사람">

<label><input type="radio" name="send" id="1" value="1" >예약</label>
<label><input type="radio" name="send" id="2" value="2" checked>예약안함</label>
<input type="file" id="fileToUpload" name="fileToUpload">


<table>
<tr>
<td>
<form><!--폼 컨트롤 하기 위해 따로 폼으로 냅둔다 버튼에 따라 옵션값 보이게 설정-->


<select class="" id="year" name="year" disabled=true ><!--년 마다 월이 달라질태니 수정-->
<option value="2021">2021</option>
<option value="2022">2022</option>
</select>
<select class="" name="month" id="month" disabled=true >
<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option>
<option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
</select>

<select class="" name="day" id="day" disabled=true> <!--월 마다 30/31 윤달 달라지기 때문에 설정해야됌-->
<option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option>
<option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
<option value="15">15</option><option value="16">16</option>
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


</tr>
</td>
</table>

<input type="submit" id="submit" class="" value="보내기" >  <!--html유형에 맞게 form안에 집어넣어야됌 내가 자꾸 위치생각해서 다른데 집어넣으니 데이터를 서버로 넘겨주지 못하고 있었음-->
</form> <!--<form><!--폼 컨트롤 하기 위해 따로 폼으로 냅둔다 버튼에 따라 옵션값 보이게 설정-->
</form> <!--<form name="sendMS" method="GET" action="MMSact.php" >-->
<div>
    <label for="file1">파일</label>

    <button id="btn" onclick="javascript:fn_submit()">업로드</button>
</div>

<!--파일선택시 보이는 파일-->
<div>
       <div class="img_wrap">
           <img id="img" />
       </div>
</div>

<!--업로드 후 보여지는 파일-->
<div>
  <div class="response">

       </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    //이미지 미리보기
    var sel_file;
    var check =1 ;
    $(document).ready(function() {
        $("#fileToUpload").on("change", handleImgFileSelect);
    });

    function handleImgFileSelect(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);

        var reg = /(.*?)\/(jpg|jpeg|png|bmp)$/;


        filesArr.forEach(function(f) {
            if (!f.type.match(reg)) {
                alert("확장자는 이미지 확장자만 가능합니다.");

              return check ;
			  console.log(check);
            }


            sel_file = f;

            var reader = new FileReader();
            reader.onload = function(e) {
                $("#img").attr("src", e.target.result);
            }
            reader.readAsDataURL(f);
        });
    }
</script>

<script>
//파일 업로드
function fn_submit(){

        var form = new FormData();
        form.append( "fileToUpload", $("#fileToUpload")[0].files[0] );

         jQuery.ajax({
             url : "Poto.php"
           , type : "POST"
           , processData : false
           , contentType : false
           , data : form
           , success:function(response) {
               if(response){
               alert(response);
               console.log(fileToUpload);
			   }else{
			    alert ("다시확인");
			   }
           }
           ,error: function (XHR)
           {
               alert(XHR.responseText);
           }
       });
}
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
one_char = str.charAt(i);								/*str.charAt(0) str가리키고 잇는 문자열에서 0번째 문자를 char타입으로 변환 String으로 저장된 문자열 중에서 한 글자만 선택해서 char타입으로 변환
                                                        [사용자가 입력을 한글자만 하는 경우는 거의 없기때문에 문자열로 입력을 받아준다]*/
if(escape(one_char).length > 4){                        //one_char 변환한 문자를 escape(유니코드로 변환해줘서 문자를 판단하게 해줌)  1byte=%XX / 2byte=%uXXXX  변환한 문자가 >4 크면 2byte 한글로 판단
    rbyte += 2;
	console.log(rbyte);                                 //출력해보면 입력한 문자 가장 마지막이 찍힌다 ex)이한솔 = 솔
}else{
    rbyte++;                                            //영문 등 나머지 1Byte
}

if(rbyte <= maxByte){                                   //maxbyte보다 rbyte가 높으면 rlen변수에 저장 하고 문자열 자르는데 이용
    rlen = i+1;

}
}//for

//문자열 자르기
if(rbyte > maxByte){
    alert("한글 "+(maxByte/2)+"자 / 영문 "+maxByte+"자를 초과 입력할 수 없습니다.");
    str2 = str.substr(0,rlen);               //substr (추출대상문자열 , 추출할 문자 개수)
    obj.value = str2;                        //자르고 남은 문자열(실질적으로 입력완료된 문자열)
	console.log("잘린문자열"+str2);
    textbyte(obj, maxByte);                  //textbyte함수에 파라미터 넣어준다

}else{
    document.getElementById('byteInfo').innerText = rbyte;          //getElementById 메서드는 주어진 문자열과 일치하는 id 속성을 가진 요소를 찾고, 이를 나타내는 Element 객체를 반환합니다
																	//innerText 불필요한 공백을 제거 하고 출력해줌
}
}//textbyte

</script>


</div><!--문자전송폼-->



</body>
</head>
</html>