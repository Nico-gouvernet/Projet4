<?php 
//on Suprime le précédent mot de passe
session_start();
session_destroy();
//on Montre la page
include_once('View/log.php');
