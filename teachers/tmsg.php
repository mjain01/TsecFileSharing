 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../teachers/mycss.css">

  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
  <?php 
$tid=$_GET['tid'];
//$sid=$_GET['sid'];
  $user="root";
  $pass="";
  $db=new mysqli('localhost',$user,$pass,'db');
  
  $sql = "SELECT tname FROM teacher WHERE tid='$tid'";
  $result =$db->query($sql);
  list($tname)=mysqli_fetch_array($result);
  mysqli_close($db);

?>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="thome.php?tid=<?php echo urlencode($tid); ?>">TsecFileSharing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="thome.php">Home</a></li>
      <li><a href="tmsg.php?tid=<?php echo urlencode($tid);?>">Messages</a>
        
       
      </li>
      <li><a href="upload.php?tid=<?php echo urlencode($tid); ?>">Upload</a></li>
    	        <li><a href="vpn.php?tid=<?php echo urlencode($tid); ?>">MY NOTES</a></li>

	</ul>
    <ul class="nav navbar-nav navbar-right">
	      	<li><img src="photo.php?id=<?php echo urlencode($tid); ?>" width=40px height=40px style="padding-top:5px" /><span style="display:inline; white-space:nowrap; color:#9d9d9d;margin-top:50px;font-size:14px;line-height:10px">welcome <?php echo $tname; ?></span></li>

      <li><a href="../home.php"><span class="glyphicon glyphicon-user"></span> LOG OUT</a></li>
    </ul>
  </div>
</nav>
<h1 style="text-align:center;">STUDENTS</h1>
<?php 
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');
$tid=$_GET["tid"];
$sql="select tbr from teacher where tid='$tid'";
$result=$db->query($sql);
$tbr=" ";
if($result->num_rows>0)
{
list($tbr) = mysqli_fetch_array($result);
echo $tbr;
}
$sql="select sname,sid from std where sbr='$tbr';";
$result=$db->query($sql) or die("could");
if($result->num_rows>0)
{
	$i=0;
	?>
	
	<?php
while(list($sname, $sid) = mysqli_fetch_array($result))	
{
	if($i==0)

{	
?>
<div class="row">
<?php
}
$i++;
?>
  <div class="col-sm-4" style="text-align:center;">

		 <img src="getimage.php?sid=<?php  echo urlencode($sid); ?>" width="140" height="140" />		<br>
		 <a href="tmsg0.php?tid=<?php echo urlencode($tid); ?>&sid=<?php echo urlencode($sid); ?>"><?php echo urlencode($sname); ?></a>
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
</body>
</html>