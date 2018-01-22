<?php
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page connexion_sql.php ]
include_once('../../Model/connexion_sql.php');
session_start();
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page billet.php]
include_once('../../Model/billet.php');
$editedBillet = new Billet();
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ récupération des variables nécéssaire a l'envoi]
$id = $_POST['id'];
$titre = $_POST['titre'];
$contenu = $_POST['contenu'];
$editedBillet->editBillet($id, $titre, $contenu);
header('Location: ../../index.php?section=admin');
?>
