<?php
include  $_SERVER['DOCUMENT_ROOT']. "/test/dbconn.php";
include  $_SERVER['DOCUMENT_ROOT']. "/header/header.php";
include  $_SERVER['DOCUMENT_ROOT']. "/test/loginsession.php";
include  $_SERVER['DOCUMENT_ROOT']. "/test/dbconnMS.php";
include  $_SERVER['DOCUMENT_ROOT']. "/test/SMSact.php";

$session = $_SESSION['id'];
?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){
	   var send
      $.ajax({
	    url : "SMSact.php",
		type : "GET",
		data : {send},
		success:function(data){
		console.log(data);
		}
	  });
});
</script>

<div style="padding-top: 150;margin-left: 400;">
	<table  cellpadding="3" cellspacing="0" border="1" style="margin-top:10px">
		<tr>
			<th>번호</th>
			<th style="padding-left:10px;"> 상태값</th>
			<th style="padding-left:10px"> 선택 </th>
			<th style="padding-left:10px"> 메세지 </th>
			<th style="padding-left:10px"> 받는사람 </th>
			<th style="padding-left:10px"> 보낸사람  </th>
			<th style="padding-left:10px"> 메시지를 전송한</th>
			<th style="padding-left:10px"> 핸드폰에 전달된</th>
			<th style="padding-left:10px"> 레포트 처리한</th>
			<th style="padding-left:10px"> 예약일시</th>
			<th style="padding-left:10px"> 관리 </th>
		</tr>
	<?php
		$session=$_SESSION['id'];
		$sql = "SELECT  @ROWNUM:=@ROWNUM+1, A.*
						FROM msg_data A ,(SELECT @ROWNUM:=0) R
						where USERDATA='$session' and MSG_TYPE='4'
						ORDER BY @ROWNUM:=@ROWNUM+1 DESC";
		$row=mysqli_query($conn,$sql);
		while($result = mysqli_fetch_array($row)) {
	?>

	
		<tr>
			<td> <?php echo $result['@ROWNUM:=@ROWNUM+1']."<br>"?> </td>
			<td> <?php echo $result['CUR_STATE']."<br>" ?> </td>
			<td style="padding-left:10px"><input type="checkbox"> </td>
			<td style="padding-left:30px"> <?php echo $result['SMS_TXT']."<br>" ?> </td>
			<td style="padding-left:10px"> <?php echo $result['CALL_FROM']."<br>" ?> </td>
			<td style="padding-left:10px"> <?php echo $result['CALL_TO']."<br>" ?> </td>
			<td style="padding-left:10px"> <?php echo $result['SENT_DATE']."<br>" ?> </td>
			<td style="padding-left:10px"> <?php echo $result['RSLT_DATE']."<br>" ?> </td>
			<td style="padding-left:10px"> <?php echo $result['REPORT_DATE']."<br>" ?> </td>
			<td style="padding-left:10px"> <?php echo $result['REQ_DATE']."<br>" ?> </td>
			<td></td>
		</tr>
		<?php } ?>
	</table>

</div>