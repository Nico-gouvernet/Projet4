<?php
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page connexion_sql.php ]
include_once('../../Model/connexion_sql.php');
session_start();
if (isset($_SESSION['encodedPassword'])) 
{
    $est_connecte = true;
}
else 
{
    $est_connecte = false;
}
if ($est_connecte) 
{
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page billet.php]
    include_once('../../Model/billet.php');
    $editBillet = new Billet();
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [récupération des variables nécéssaire a l'édition']
    $id = $_POST['modifierBillet'];
    $editBillet->getById($id);
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page billet_edit.php]
    include_once("../../View/billet_edit.php");
}
?>
