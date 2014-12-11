<?php
    require_once("../includes/functions.php");
    session_start();
    echo logged_in();   //if-satsen ersatt av en funktion  
    include("layout/header.php");
    
    $pageTitle = "Mina uppgifter";
    $section = "minauppgifter";
?>
<link href="css/pages/minauppgifter.css" rel="stylesheet">

<main> 


</main>
   
<?php
include("layout/footer.php");
?>