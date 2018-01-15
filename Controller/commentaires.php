<!-- Création du fichier le 09/01/2018 -->
<!-- Modification du fichier 2fois le 15/01/2018 -->

<?php
// (**Model**)  [..Reprise du  (objet) billet dans le dossier Model fichier billet.php ..]
include_once('Model/billet.php');
$billet = new Billet();

//recupération du billet
$id_billet = $_GET['billet'];
$billet->getById($id_billet);

// (**Model**)  [..Reprise des commentaires dans le dossier Model fichier get_commentaires.php ..]
include_once('Model/commentaire.php');
$commentaire = new Commentaire();
$commentaires = $commentaire->getForId($_GET['billet']);

// (**View**)  [..Affichage de la vue ..]
include_once('View/commentaires.php');
