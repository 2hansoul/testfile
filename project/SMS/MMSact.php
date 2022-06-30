<?php
include "dbconnMS.php";
//include $_SERVER['DOCUMENT_ROOT']. "/test/";

//단문에서 사용한 sql
$mms =$_GET['mms'];
$MSfrom =$_GET['MSfrom'];
$MSto =$_GET['MSto'];
$send =$_GET['send'];
$fileToUpload = $_GET['fileToUpload']; //업로드한 파일은 post로 전송하여 값을 받았지만 번호,문자내용과 같이 submit하기 위해 get으로 값을 받아와서 진행

"../test";
$cachePath= $_SERVER['DOCUMENT_ROOT']. "/test/";     //상대경로로 진행하니 경로를 서버에서 경로를 못 찾는다 절대경로 진행해야 함
$Path = $cachePath.$fileToUpload;                    //절대경로.받아온file값

echo $Path;
echo $send;
if($send == "2"){

//LMS을 먼저 인설트 후 증가한 값을 찾아서
$sql= "insert into MMS_CONTENTS_INFO (FILE_CNT, MMS_BODY, MMS_SUBJECT,FILE_TYPE1,FILE_NAME1)
values( 2 , '$mms' , 'LMSTEST' ,'IMG','$Path')";

$result=mysqli_query($conn,$sql);

//디비에 저장 되어잇는 key값을 찾는다
//mysqli_insert_id () 함수가 마지막 질의 자동 (AUTO_INCREMENT 생성) ID를 생성 반환한다.
$key=mysqli_insert_id($conn);

echo $key."<br>";

//CUR_STATE 상태값 0/1/2/3
		$sql1 = "insert into MSG_DATA(CUR_STATE, REQ_DATE, CALL_TO, CALL_FROM, SMS_TXT, MSG_TYPE , CONT_SEQ)
        values(0,NOW(),'$MSto','$MSfrom' ,'','6','$key')";



$row=mysqli_query($conn,$sql1);  //mysqli_query쿼리를  실행을 해야되는데 그냥 insert만 해서 안 넣어진듯 insert로 그냥 디비에 넣기만 하고 실행을 안시켰으니
echo $sql."<br>";
echo $sql1."<br>";


}else{

$sql= "insert into MMS_CONTENTS_INFO (FILE_CNT, MMS_BODY, MMS_SUBJECT,FILE_TYPE1,FILE_NAME1)
values( 2 , '$mms' , 'LMSTEST' ,'IMG','$Path')";

$result=mysqli_query($conn,$sql);
//디비에 저장 되어잇는 key값을 찾는다
$key=mysqli_insert_id($conn);

echo $key."<br>";

$send =$_GET['send'];
$year =$_GET['year'];
$month =$_GET['month'];
$day =$_GET['day'];
$hour =$_GET['hour'];
$minute =$_GET['minute'];

$filter = $hour.":".$minute.":"."00";

$time=$year ."-". $month. "-". $day ." ". $filter;   //원래 time변수를 설정하지않고 값을 그냥 바로 썼는데 ":" 이걸 쓰면 오류 나서 따로 변수로 빼줌


$sql1 = "insert into MSG_DATA(CUR_STATE, REQ_DATE, CALL_TO, CALL_FROM, SMS_TXT, MSG_TYPE , CONT_SEQ)
        values(0,$time,'$MSto','$MSfrom' ,'','6','$key')";


$row=mysqli_query($conn,$sql1);

echo $time;

}


?>