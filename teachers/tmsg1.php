<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<body style="background-color:black;">
<?php 
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');
session_start();
$comment=$_POST["in"];
$sid=$_SESSION["sid"];
$tid=$_SESSION["tid"];
$sql="INSERT INTO chat(comment,tid,sid,st)
VALUES (?,?,?,?);";
//$sql="INSERT INTO teacher (tname,tid,temail,tbr,tpass)
//VALUES (?,?,?,?,?);";

$stmt = $db->prepare($sql);
$st="t";
$stmt->bind_param("ssss", $comment, $tid, $sid,$st);
$stmt->execute();
?>
<div id="mydiv" style="background:none; text-align:center;">
<h1 style="color:green;">SUCESSFULLY POSTED</H1></BR>
<a href="tmsg0.php?sid=<?php  echo urlencode($sid); ?>&tid=<?php echo urlencode($tid); ?>">CLICK ME TO RETURN</a>
</BODY>
</html>
