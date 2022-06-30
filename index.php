<?php

include  $_SERVER['DOCUMENT_ROOT']. "/testfile/header/header.php";
?>
<style>
.mainBg{
	width: 100%;
	height: 460px;
}

.mainButton{
	padding-top: 53px;
    padding-left: 24px;
    text-align: center;
}



.table_right{
    border-bottom: 1px solid #aeaeae;
    border-left: 1px solid #aeaeae;
    border-right: 1px solid #aeaeae;
    border-top: 1px solid #aeaeae;
}
/*슬라이드쇼------------------*/
/* Slideshow container */
.slideshow-container {
    width: 923px;
    position: relative;
    bottom: 221px;
    left: 673px;
}
.slideshow-container .mySlides img {
  height: 600px;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}
/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
/*Accordion----------------------------------------------------*/


.que:first-child{
    border-top: 1px solid black;
  }

.que{
  position: relative;
  padding: 17px 0;
  cursor: pointer;
  font-size: 14px;
  border-bottom: 1px solid #dddddd;

}

.que::before{
  display: inline-block;
  content: 'Q';
  font-size: 14px;
  color: #006633;
  margin-right: 5px;
  color:red;
}

.que.on>span{
  font-weight: bold;
  color: #006633;
}

.anw {
  display: none;
  overflow: auto;
  font-size: 14px;
  background-color: #f4f4f2;
  padding: 27px 0;
}

.anw::before {
  display: inline-block;
  content: 'A';
  font-size: 14px;
  font-weight: bold;
  color: #666;
  margin-right: 5px;
}
.accordion_div{
	position: relative;
    bottom: 558px;
    width: 596px;
    left: 30px;
}
.div_main{
    position: relative;
    top: 100;
    left: 274;
}
</style>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class='div_in'>
  <div class='div_main'>
    <div class="mainButton">
      <table border='0' cellpadding='10' cellspacing='0' width='600' class="table_right">
      <tr style="">
        <td style=""><font style="font-size:25">공지사항</font></td>
      </tr>
      <tr style="">
        <td style=""><a href="../test/result.php">[알림]1111111111111111</a></td>
      </tr>
      <tr style="">
        <td style="">[알림]2222222222222222</td>
      </tr>
      <tr style="">
        <td style="">[알림]3333333333333333</td>
      </tr>
      <tr style="">
        <td style="">[알림]44444444444444444444</td>
      </tr>
      </table>
    </div>
	<div class="slideshow-container" >
      <!-- Full-width images with number and caption text -->
      <div class="mySlides fade">
	   <img src="https://divisare-res.cloudinary.com/images/f_auto,q_auto,w_800/v1491425456/ltekybkstiyl7faumrsq/acne-studios-acne-studio-potsdamer-strasse.jpg" style="width:100%">
      </div>
      <div class="mySlides fade">
        <img src="https://divisare-res.cloudinary.com/images/f_auto,q_auto,w_800/v1491425448/rnelglmoujifzlbzykxw/acne-studios-acne-studio-potsdamer-strasse.jpg" style="width:100%">
      </div>
	    <div class="mySlides fade">
        <img src="https://divisare-res.cloudinary.com/images/f_auto,q_auto,w_800/v1491425434/coct9kmra7uhmeu4cxto/acne-studios-acne-studio-potsdamer-strasse.jpg" style="width:100%">
      </div>
      <div class="mySlides fade">
        <img src="https://divisare-res.cloudinary.com/images/f_auto,q_auto,w_800/v1491425440/xacfj7abitmifeyciiia/acne-studios-acne-studio-potsdamer-strasse.jpg" style="width:100%">
      </div>
      <div class="mySlides fade">
        <img src="https://divisare-res.cloudinary.com/images/f_auto,q_auto,w_800/v1491425434/cqxjhpdmepxto0nudsok/acne-studios-acne-studio-potsdamer-strasse.jpg" style="width:100%">
      </div>
		 <!-- Next and previous buttons -->
      <a class="prev" onclick="moveSlides(-1)">&#10094;</a>
      <a class="next" onclick="moveSlides(1)">&#10095;</a>
    </div>

	  <!-- The dots/circles -->
    <div style="position: absolute;left: 1093;top: 600;">
      <span class="dot" onclick="currentSlide(0)"></span>
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
    </div>
	<div id="Accordion_wrap" style="" class="accordion_div">
		 <div class="que">
		  <span>currentSlide</span>
		 </div>
		 <div class="anw">
		  <span>이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔이한솔</span>
		 </div>
		  <div class="que">
		  <span>currentSlide</span>
		 </div>
		 <div class="anw">
		  <span>발신번호 사전등록이란?
				전기통신사업법 제 84조에 의거하여 2015년 10월 16일부터 인터넷을 통해 발송하는
				문자메세지의 발신번호에 대해서 발신번호 사전등록제가 시행됩니다.
				(타인명의 발신번호 등록불가)
		</span>
		 </div>
		  <div class="que">
		  <span>currentSlide</span>
		 </div>
		 <div class="anw">
		  <span>[Web발신] 문구는 인터넷을 통해 발송한 문자를 나타내는 것으로
모든 통신사에서 자동으로 삽입되어 발송되기 때문에 문자 발송자는
해당 문구를 제거하실 수 없는 점 양해 부탁 드립니다.

다만, 문자 수신자 본인이 직접 이용중인 이동통신사에
[Web]발신 문구가 표기되지 않도록 해당 부가서비스를 해지요청 하시면
[Web]발신 표기없이 문자수신이 가능합니다.</span>
		 </div>
	</div>
  </div>
</div>







<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
var slideIndex = 0; //slide index

// HTML 로드가 끝난 후 동작
window.onload=function(){
	showSlides(slideIndex);

	// Auto Move Slide
	var sec = 3000;
	setInterval(function(){
	slideIndex++;
	showSlides(slideIndex);

	}, sec);
}

// Next/previous controls
function moveSlides(n) {
	slideIndex = slideIndex + n
	showSlides(slideIndex);
}

// Thumbnail image controls
function currentSlide(n) {
	slideIndex = n;
	showSlides(slideIndex);
}

function showSlides(n) {

	var slides = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("dot");
	var size = slides.length;

	if ((n+1) > size) {
		slideIndex = 0;
		n = 0;
	}
	else if (n < 0) {
		slideIndex = (size-1);
		n = (size-1);
	}

	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}

	slides[n].style.display = "block";
	dots[n].className += " active";
}
//accordion
$(".que").click(function() {
   $(this).next(".anw").stop().slideToggle(300);
  $(this).toggleClass('on').siblings().removeClass('on');
  $(this).next(".anw").siblings(".anw").slideUp(300); // 1개씩 펼치기
});
</script>

<?php
include  $_SERVER['DOCUMENT_ROOT']. "/header/footer.php";
?>