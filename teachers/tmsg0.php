<html lang="en">
<?php
//$tid=$_SESSION["tid"];
$tid=$_GET["tid"];
$sid=$_GET['sid'];
  //$sid = $_GET['sid'];
  // do some validation here to ensure id is safe
  $user="root";
  $pass="";
  $db=new mysqli('localhost',$user,$pass,'db');
  
  $sql = "SELECT tname FROM teacher WHERE tid='$tid'";
  $result =$db->query($sql);
  //$row = mysql_fetch_assoc($result);
list($tname) = mysqli_fetch_array($result);
  mysqli_close($db);

  //header("Content-type: image/jpeg");
 // echo $sname; 
//$tid=$_GET["tid"];
?>
<head>
  <title>TsecFileSharing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <body style="background-image:url(b.png);background-repeat:no-repeat;background-size:cover;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="thome.php?tid=<?php echo urlencode($tid);?>">TsecFileSharing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="thome.php?tid=<?php echo urlencode($tid);?>">Home</a></li>
      <li><a href="tmsg.php?tid=<?php echo urlencode($tid);?>">Messages</a>
      </li>
      <li><a href="upload.php?tid=<?php echo urlencode($tid);?>">Upload</a></li>
    	        <li><a href="vpn.php?tid=<?php echo urlencode($tid); ?>">MY NOTES</a></li>

	</ul>
    <ul class="nav navbar-nav navbar-right">
	      	<li><img src="photo.php?id=<?php echo urlencode($tid); ?>" width=40px height=40px style="padding-top:5px" />
			<span style="display:inline; white-space:nowrap; color:#9d9d9d;margin-top:50px;font-size:14px;line-height:10px">welcome <?php echo $tname; ?></span></li>

      <li><a href="../home.php"><span class="glyphicon glyphicon-user"></span> LOG OUT</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
</div>
<?php 
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');
//$sid=$_GET["sid"];
//$tid=$_GET["tid"];
session_start();
if(isset($_GET['tid'])&&isset($_GET['sid']))
{
$tid=$_GET['tid'];
$sid=$_GET['sid'];
}
else if(isset($_SESSION["tid"])&&isset($_SESSION["sid"]))
{
	$tid=$_SESSION["tid"];
$sid=$_SESSION["sid"];
	}
	$_SESSION["tid"]=$tid;
$_SESSION["sid"]=$sid;
?>
<h1 style="text-align:center;"><?php $sql="select sname from std where sid='$sid';";$result=$db->query($sql);
list($sname) = mysqli_fetch_array($result); echo $sname;?></h1>
<?php
$sql="select comment,st from chat where tid='$tid' and sid='$sid';";
$result=$db->query($sql);
if($result->num_rows>0)
{

while(list($comment, $st) = mysqli_fetch_array($result))	
{
	?><div style="font-size:24px;text-align:center;color:black">
			<?php echo " ".$st.":".$comment."<br>";?>
		 </div>
		 <?php
	}
}
?>
<form  method="post"style="text-align:center" >
<input type="text" name="in" style="width:400px;"/>
<?PHP 
//session_start();
//$_SESSION["tid"]=$tid;
//$_SESSION["sid"]=$sid;
if(isset($_POST["in"]))
{
$comment=$_POST["in"];
$sql="INSERT INTO chat(comment,tid,sid,st)
VALUES (?,?,?,?);";

$stmt = $db->prepare($sql);
$st="t";
$stmt->bind_param("ssss", $comment, $tid, $sid,$st);
$stmt->execute();
header("refresh:0");
}
?>
<input type="submit" />
</form>

</body>
</html>
