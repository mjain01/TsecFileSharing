<?php
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');
//echo "hellllllllllllllllllllllll";
 $sid=$_POST["id"];
$spass=$_POST["pwd"];
 echo $tid;
 echo $tpass;
$sql="select sid from std where sid='$sid' and spass='$spass';";
//  $sql="select tid from teacher where tid='1' and tpass='123456789';";
$result=$db->query($sql);
//if(row["tpass"]==$tpass)
if ($result->num_rows > 0) 
// while(list($tid) = mysqli_fetch_array($result))
{
	
	 echo $tid;
	  SESSION_START();
	$_SESSION['sid']=$sid;
	 header("Refresh:1;url=shome.php");

 }
 else
 {
	    echo "EITHER YOUR ID OR PASSWORD IS WRONG";
	 	 header("Refresh:30;url=signin.php");

 }
 ?>