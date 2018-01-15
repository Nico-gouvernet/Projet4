<?php
class Billet {
    // Propriétés du billet
    private $id;
    private $titre;
    private $contenu;
    private $date_creation_fr;
    // Constructor
    public function __construct() {
    }
    // Getters & setters
    public function getId() {
        return $this->id;
    }  
    public function getTitre() {
        return $this->titre;
    }
    public function getContenu() {
        return $this->contenu;
    }
    public function getDate_creation_fr() {
        return $this->date_creation_fr;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setTitre($titre) {
        $this->titre = $titre;
    }
    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }
    public function setDate_creation_fr($date_creation_fr) {
        $this->date_creation_fr = $date_creation_fr;
    }
    // Data access
    public function getById($id)
    {         
        global $bdd;
        $id = (int) $id;
        
        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = :id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);    
        $req->execute();
        $billet = $req->fetch();
        
        $this->id = $id;        
        $this->titre = $billet['titre'];
        $this->contenu = $billet['contenu'];
        $this->date_creation_fr = $billet['date_creation_fr'];
    }
    public function getByPage($offset, $limit)
    {
        global $bdd;
        $offset = (int) $offset;
        $limit = (int) $limit;
            
        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation LIMIT :offset, :limit');
        $req->bindParam(':offset', $offset, PDO::PARAM_INT);    
        $req->bindParam(':limit', $limit, PDO::PARAM_INT);     
        $req->execute();
        $billets = $req->fetchAll();
        
        return $billets;
    }
    public function getPageNb() 
    {
        //calcul du nombre de pages 
        global $bdd;
        $requeteNbLigne = $bdd->query ('SELECT COUNT(id) as countid FROM billets');
        $nbLigne = $requeteNbLigne->fetch();
        $nbPage = (int)($nbLigne['countid']/5) + 1;
        return $nbPage;
    }
}
?>
