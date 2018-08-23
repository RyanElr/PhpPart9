<?php
 //On utilise CAL_GREGORIAN qui permet de faire référence au calendrier grégorien.
$numberDays = cal_days_in_month(CAL_GREGORIAN, 2, 2016)
 ?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8" />
     <title>Exercice6 Part9</title>
   </head>
   <body>
     <p>
       <?php
       echo 'Il y a ' . $numberDays . ' jours dans le mois de Février en 2016   .';
        ?>
     </p>
   </body>
 </html>
