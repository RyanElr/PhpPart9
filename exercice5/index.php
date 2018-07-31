<?php
$date = new DateTime('2016-05-16');
$today = new DateTime();
$space = $date-> diff($today);
 ?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8" />
     <title>Exercice5 Part9</title>
   </head>
   <body>
     <p>
     <?php
        echo $space->format('%R%a') . 'Jours';
      ?>
    </p>
   </body>
 </html>
