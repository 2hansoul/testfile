<?php
include  $_SERVER['DOCUMENT_ROOT']. "/testfile/header/header.php";
require $_SERVER["DOCUMENT_ROOT"]."/testfile/project/login/loginsession.php";


?>

<!--세션으로 이쪽페이지 로그인 되면 아예 실행이 안되게 설정 해야겠음-->
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

</style>

<!--
<div class="wrapper fadeInDown">

  <div id="formContent">


    <h2 class="active"> 로그인 </h2>
    <a href="join.php"><h2 class="inactive underlineHover">회원가입 </h2></a>


    <form method="POST" name="myform" action="loginact.php" onsubmit="return check()">
      <input type="text"  class="fadeIn second" name="id" id="id" placeholder="id">
      <input type="password"  class="fadeIn second" name="password" id="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="로그인">
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="Idsearch.php">Forgot ID?</a>

	  <input type="hidden" class="underlineHover1" href="#" name="logout" value="로그아웃">
    </div>





<input type="checkbox"  name="idsave" id="idsave">아이디</input>
-->
<style>


.div_loginmain{
	border: 2px solid #212020;
    width: 442px;
    height: 560;
    background-color: yellow;
    text-align: center;
    position: relative;
    top: 100;
    left: 800;
}

/*input 부분 */
.tempInput {
    border-top: 1px;
    border-left: 1px;
    border-right: 0px;
    width: 259px;
    height: 28px;
    margin-bottom: -7px;
	text-indent: 28px;
	background-color:yellow;
	border-color:black;
}


.tempInput1 {
    border-top: 1px;
    border-left: 1px;
    border-right: 0px;
    width: 259px;
    height: 28px;
    margin-bottom: 25px;
	text-indent: 28px; /*text입력시 공간 창출*/
	background-color:yellow;
	border-color:black;
	color: blue;

}


.imgmenu1{
	width: 23px;
    position: relative;
    top: 28px;
    right: 120px;
}



.imgmenu2{
   width: 26px;
    position: relative;
    top: 28px;
    right: 121px;
}

.id_rember{
margin-left: -132px;
margin-top: -10px;
}

.login_btn{
    width: 259px;
    height: 37px;
    border: solid;
    border-radius: 8px;
    background-color: #109b10;
    border-color: #109b10;
    font-family: 'Binggrae';
    font-size: 16px;
    color: white;
    font-weight: bolder;

}
input[type="checkbox"]{

    width: 28px;
    height: 15px;
    left: 2px;
    position: relative;
}
</style>
<script>

</script>
<div class="div_in">
  <div class="div_main">
    <div class="div_loginmain">
      <img  src="/tesfile/images/free-icon-unicorn-4584583.png" style="width: 100;padding-top: 42px;">
      <h2 style="margin-top: 14px;">LOG IN</h2>
        <div class="div_login">
          <form method="POST" name="myform" action="../login/loginact.php" onsubmit="return check()">

              <img  id="loginIMG" src="/testfile/img/menuicon/free-icon-user-shape-25634.png" class="imgmenu1">
              <div class="input_id">
                <input type="text"  class="tempInput" name="id" id="id" placeholder="userid">
              </div>

              <img id="passIMG"src="/testfile/img/menuicon/premium-icon-padlock-3934062.png" class="imgmenu2">
              <div class="input_pass">
                <input type="password"  class="tempInput1" name="password" id="password" placeholder="password">
              </div>

              <div class="id_rember">
                <input type="checkbox"  name="idsave" id="idsave" class="">아이디 저장하기</input>
              </div>
              <div style="padding-top: 38px;padding-bottom: 10px;">
                <input type="submit" class="login_btn" id="" value="로그인">
              </div>
          <div>
          <a class="" href="Idsearch.php" style="font-family: 'Binggrae';font-size: 15;">아이디찾기</a>
            <a class="" href="Idsearch.php" style="font-family: 'Binggrae';font-size: 15;">비밀번호찾기</a>
          <a class="" href="agree.php" style="font-family: 'Binggrae';font-size: 15;">회원가입</a>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!--빈칸체크-->
<script>
function check() {

	var f = document.myform;
  
	if (f.id.value == "") {
		alert("아이디를 입력해주십시오");
		f.id.focus();
		return false;
	}
	if (f.password.value == "") {
		alert("비밀번호를 입력해주세요");
		f.password.focus();
		return false;
	}
}
</script>
<!--아이디기억하기-->
<script>
$(document).ready(function(){

//저장된 쿠기값을 가져와서 id 칸에 넣어준다 없으면 공백으로 처리
var key = getCookie("key");
$("#id").val(key);


if($("#id").val() !=""){               // 페이지 로딩시 입력 칸에 저장된 id가 표시된 상태라면 id저장하기를 체크 상태로 둔다
$("#idsave").attr("checked", true); //id저장하기를 체크 상태로 둔다 (.attr()은 요소(element)의 속성(attribute)의 값을 가져오거나 속성을 추가합니다.)
}

$("#idsave").change(function(){ // 체크박스에 변화가 있다면,
if($("#idsave").is(":checked")){ // ID 저장하기 체크했을 때,
setCookie("key", $("#id").val(), 2); // 하루 동안 쿠키 보관
}else{ // ID 저장하기 체크 해제 시,
deleteCookie("key");
}
});

// ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
$("#id").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
if($("#idsave").is(":checked")){ // ID 저장하기를 체크한 상태라면,
setCookie("key", $("#id").val(), 2); // 2일 동안 쿠키 보관
}
});
});

//쿠키 함수
function setCookie(cookieName, value, exdays){
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
	document.cookie = cookieName + "=" + cookieValue;
}

function deleteCookie(cookieName){
	var expireDate = new Date();
	expireDate.setDate(expireDate.getDate() - 1);
	document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
}

function getCookie(cookieName) {
	cookieName = cookieName + '=';
	var cookieData = document.cookie;
	var start = cookieData.indexOf(cookieName);
	var cookieValue = '';
	if(start != -1){
		start += cookieName.length;
		var end = cookieData.indexOf(';', start);
		if(end == -1)end = cookieData.length;
		cookieValue = cookieData.substring(start, end);
	}
	return unescape(cookieValue);
}
</script>

</div>
</div>
<head>
</html>

