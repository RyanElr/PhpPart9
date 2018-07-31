<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice3 Part9</title>
    </head>
    <body>
        <p>
            <?php
            setlocale(LC_TIME, 'fr_FR.utf8');
            //Afficher la localisation (France)
                echo strftime('%A %d %B %Y');
                //Afficher la date, strftime permets de dire la date de la journée
            ?>
        </p>
    </body>
</html>
