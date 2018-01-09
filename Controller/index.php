<!-- Création du fichier Index.php le 08/01/2018 -->
<!-- Modification du fichier Index.php le 09/01/2018 -->

<?php
// (**Model**)  [.. Je prend les billets voulu dans le fichier get_billets.php ..]
include_once('Model/get_billets.php');
if(isset($_GET['page']) AND ctype_digit($_GET['page']))
{
    $page = ($_GET['page'] * 5) - 5;
}    
else
{
    $page = 0;
}
$billets = get_billets($page, 5);

// Nombre de pages 
include_once('Model/pagination.php');

// (**Controller**)  [.. je fait du traitement sur les données ..]
// [.. Sécurisation de l'affichage ..]
foreach($billets as $cle => $billet)
{
    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}
// (**View**) [.. Affichage de la page ..]
include_once('View/index.php');
