<!-- Création du fichier le 09/01/2018 
Mise en place de la fonction get_commentaires-->

<?php
function get_commentaires ($billetId)
{    
    global $bdd;
    $billetId = (int) $billetId;
    
    $req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = :billetId ORDER BY date_commentaire');
    $req->bindParam(':billetId', $billetId, PDO::PARAM_INT);   
    $req->execute();
    $commentaires = $req->fetchAll();
    return $commentaires;
}
