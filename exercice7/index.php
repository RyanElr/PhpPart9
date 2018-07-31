<?php
//strtotime est une sorte de fonction qui permets d'aller vers la date que l'on veut , en l'occurrence 20 jours de plus ici.
$nextDay = strtotime('+20days');
 ?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
     <head>
         <meta charset="utf-8" />
         <title>Exercice7 Part9</title>
     </head>
     <body>
         <p>
             <?php
             //Affichage de la date
                 echo date('d/m/Y',$nextDay);
             ?>
         </p>
     </body>
 </html>
