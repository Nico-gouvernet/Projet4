<!-- Création du fichier Index.php le 08/01/2018 -->
<!-- Modification du fichier Index.php le 09/01/2018 -->
<!-- Modification du fichier Index.php le 15/01/2018 -->

<?php
// (**Model**)  [.. Je prend les billets voulu dans le fichier billet.php ..]
include_once('Model/billet.php');
$billet = new Billet();
$nbPage = $billet->getPageNb();
// On calcul la page voulu
if(array_key_exists("page", $_GET) && isset($_GET['page']) && ctype_digit($_GET['page']))
{
    $page = ($_GET['page'] * 5) - 5;
    $ixPage = $_GET['page'];
    // Dépassement de la limite Max =>
    if($_GET['page'] > $nbPage) 
    {
        $page = ($nbPage*5) -5;
        $ixPage = $nbPage;
    }
    // Dépassement de la limite Min =>
    if($_GET['page'] < 1)
    {
        $page = 0;
        $ixPage = 1;
    }
}    
else
{
    $page = 0;
    $ixPage = 1;
}
//on demande les billets
$billets = $billet->getByPage($page, 5);
// (**Controller**)  [.. je fait du traitement sur les données ..]
// [.. Sécurisation de l'affichage ..]
foreach($billets as $cle => $billet)
{
    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
    $billets[$cle]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
}
// (**View**) [.. Affichage de la page ..]
include_once('View/index.php');
