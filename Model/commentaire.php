<!-- Création du fichier le 15/01/2018 -->
<?php
class Commentaire
{
    // Propriétés
    private $_id;
    private $_id_billet;
    private $_auteur;
    private $_commentaire;
    private $_date_commentaire_fr;
    //Getters et setters
    public function getId() 
    {
        return $this->_id;
    }
    public function getId_billet() 
    {
        return $this->_id_billet;
    }    
    public function getAuteur() 
    {
        return $this->_auteur;
    }  
    public function getCommentaire() 
    {
        return $this->_commentaire;
    }  
    public function getDate_commentaire_fr() 
    {
        return $this->_date_commentaire_fr;
    }  
    
    public function setId($id) 
    {
       $id = (int) $id;
       if ($id > 0)
            {
               $this->_id = $id;        
            }        
    }
    public function setId_billet($id_billet) 
    {
       $id_billet = (int) $id_billet;
       if ($id_billet > 0)
            {
               $this->_id_billet = $id_billet;        
            }        
    }
    public function setAuteur($auteur) 
    {
        if (is_string($auteur))        
        {        
            $this->_auteur = $auteur;        
        }
    }
    public function setCommentaire($commentaire) 
    {
        if (is_string($commentaire))        
        {        
            $this->_commentaire = $commentaire;        
        }
    }
    public function setDate_creation_fr($date_commentaire_fr) 
    {
        if (is_string($date_commentaire_fr))        
        {        
            $this->_date_commentaire_fr = $date_commentaire_fr;        
        }
    }
    // Data access
    public function getForId($billetId) 
    {
        global $bdd;
        $billetId = (int) $billetId;
        
        $req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = :billetId ORDER BY date_commentaire');
        $req->bindParam(':billetId', $billetId, PDO::PARAM_INT);    /* permet de préciser qu'il s'agit d'un entier */
        $req->execute();
        $commentaires = $req->fetchAll();
        $req->closeCursor ();
    
        return $commentaires;
    }
    public function sendCommentaire ($id_billet, $auteur, $commentaire)
    {
        global $bdd;
        $id_billet = (int) $id_billet;
        $auteur = (string) $auteur;
        $commentaire = (string) $commentaire;
        
        $req = $bdd->prepare ('INSERT INTO commentaires (`id`, `id_billet`, `auteur`, `commentaire`, `date_commentaire`) VALUES (NULL, :id_billet, :auteur, :commentaire, CURRENT_TIMESTAMP)');
        $req->bindParam(':id_billet', $id_billet, PDO::PARAM_INT);
        $req->bindParam(':auteur', $auteur, PDO::PARAM_STR);
        $req->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
        $req->execute();
        
        $req->closeCursor ();
        
    }
}
?>
