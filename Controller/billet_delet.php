<?php
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page connexion_sql.php ]
include_once('../Model/connexion_sql.php');
session_start();
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page billet.php]
include_once('../Model/billet.php');
$deletBillet = new Billet();
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [récupération de variable nécéssaire à la suppression]
$id = $_POST['id'];
$deletBillet->deletBilletById ($id);
header('Location: ../index.php?section=admin');
?>
