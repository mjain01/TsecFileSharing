<?php

  $tid = $_GET['tid'];
  // do some validation here to ensure id is safe
  $user="root";
  $pass="";
  $db=new mysqli('localhost',$user,$pass,'db');
  
  $sql = "SELECT tphoto FROM teacher WHERE tid='$tid'";
  $result =$db->query($sql);
  //$row = mysql_fetch_assoc($result);
list($tphoto) = mysqli_fetch_array($result);
  mysqli_close($db);

  header("Content-type: image/jpeg");
  echo $tphoto;
?>