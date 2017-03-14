<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../teachers/mycss.css">
<?php 
$sid=$_GET['sid'];
  $user="root";
  $pass="";
  $db=new mysqli('localhost',$user,$pass,'db');
  
  $sql = "SELECT sname FROM std WHERE sid='$sid'";
  $result =$db->query($sql);
  //$row = mysql_fetch_assoc($result);
list($sname) = mysqli_fetch_array($result);
  mysqli_close($db);

  //header("Content-type: image/jpeg");
  //echo $sname;
?>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
</head>
<body style="background-color:black;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="shome.php?sid=<?php echo urlencode($sid); ?>">TsecFileSharing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="shome.php?sid=<?php echo urlencode($sid); ?>">Home</a></li>
      <li><a href="smsg.php?sid=<?php echo urlencode($sid); ?>">MESSAGES </a>
        
       
      </li>
      <li><a href="dwnld.php?sid=<?php echo urlencode($sid); ?>">NOTES</a></li>
     
    </ul>
    <ul class="nav navbar-nav navbar-right">
	<li><img src="photo.php?id=<?php echo urlencode($sid); ?>" width=40px height=40px style="padding-top:5px" /><span style="display:inline; white-space:nowrap; color:#9d9d9d;margin-top:50px;font-size:14px;line-height:10px">welcome <?php echo $sname; ?></span></li>
     
	 <li><a href="../home.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  <div style="text-align:center;font-size:24px;">
  <h1><strong>FACULTIES</STRONG></h1>
<?php 
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');
$sid=$_GET["sid"];
$sql="select sbr from std where sid='$sid'";
$result=$db->query($sql);
$sbr=" ";
if($result->num_rows>0)
{
list($sbr) = mysqli_fetch_array($result);

}
$sql="select tname,tid from teacher where tbr='$sbr'";
$result=$db->query($sql);
if($result->num_rows>0)
{
	$i=0;
	?>
	
	<?php
while(list($tname, $tid) = mysqli_fetch_array($result))	
{
	if($i==0)

{	
?>
<div class="row">
<?php
}
$i++;
?>
  <div class="col-sm-4">

		 <img src="getimage.php?tid=<?php  echo urlencode($tid); ?>" width="140" height="140" />		<br>
		 <a href="smsg1.php?sid=<?php echo urlencode($sid); ?>&tid=<?php echo urlencode($tid); ?>"><?php echo urlencode($tname); ?></a>
	</div>
		 <?php
		 if($i==3)
		 {
			 $i=0;
			 ?>
			 </div>
			 <br>
			 <br>
			 <br>
			 <?php
		 }
}
}

/*$sql="select comment,st from chat where tid='$tid'";
$result=$db->query($sql);

if($result->num_rows>0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		 echo " " . $row["st"]. ":".$row["comment"]. "<br>";
	}
}*/
?>
</table>
</div>
</body>
</html>
