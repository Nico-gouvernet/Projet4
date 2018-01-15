<!-- Création du fichier le 09/01/2018 -->
<!-- Modification du fichier le 15/01/2018 -->

<?php
// (**Model**)  [..Reprise du  (objet) billet dans le dossier Model fichier billet.php ..]
include_once('Model/billet.php');
$billet = new Billet();

//recupération du billet
$billet->getById($_GET['billet']);

// (**Model**)  [..Reprise des commentaires dans le dossier Model fichier get_commentaires.php ..]
include_once('Model/get_commentaires.php');
$commentaires = get_commentaires($_GET['billet']);

// (**View**)  [..Affichage de la vue ..]
include_once('View/commentaires.php');
