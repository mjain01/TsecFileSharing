
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="jquery-2.2.2.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
      
      .mydiv {
          text-align: center;
      }
      
      
      #myicon1 {
          font-size: 150px;
          color: #FFA500;
      }
      
      #myicon1:hover {
          color: #FFA566;
      }
      
      #myicon2 {
          font-size: 150px;
      }
    
      
      strong {
          font-size: 18px;
      }
      strong a {
          color: #fff;
      }
      
      
      
      
  </style>
</head>
<body style="background-color:black;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">TsecFileSharing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<div classs="mydiv" style="position:absolute;margin-left:450px;margin-top:100px;">
 <a href="student/ssignup.php" ><span id="myicon1" class="glyphicon glyphicon-user"></span></a>
 <br>
    <strong><a href="student/ssignup.php">STUDENT</a></strong>
 </div>
 <div class="mydiv" style="position:absolute;margin-left:650px;margin-top:100px;">
  <a href="teachers/tsignup.php"><span id="myicon2"class="glyphicon glyphicon-user"></span></a><br>
 <strong><a href="teachers/tsignup.php">TEACHER</a><strong>
 </div>
 </body>
 </html>