

<?php
 include "loginsession.php";
     //result 페이지로 들어오면 세션유무 부터판단
	if(!$login_session){
 echo "<script>alert('로그인 해주세요');location.href='login.php'; </script>";
	}

include "../header/header.php"
?>

<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>






</html>
