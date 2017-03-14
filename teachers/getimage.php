<?php

  $sid = $_GET['sid'];
  // do some validation here to ensure id is safe
  $user="root";
  $pass="";
  $db=new mysqli('localhost',$user,$pass,'db');
  
  $sql = "SELECT sphoto FROM std WHERE sid='$sid'";
  $result =$db->query($sql);
  //$row = mysql_fetch_assoc($result);
list($sphoto) = mysqli_fetch_array($result);
  mysqli_close($db);

  header("Content-type: image/jpeg");
  echo $sphoto;
?>