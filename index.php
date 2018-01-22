<?php
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page connexion_sql.php ]
include_once('Model/connexion_sql.php');
if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('Controller/index.php'); //------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page index.php]
}
if (isset($_GET['section']) && $_GET['section'] == 'commentaires')
{
    include_once('Controller/commentaires.php');//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page commentaires.php ]
}
if (isset($_GET['section']) && $_GET['section'] == 'log')
{
    include_once('Controller/log.php');//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page log.php ]
}
if (isset($_GET['section']) && $_GET['section'] == 'admin')
{
    include_once('Controller/admin.php');//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page admin.php]
}
