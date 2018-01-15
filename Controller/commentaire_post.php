<!-- Création du fichier le 15/01/18-->
<?php
include_once('../../Model/connexion_sql.php');
include_once('../../Model/commentaire.php');
$envoiCommentaire = new Commentaire();
// récupération des variables nécéssaire a l'envoi
$id_billet = $_POST['id_billet'];
$auteur = $_POST['auteur'];
$commentaire = $_POST['commentaire'];
$envoiCommentaire->sendCommentaire($id_billet, $auteur, $commentaire);
// Redirection du visiteur vers la page des commentaires du billet
header('Location: ../../index.php?section=commentaires&billet=' . $id_billet);
?>
