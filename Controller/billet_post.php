<?php
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page connexion_sql.php ]
include_once('../../Model/connexion_sql.php');
session_start();
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page billet.php ]
include_once('../../Model/billet.php');
$envoiBillet = new Billet();
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ récupération des variables nécéssaire a l'envoi ]
$titre = $_POST['titre'];
$contenu = $_POST['contenu'];
$envoiBillet->sendBillet($titre, $contenu);
header('Location: ../../index.php?section=admin');
?>
