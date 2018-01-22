<?php
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ajout de l'objet billet]
include_once('Model/billet.php');
$billet = new Billet();
//---------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>> [recupération du billet]
$id_billet = $_GET['billet'];
$billet->getById($id_billet);
//------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>> [recuperation des commentaires]
include_once('Model/commentaire.php');
$commentaire = new Commentaire();
$commentaires = $commentaire->getForId($_GET['billet']);
//----------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>[creation de l'objet pour signaler un commentaire]
$commentaireAdmin = new Commentaire();
//------------------------------------------------------------------------------------------------------------>>>>>>>>>>>>>>>>>>> [on affiche la View]
include_once('View/commentaires.php');
