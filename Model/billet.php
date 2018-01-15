<!-- Modification dans les normes le 15/01/2018 -->
<!-- Oublie dans l'ancien fichié les underscores etc.. -->
<?php
class Billet 
{
    // Propriétés du billet
    private $_id;
    private $_titre;
    private $_contenu;
    private $_date_creation_fr;
    // Constructor
    public function __construct() 
    {
    }
    // Getters & setters
    public function getId() 
    {
        return $this->_id;
    }  
    public function getTitre() 
    {
        return $this->_titre;
    }
    public function getContenu() 
    {
        return $this->_contenu;
    }
    public function getDate_creation_fr() 
    {
        return $this->_date_creation_fr;
    }
    public function setId($id) 
    {
       $id = (int) $id;
       if ($id > 0)
            {
               $this->_id = $id;        
            }        
    }
    public function setTitre($titre) 
    {
        if (is_string($titre))        
        {        
            $this->_titre = $titre;        
        }
    }
    public function setContenu($contenu) 
    {
        if (is_string($contenu))
        {
        $this->_contenu = $contenu;
        }
    }
    public function setDate_creation_fr($date_creation_fr) 
    {
        $this->date_creation_fr = $date_creation_fr;
    }
    // Data access
    public function getById($id)
    {         
        global $bdd;
        try
        {
            $id = (int) $id;
        }
        catch (Exception $e)
        {
            echo '$id n\'est pas un nombre.';
        }        
        
        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);    /* permet de préciser qu'il s'agit d'un entier */
        $req->execute();
        $billet = $req->fetch();
        $req->closeCursor ();
        
        $this->_id = $id;        
        $this->_titre = $billet['titre'];
        $this->_contenu = $billet['contenu'];
        $this->_date_creation_fr = $billet['date_creation_fr'];
    }
    public function getByPage($offset, $limit)
    {
        global $bdd;
        $offset = (int) $offset;
        $limit = (int) $limit;
            
        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation LIMIT :offset, :limit');
        $req->bindParam(':offset', $offset, PDO::PARAM_INT);    /* permet de préciser qu'il s'agit d'un entier */
        $req->bindParam(':limit', $limit, PDO::PARAM_INT);      /* permet de préciser qu'il s'agit d'un entier */
        $req->execute();
        $billets = $req->fetchAll();
        $req->closeCursor ();
        
        return $billets;
    }
    public function getPageNb() 
    {
        //calcul du nombre de pages 
        global $bdd;
        $requeteNbLigne = $bdd->query ('SELECT COUNT(id) as countid FROM billets');
        $nbLigne = $requeteNbLigne->fetch();
        $nbPage = (int)($nbLigne['countid']/5) + 1;
        $requeteNbLigne->closeCursor ();
        return $nbPage;
    }
}
?>
