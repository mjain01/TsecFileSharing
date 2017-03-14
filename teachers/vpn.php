<html>
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../teachers/mycss.css">
</head>
    <style>
        #m{
        font-size: 20px;
        }
    </style>
<?php 
$tid=$_GET["tid"];
  $user="root";
  $pass="";
  $db=new mysqli('localhost',$user,$pass,'db');
  
  $sql = "SELECT tname FROM teacher WHERE tid='$tid'";
  $result =$db->query($sql);
list($tname) = mysqli_fetch_array($result);
  mysqli_close($db);
?>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="thome.php?tid=<?php echo urlencode($tid);?>">TsecFileSharing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="thome.php?tid=<?php echo urlencode($tid); ?>">Home</a></li>
      <li><a href="tmsg.php?tid=<?php echo urlencode($tid); ?>">MESSAGES</a>
        
       
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
	      	<li><img src="photo.php?id=<?php echo urlencode($tid); ?>" width=40px height=40px style="padding-top:5px" /><span style="display:inline; white-space:nowrap; color:#9d9d9d;margin-top:50px;font-size:14px;line-height:10px">welcome <?php echo $tname; ?></span></li>

      <li><a href="../home.php"><span class="glyphicon glyphicon-log-in"></span> LOG OUT</a></li>
    </ul>
  </div>
</nav>

<?php
//include 'library/config.php';
//include 'library/opendb.php';
$user="root";
$pass="";
$db=new mysqli('localhost',$user,$pass,'db');
//include 'library/config.php';
//include 'library/opendb.php';
$query = "SELECT id, name,comment FROM upload where tid='$tid';";
$result = $db->query($query) or die('Error, query failed');
if(mysqli_num_rows($result) == 0)
{
echo "Database is empty <br>";
} 
else
{
	$i=0;
while(list($id, $name,$comment) = mysqli_fetch_array($result))
{
	if($i==0)
	{
		?>
		<div class="row">
<?php
	}
	$i++;
?>

  <div class="col-sm-4"style="text-align:center">
      <div id="m">
<img src="file.png" width="140px" height="140px" ><br>
<a href="download.php?id=<?php echo urlencode($id);?>&name=<?php echo urlencode($name);?>"><?php echo $name;?></a><br><?php 
echo "comment:".$comment;
?>
      </div><br> <br>
</div>
<?php 
if($i==3)
{
	$i=0;
	?></div>
	<br>
	<?php
}
}
}
//include 'library/closedb.php';
?>
</body>
</html>