<!-- Création du fichier le 09/01/2018 
Mise en place de la fonction get_billet-->
<?php
function get_billet ($billetId)
{
        global $bdd;
        $billetId = (int) $billetId;
        
        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = :billetId');
        $req->bindParam(':billetId', $billetId, PDO::PARAM_INT);    /* permet de préciser qu'il s'agit d'un entier */
        $req->execute();
        $billet = $req->fetch();
        
        return $billet;        
}
  
