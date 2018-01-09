<?php
include_once('Model/connexion_sql.php');
if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('Controller/index.php');
}
include_once('modele/connexion_sql.php');
include_once('controleur/blog/commentaires.php');
