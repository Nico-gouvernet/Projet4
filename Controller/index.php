<?php
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [on inclu la class et on créé l'objet billet nécéssaire au calcul]
include_once('Model/billet.php');
$billet = new Billet();
$nbPage = $billet->getPageNb();
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [On calcul la page voulu]
if(array_key_exists("page", $_GET) && isset($_GET['page']) && ctype_digit($_GET['page']))
{
    $page = ($_GET['page'] * 5) - 5;
    $ixPage = $_GET['page'];
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [Si on a dépassé la limite max => limite max-]

    if($_GET['page'] > $nbPage) 
    {
        $page = ($nbPage*5) -5;
        $ixPage = $nbPage;
    }
 //------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [Si on a dépassé la limite min => limite min-]
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
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [on demande les billets]
$billets = $billet->getByPage($page, 5);
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page (View]
include_once('View/index.php');
