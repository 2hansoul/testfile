<?php

  if($_POST['pass'] != $_POST['passcheck']){
    echo "비밀번호 불일치";
	return false;
   }else{
     echo "일치";
   }
 ?>