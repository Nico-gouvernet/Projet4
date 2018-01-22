<?php
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page connexion_sql.php ]
include_once('../../Model/connexion_sql.php');
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page commentaire.php ]
include_once('../../Model/commentaire.php');
$envoiCommentaire = new Commentaire();
//------------------------------------------------------------------------------------------------------------>>>>>>>>>>>>>>>>>>>[ récupération des variables nécéssaire a l'envoi]
$id_billet = $_POST['id_billet'];
$auteur = $_POST['auteur'];
$commentaire = $_POST['commentaire'];

if (empty($_POST['auteur']) || empty($_POST['commentaire']))
{
    echo"<p>Veuillez remplir tous les champs</p> <a href=../../index.php?section=commentaires&billet=$id_billet>Retour à la page</a>";
}
else
{       
    $envoiCommentaire->sendCommentaire($id_billet, $auteur, $commentaire);
//------------------------------------------------------------------------------------------------------------>>>>>>>>>>>>>>>>>>>[Redirection du visiteur vers la page des commentaires du billet]
    header('Refresh:5;url=../../index.php?section=commentaires&billet=' . $id_billet);
    echo 'Commentaire validé. <br /> Vous allez revenir à la page des commentaires dans instant.';  
}
?>
