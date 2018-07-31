<?php
if (!empty($_POST)) {
  //Définition des mois et années
    if (isset($_POST['month']) && isset($_POST['year'])) {
        $monthNum = $_POST['month'];
        $yearNum = $_POST['year'];
        //Définition des jours et des variables jour.
        $dateStart = getdate(mktime(0, 0, 0, $monthNum, 1, $yearNum));
        $firstWeekDay = ($dateStart['wday'] + 6) % 7;
        $foundLastDay = false;
        $dayStartCheck = 29;
        //Nombre de jours
        while ($dayStartCheck <= 33 && !$foundLastDay) {
            $dateStart = getdate(mktime(0, 0, 0, $monthNum, $dayStartCheck, $yearNum));
            if ($dateStart['mon'] != $monthNum) {
                $lastDay = $dayStartCheck - 1;
                $foundLastDay = true;
            }
            $dayStartCheck++;
        }
        $calendarDay = 1;
    }
}
?>
