<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php");?>
<?php include("layout/header.php"); ?>

<?php
    $pageTitle = "Chat";
    $section = "chat";
?>
<link href="css/pages/chat.css" rel="stylesheet">

<main> 
        <h1>Chat</h1>
        <?php echo logged_in(); ?>

</main>
    
<?php
include("layout/footer.php");
?>