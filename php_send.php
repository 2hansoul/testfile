<form method="GET" action="php_send_ex_sample.php">
    <div>
	<h3>단문보내기 ㄱㄱㄱㄱㄱㄱㄱafadfadfafㄱㄱ</h3>   
    <textarea style="resize : none;"  rows="10"  cols="50"  name="sendMsg_url"  id="sendMsg_url"  onKeyup="javascript:textbyte(this,90)" placeholder="단문" required></textarea>
    <span id="byteInfo">0</span>/90Byte
            <input type="text" id="destNum" name="destNum"placeholder="보내는사람">
            <input type="text" id="callNum" name="callNum" placeholder="받는사람">
			<input type="hidden" id="sType" name="sType" value="SMS">
        <div>
            <input type="submit" value="보내기">
        </div>
        </div>
    </form>


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
		//alert("한글 "+(maxByte/2)+"자 / 영문 "+maxByte+"자를 초과 입력할 수 없습니다.");
		if(confirm("90byte 넘었는데 장문으로 전환 할꺼임?")){
				location.href="php_Lsend.php";
		}else{
			str2 = str.substr(0,rlen);               //substr (추출대상문자열 , 추출할 문자 개수)
			obj.value = str2;                        //자르고 남은 문자열(실질적으로 입력완료된 문자열)
			console.log(str2);
			textbyte(obj, maxByte);                  //textbyte함수에 파라미터 넣어준다
		}
	}
	else{
		document.getElementById('byteInfo').innerText = rbyte;          //getElementById 메서드는 주어진 문자열과 일치하는 id 속성을 가진 요소를 찾고, 이를 나타내는 Element 객체를 반환합니다
		//innerText 불필요한 공백을 제거 하고 출력해줌
	}
}
//textbyte
</script>