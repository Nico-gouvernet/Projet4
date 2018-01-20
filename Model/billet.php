<!-- Modification dans les normes le 15/01/2018 -->
<!-- Oublie dans l'ancien fichié les underscores etc.. -->
<!-- Modification dans les normes le 20/01/2018 -->
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
        $this->_date_creation_fr = $date_creation_fr;
    }
    // Data access
    public function getById($id)
    {         
        global $bdd;
        if (ctype_digit($id)) 
        {
            $id = (int) $id;
        } 
        else 
        {
            echo $id . ' n\'est pas un nombre.';
        }
        try 
        {
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
        catch (Exception $e)
        {
            echo $e->getMessage();
            echo 'Echec de la requête vérifiez les paramètres.';
        }  
    }
    public function getByPage($offset, $limit)
    {
        global $bdd;
        //vérifications
        if (is_int($offset) || ctype_digit($offset)) 
        {
            $offset = (int) $offset;
        } 
        else 
        {
            echo $offset. ' n\'est pas un nombre.';
        }    
        if (is_int($limit)) 
        {
            $limit = (int) $limit;
        } 
        else 
        {
            echo $limit . ' n\'est pas un nombre.';
        }
        //éxécution de la requête
        try
        {
            $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation LIMIT :offset, :limit');
            $req->bindParam(':offset', $offset, PDO::PARAM_INT);    /* permet de préciser qu'il s'agit d'un entier */
            $req->bindParam(':limit', $limit, PDO::PARAM_INT);      /* permet de préciser qu'il s'agit d'un entier */
            $req->execute();
            $billets = $req->fetchAll();
            $billets_modeles = [];
            foreach($billets as $billet) {
                $currentBillet = new Billet();
                $currentBillet->setId($billet['id']);
                $currentBillet->setTitre($billet['titre']);
                $currentBillet->setContenu($billet['contenu']);
                $currentBillet->setDate_creation_fr($billet['date_creation_fr']);
                
                $Billet_modeles[] = $currentBillet;
            }
            $req->closeCursor ();
            
            return $Billet_modeles;
            
            $req->closeCursor ();
            
            return $billets; 
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            echo 'Echec de la requête vérifiez les paramètres.';
        }   
    }
    public function getPageNb() 
    {
        //calcul du nombre de pages 
        try 
        {            
            global $bdd;
            $requeteNbLigne = $bdd->query ('SELECT COUNT(id) as countid FROM billets');
            $nbLigne = $requeteNbLigne->fetch();
            $nbPage = (int)($nbLigne['countid']/5) + 1;
            $requeteNbLigne->closeCursor ();
            return $nbPage;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            echo 'Echec de la requête vérifiez les paramètres.';
        }
    }
}
?>
