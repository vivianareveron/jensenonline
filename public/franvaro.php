<?php
    require_once("../includes/functions.php");
    session_start();
    echo logged_in();   //if-satsen ersatt av en funktion
    include("layout/header.php");

    $pageTitle = "Frånvaro";
    $section = "franvaro";
?>
<link href="css/pages/franvaro.css" rel="stylesheet">

<main> 


</main>
   
<?php
include("layout/footer.php");
?>