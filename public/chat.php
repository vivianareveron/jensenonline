<?php
    require_once("../includes/functions.php");
    session_start();
    echo logged_in();   //if-satsen ersatt av en funktion
    include("layout/header.php");
    
    $pageTitle = "Chat";
    $section = "chat";
?>
<link href="css/pages/chat.css" rel="stylesheet">

<main> 


</main>
    
<?php
include("layout/footer.php");
?>