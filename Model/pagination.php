<?php
    //calcul du nombre de pages 
    $requeteNbLigne = $bdd->query ('SELECT COUNT(id) as countid FROM billets');
    $nbLigne = $requeteNbLigne->fetch();
    $nbPage = (int)($nbLigne['countid']/5) + 1;
?>
