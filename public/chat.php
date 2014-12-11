<?php
    require_once("../includes/functions.php");
    session_start();
    echo logged_in();   //if-satsen ersatt av en funktion
    include("layout/header.php");
    
    $pageTitle = "Chat";
    $section = "chat";
?>

<link href="css/pages/chat.css" rel="stylesheet">




<!-- Footer -->    
<?php
include("layout/footer.php");
?>


<!-- ================================================== --> 
<!-- Scripts --> 
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script> 
  

