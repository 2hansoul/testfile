<!-- Navigation -->
<?php
include  $_SERVER['DOCUMENT_ROOT']. "../testfile/project/login/loginsession.php";

?>
<style>
.testimonialText {
position: absolute;
    left: -29px;
    top: 73px;
    width: 240px;
    height: 100%;
    font-size: 21px;
    float: left;
    background-color: yellow;
}
dropdown{
  position : relative;
  display : inline-block;
}

.dropdown-content{
  display : none;
  position : absolute;
  z-index : 1; /*다른 요소들보다 앞에 배치*/
  font-weight: 400;
  background-color: yellow;
  min-width : 200px;
}

.dropdown-content a{
  display : block;
  text-decoration : none;
  color : rgb(37, 37, 37);
  font-size: 20px;
  padding : 12px 20px;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.menu{
	position: absolute;
    width: 100%;
    height: 80px;
    left: -5px;
    top: -6px;
    background-color: yellow;
}
.login_header{
    position: relative;
    left: 1656px;

}
.img_login{
position: relative;
    top: 32px;
    left: 15px;

}
a{
text-decoration-line : none;
}
/*new font*/
@font-face{
 src:url("../fonts/Binggrae.ttf");
 font-family : "Binggrae";
}
#Binggrae_font{
 font-family : "Binggrae";
}
.imgmenu{
	width: 20;
    padding-right: 2px;
    padding-top: 9px;
}
.li_menu{
    list-style: none;
	padding-bottom:10px
}

</style>
<html lang="ko">
<body style="overflow-x: hidden;">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<div class="menu">
  <img src="<?=$IMG_SERVER?>/testfile/img/logo-dark.png"  class="img_login">
  <div class="login_header" id="Binggrae_font">
    <?php if(!$login_session){ ?> <!-- 세션이 비어 있다고 처리하면 애초에 홈페이지 접속만 해도 로그인을 하라고 창을 띄우게 된다 이러면 안되고 => 코드를 이렇게 길게 적을 필요없이 그냥 버튼을 활성화/비활성만 해도 될것 같은데 -->
    <img src="<?=$IMG_SERVER?>/testfile/img/menuicon/free-icon-user-shape-25634.png" class="imgmenu"><a href="../testfile/project/login/login.php">Log In</a>
    <img src="<?=$IMG_SERVER?>/testfile/img/menuicon/free-icon-linkedin-sign-25320.png" class="imgmenu"><a href="../testfile/project/join/agree.php">회원가입 </a>

    <?php	}else { ?>
    <div class=""> <a href="../testfile/project/loginresult.php"><?php echo $_SESSION['id']?>님 환영합니다</a></div>
	<div class=""> <a href="../testfile/project/logout.php">로그아웃</a></div>
    <?php } ?>
  </div>
</div>
<div class="testimonialText" id="Binggrae_font">
  <ul class="" >
    <li class="li_menu"><img src="<?=$IMG_SERVER?>/testfile/img/menuicon/free-icon-home-25694.png" class="imgmenu"><a href="/testfile/_index.php">HOME</a></li>
    <li class="li_menu"><img src="<?=$IMG_SERVER?>/testfile/img/menuicon/free-icon-plus-symbol-in-a-rounded-black-square-25668.png" class="imgmenu"><a href="/test/allimtalk.php">발신프로필등록</a></li>

    <!--세션이 없으면 loginresult 에서 판별을 진행 한다 -->
    <div class="dropdown">
      <li class="li_menu"><img src="<?=$IMG_SERVER?>/testfile/img/menuicon/free-icon-mobile-phone-25658.png" class="imgmenu"><a href="">문자보내기</a></li>
      <div class="dropdown-content">
        <a href="../testfile/project/SMSform.php">단문</a>
        <a href="../testfile/projectfile/project/LMSform.php">장문</a>
        <a href="../testfile/projectfile/project/MMSform.php">포토</a>
      </div>
    </div>
    <?php if($login_session){ ?>
    <li class="li_menu"><img src="<?=$IMG_SERVER?>/testfile/img/menuicon/free-icon-magnifying-glass-25313.png" class="imgmenu"><a href="../testfile/projectfile/project/Mysms.php">전송내역(단문)</a></li>
    <li class="li_menu"><img src="<?=$IMG_SERVER?>/testfile/img/menuicon/free-icon-magnifying-glass-25313.png" class="imgmenu"><a href="../testfile/projectfile/project/Mylms.php">전송내역(장문)</a></li>
    <?php }else if(!$login_session){ ?>
    <li id="myinfo" class="li_menu"><img src="<?=$IMG_SERVER?>/testfile/img/menuicon/free-icon-magnifying-glass-25313.png" class="imgmenu"><a href="">전송내역(단문)</a></li>
    <li id="myinfo1" class="li_menu"><img src="<?=$IMG_SERVER?>/testfile/img/menuicon/free-icon-magnifying-glass-25313.png" class="imgmenu"><a href="">전송내역(장문)</a></li>
    <?php } ?>
  </ul>
</div>



<script>
$(document).ready(function(){
$('#myinfo').click(function(){
alert("로그인을 해주세요");
});
$('#myinfo1').click(function(){
alert("로그인을 해주세요");
});
});
</script>
</body>
</html>



