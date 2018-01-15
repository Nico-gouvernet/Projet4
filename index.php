<?php
include_once('Model/connexion_sql.php');
if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('Controller/index.php');
}
if (isset($_GET['section']) && $_GET['section'] == 'commentaires')
{
    include_once('Controller/commentaires.php');
}
