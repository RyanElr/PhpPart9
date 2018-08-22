<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css">
  <title>TP Part9</title>
</head>
<body>
                    <form action="index.php" method="POST">
                        <?php
                        //création d'un tableau correspondant au mois de l'année
                        $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
                        ?>
                        <select name="month">
                            <?php
                            $indice = 1;
                            foreach ($months as $month) {
                                ?>
                                <option 
                                <?php
                                if (empty($_POST['month'])) {
                                    echo '';
                                } elseif ($_POST['month'] == $indice) {
                                    // Selected permet de garder en mémoire l'année ou le mois séléctionné.
                                    echo 'selected';
                                }
                                ?> value="<?php echo $indice++ ?>">
                                    <?php echo $month; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <select name="years">
                            <?php
                            // implémentation des années comprises dans le calendrier.
                            for ($year = 1925; $year <= 2050; $year++) {
                                ?>
                                <option <?php
                                // si aucun choix affichage de l'année en cours
                                if (empty($_POST['years']) && ($year == date('Y'))) {
                                    echo 'selected';
                                    //si selection affichage de la date sélectionée
                                } elseif (!empty($_POST['years']) && $_POST['years'] == $year) {
                                    // Selected garde en mémoire la date sélectionée.
                                    echo 'selected';
                                };
                                ?> value="<?php echo $year ?>"><?php echo $year; ?></option>
                                    <?php
                                }
                                ?>
                        </select>
                        <input class="btn btn-primary" type="submit" value="Valider"/>
                    </form>
                    <?php
                    //si le mois est l'année ne sont pas vide :
                    if (isset($_POST['month']) && isset($_POST['years'])) {
                        // cal_days_in_month compte le nombre de jours dans un mois.
                        // CAL_GREGORIAN est une référence au calendrier grégorien.
                        $calendar = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['years']);
                        // tableau des jours de la semaine.
                        $daysOfWeek = ['LUNDI', 'MARDI', 'MERCREDI', 'JEUDI', 'VENDREDI', 'SAMEDI', 'DIMANCHE'];
                        //$firstDay = le premier jour du mois.
                        $firstDay = date('w', mktime(0, 0, 0, $_POST['month'], 1, $_POST['years']));
                        //$lastDay = le dernier jour du mois.
                        $lastDay = date('w', mktime(0, 0, 0, $_POST['month'], $calendar, $_POST['years']));
                        //$differenceLastDay = différence des jours restant dans la dernière semaine.
                        $differenceInWeek = 7 - $lastDay;
                        ?>
                        <table>
                            <?php
                            if (isset($_POST['month']) && isset($_POST['years'])) {
                                ?>
                                <h1><?php echo $months[$_POST['month'] - 1] . ' ' . $_POST['years']; ?></h1>
                                <?php
                            }
                            ?>
                            <tr>
                                <?php
                                foreach ($daysOfWeek as $inWeek) {
                                    ?>
                                    <th class="col-lg-1"><?php echo $inWeek; ?></th>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                            // dimanche est égal au jour 7 de la semaine vu que date() le considère comme le premier
                            if ($firstDay == 0) {
                                $firstDay = 7;
                            }
                            $days = 1;
                            // création du tableau
                            for ($i = 1; $i <= $calendar + ($firstDay - 1); $i++) {
                                if ($i % 7 == 1) {
                                    ?>
                                    <tr> 
                                        <?php
                                    }
                                    if ($i >= $firstDay) {
                                        ?>
                                        <td><?php echo $days;
                                            $days++; ?></td>
                                        <?php
                                    } else {
                                        ?>
                                        <td class="noDays"></td>
                                        <?php
                                    }
                                }
                                // Calcul des derniers jours du mois si vide.
                                for ($a = 1; $a <= $differenceInWeek; $a++) {
                                    if ($a < $calendar && $lastDay != 0) {
                                        ?>
                                        <td></td>
                                        <?php
                                    }
                                }
                            }
                            ?>
                    </table>

                </body>
                </html>
