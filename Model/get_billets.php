<!-- Création du fichier get_billets.php le 08/01/2018-->
<!-- Modif du fichier get_billets.php le 09/01/2018-->
<?php
function get_billets($offset, $limit)
{
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation LIMIT :offset, :limit');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);    /* permet de préciser qu'il s'agit d'un entier */
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);      /* permet de préciser qu'il s'agit d'un entier */
    $req->execute();
    $billets = $req->fetchAll();
    
    
    return $billets;
}
