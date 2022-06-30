<?php
include "dbconnMS.php";
include  $_SERVER['DOCUMENT_ROOT']. "/test/loginsession.php";

//전송 값
$sms =$_GET['sms'];
$MSfrom =$_GET['MSfrom'];
$MSto =$_GET['MSto'];
$send=$_GET['send'];  //예약 버튼 값 앞에서 value=1 으로 설정 해놓고 조건 판단
//echo "예약변수값 1이면 예약:".$send."<br>";
$session=$_SESSION['id']; //나는 session값으로 userdata에 넣어서 세션이 일치하는사라들만 보여주게 할꺼임




if($send== "2"){

$sql = "insert into msg_data(USERDATA,CUR_STATE, REQ_DATE, CALL_TO, CALL_FROM, SMS_TXT,MSG_TYPE)
        values('$session',0,NOW(),'$MSto' , '$MSfrom' , '$sms' ,'4')";
	$row=mysqli_query($conn,$sql);         // $result=mysqli_fetch_array($row);  CUR_STATE boolean형 으로 전달해서 에러가 났다?

echo "sql".$sql;
//디비에 저장 되어잇는 key값을 찾는다
//mysqli_insert_id () 함수가 마지막 질의 자동 (AUTO_INCREMENT 생성) ID를 생성 반환한다.


//오류코드 파악
if($row1[0]=="0"){
echo "성공";
}else if($row1[0]=="p") {
echo "없는번호";
}

}else{
//예약 메시지 전송
//예약 값
$send =$_GET['send'];
$year =$_GET['year'];
$month =$_GET['month'];
$day =$_GET['day'];
$hour =$_GET['hour'];
$minute =$_GET['minute'];

$filter = $hour.":".$minute.":"."00";

$time=$year ."-". $month. "-". $day ." ". $filter;   //원래 time변수를 설정하지않고 값을 그냥 바로 썼는데 ":" 이걸 쓰면 오류 나서 따로 변수로 빼줌


$sql1 = "insert into msg_data(USERDATA, CUR_STATE, REQ_DATE, CALL_TO, CALL_FROM, SMS_TXT,MSG_TYPE)
					     values( '$session',  0   , '$time' ,'$MSto', '$MSfrom' ,'$sms' , '4')";



$row1=mysqli_query($conn,$sql1);
}
?>




