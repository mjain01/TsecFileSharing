
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
session_start();

$tid=$_SESSION["tid"];

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
  //echo $sname;

?>
</head>
<body style="background-color:black;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="thome.php?tid=<?php echo urlencode($tid);?>">TsecFileSharing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="thome.php?tid=<?php echo urlencode($tid);?>">Home</a></li>
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
  
<div class="container">
</div>

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="../tsecedit.jpg">
        <div class="carousel-caption">
          <h3>ABOUT</h3>
        </div>
      </div>

      <div class="item">
        <img src="../fest.jpg"  width="460" height="345">
        <div class="carousel-caption">
          <h3>FEST IN TSEC</h3>
        </div>
      </div>
    
      <div class="item">
        <img src="../alumniedit.png" width="460" height="345">
        <div class="carousel-caption">
          <h3>ALUMNI</h3>
        </div>
      </div>

  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>