<?php
    require_once("../includes/functions.php");
    session_start();
    echo logged_in();   //if-satsen ersatt av en funktion 
    include("layout/header.php");

    $pageTitle = "Mina kurser";
    $section = "minakurser";
?>
<link href="css/pages/minakurser.css" rel="stylesheet">

<main> 


</main>
    
<?php
include("layout/footer.php");
?>