 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
  <?php 
//session_start();

session_start();
$comment=$_POST["in"];
$sid=$_SESSION["sid"];
$tid=$_SESSION["tid"];
//$sid=$_GET["sid"];
  $user="root";
  $pass="";
  $db=new mysqli('localhost',$user,$pass,'db');
  
  $sql = "SELECT sname FROM std WHERE sid='$sid'";
  $result =$db->query($sql);
  //$row = mysql_fetch_assoc($result);
list($sname) = mysqli_fetch_array($result);
  mysqli_close($db);

  //header("Content-type: image/jpeg");
  echo $sname;
?>
</head>
<body style="background-color:black;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="shome.php?sid=<?php echo urlencode($sid);?>">TsecFileSharing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="shome.php?sid=<?php echo urlencode($sid);?>">Home</a></li>
      <li><a href="smsg.php?sid=<?php echo urlencode($sid);?>">Messages</a>
        
       
      </li>
      <li><a href="dwnld.php?sid=<?php echo urlencode($sid); ?>">NOTES</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      	<li><img src="photo.php?id=<?php echo urlencode($sid); ?>" width=40px height=40px style="padding-top:5px" /><span style="display:inline; white-space:nowrap; color:#9d9d9d;margin-top:50px;font-size:14px;line-height:10px">welcome <?php echo $sname; ?></span></li>

	  <li><a href="../home.php"><span class="glyphicon glyphicon-user"></span> LOG OUT</a></li>
    </ul>
  </div>
</nav>

<?php 
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');

$sql="INSERT INTO chat(comment,tid,sid,st)
VALUES (?,?,?,?);";
$stmt = $db->prepare($sql);
$st="s";
$stmt->bind_param("ssss", $comment, $tid, $sid,$st);
$stmt->execute();

?>
<div style="text-align:center; FONT-SIZE:18px;">
  <h1 style="font-size:24;color:green;"><strong>SUCCESSFULLY POSTED</strong></h1>
  <br>
<a href="smsg1.php?sid=<?php  echo urlencode($sid); ?>&tid=<?php echo urlencode($tid); ?>">CLICK HERE TO BACK</a>
  </div>

</body>
</html>