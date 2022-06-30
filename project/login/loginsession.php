<?php
  session_start();
  //isset null값이 아니라면 true
  if( isset( $_SESSION[ 'id' ] ) ) {
    $login_session = TRUE;
  }
?>