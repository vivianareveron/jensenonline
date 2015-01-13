<?php
$title = $_SESSION['title'];

     if($title == 'Admin')  {
        echo '<a href="one.php"><input type="button" value= "Click Me once!" header="one.php"></a><br><br>';
        echo '<a href="two.php"><input type="button" value= "Click Me twice!"></a><br><br>';
        echo '<a href="three.php"><input type="button" value= "Click Me three times!"></a><br><br>';
    } elseif($title == 'Staff') {
          echo '<a href="two.php"><input type="button" value= "Click Me twice!"></a><br><br>';
         echo '<a href="three.php"><input type="button" value= "Click Me three times!"></a><br><br>';
     } else
         echo '<a href="three.php"><input type="button" value= "Click Me three times!"></a><br><br>';
?>
