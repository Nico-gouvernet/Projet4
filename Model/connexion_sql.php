<!-- Mise en place de la conexion pouur la $bdd  le 08/01/2018-->
<!-- Pour le moment connexion à la $bdd avec wamp en local car le projet n'est pas mis sur le serveur de OVH !! -->
<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog', 'root', ''); 
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
