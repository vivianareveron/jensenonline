<!DOCTYPE html>
<html lang="">
<head>
   <meta charset="utf-8">
    <Title><?php echo $pageTitle; ?></Title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
            rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
</head>
    <body>


<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="frontpage.php"><img src=img/Jensen.gif> </a>
      
        <div class="nav-collapse">
        <ul class="nav pull-right">

          <li ><a href="profile.php" ><i class="icon-user"></i> Min Profil</a>

          </li>
          <li><a href="logout.php" ><i class="icon-signout"></i> Logga ut </a>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="<?php if($section == "dashboard") {echo "active";} ?>"><a href="frontpage.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li class="<?php if($section == "minakurser") {echo "active";} ?>"><a href="minakurser.php"><i class="icon-list-alt"></i><span>Mina kurser</span> </a> </li>
        <li class="<?php if($section == "meddelanden") {echo "active";} ?>"><a href="meddelanden.php"><i class="icon-envelope"></i><span>Meddelanden</span> </a></li>
        <li class="<?php if($section == "minklass") {echo "active";} ?>"><a href="minklass.php"><i class="icon-group"></i><span>Min klass</span> </a> </li>
        <li class="<?php if($section == "minauppgifter") {echo "active";} ?>"><a href="minauppgifter.php"><i class="icon-upload"></i><span>Mina uppgifter</span> </a> </li>
        <li class="<?php if($section == "chat") {echo "active";} ?>"><a href="chat.php"><i class="icon-comment"></i><span>Chat</span> </a> </li>  
        <li class="<?php if($section == "franvaro") {echo "active";} ?>"><a href="franvaro.php" > <i class="icon-ok-sign"></i><span>Frånvaro</span> </a> </li>
        
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->