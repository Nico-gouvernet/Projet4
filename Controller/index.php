<!-- Création du fichier Index.php le 08/01/2018 -->
<?php

// (**Model**)  [.. Je prend les 5 derniers billets dans le fichier get_billets.php ..]
include_once('Model/get_billets.php');
$billets = get_billets(0, 5);

// (**Controller**)  [.. je fait du traitement sur les données ..]
// [.. Sécurisation de l'affichage ..]

foreach($billets as $cle => $billet)
{
    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}
// (**View**) [.. Affichage de la page ..]
include_once('View/index.php');
