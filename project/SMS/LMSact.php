<?php
include "dbconnMS.php";
include  $_SERVER['DOCUMENT_ROOT']. "/test/loginsession.php";

//단문에서 사용한 sql
$lms =$_GET['lms'];
$MSfrom =$_GET['MSfrom'];
$MSto =$_GET['MSto'];
$send =$_GET['send'];
$session=$_SESSION['id'];

if($send == "2"){

//LMS을 먼저 인설트 후 증가한 값을 찾아서
$sql= "insert into mms_contents_info (FILE_CNT, MMS_BODY, MMS_SUBJECT)
values( 1 , '$lms' , 'LMSTEST' )";

$result=mysqli_query($conn,$sql);

//디비에 저장 되어잇는 key값을 찾는다
//mysqli_insert_id () 함수가 마지막 질의 자동 (AUTO_INCREMENT 생성) ID를 생성 반환한다.
$key=mysqli_insert_id($conn);

echo $key."<br>";

//CUR_STATE 상태값 0/1/2/3
		$sql1 = "insert into msg_data(USERDATA,CUR_STATE, REQ_DATE, CALL_TO, CALL_FROM, SMS_TXT, MSG_TYPE , CONT_SEQ)
        values('$session',0,NOW(),'$MSto','$MSfrom' ,'','6','$key')";



$row=mysqli_query($conn,$sql1);  //mysqli_query쿼리를  실행을 해야되는데 그냥 insert만 해서 안 넣어진듯 insert로 그냥 디비에 넣기만 하고 실행을 안시켰으니
echo $sql."<br>";
echo $sql1."<br>";

}else{

$sql= "insert into MMS_CONTENTS_INFO (FILE_CNT, MMS_BODY, MMS_SUBJECT)
values( 1 , '$lms' , 'LMSTEST' )";

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
        values(0,'$time','$MSto','$MSfrom' ,'','6','$key')";

$row=mysqli_query($conn,$sql1);
echo $time;

}


?>