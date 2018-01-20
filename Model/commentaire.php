<!-- Création du fichier le 15/01/2018 -->
<!-- Modification du fichier le 20/01/2018-->
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
    public function setDate_commentaire_fr($date_commentaire_fr) 
    {
        if (is_string($date_commentaire_fr))        
        {        
            $this->_date_commentaire_fr = $date_commentaire_fr;        
        }
    }
    // Data access
    public function getForId($billetId) 
    {
        //vérification
        global $bdd;
        if (is_int($billetId) || ctype_digit($billetId)) 
        {
            $billetId = (int) $billetId;
        } 
        else 
        {
            echo $billetId . ' n\'est pas un nombre.';
        }
        // éxécution de la requête
        try
        {
            $req = $bdd->prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = :billetId AND affichage = 2 ORDER BY date_commentaire');
            $req->bindParam(':billetId', $billetId, PDO::PARAM_INT);    /* permet de préciser qu'il s'agit d'un entier */
            $req->execute();
            $commentaires = $req->fetchAll();
            
            $commentaires_modeles = [];
            foreach($commentaires as $commentaire) {
                $currentCommentaire = new Commentaire();
                $currentCommentaire->setId($commentaire['id']);
                $currentCommentaire->setId_billet($commentaire['id_billet']);
                $currentCommentaire->setAuteur($commentaire['auteur']);
                $currentCommentaire->setCommentaire($commentaire['commentaire']);
                $currentCommentaire->setDate_commentaire_fr($commentaire['date_commentaire_fr']);
                
                $commentaires_modeles[] = $currentCommentaire;
            }
            $req->closeCursor ();
            
            return $commentaires_modeles;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            echo 'Echec de la requête vérifiez les paramètres.';
        }   
    }
    public function getAllToAdmin()
    {
        
        global $bdd;
        
        // éxécution de la requête
        try
        {
            $req = $bdd->prepare('SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE affichage = 1 ORDER BY date_commentaire');
            $req->execute();
            $commentaires = $req->fetchAll();
            $commentaires_modeles = [];
            foreach($commentaires as $commentaire) {
                $currentCommentaire = new Commentaire();
                $currentCommentaire->setId($commentaire['id']);
                $currentCommentaire->setId_billet($commentaire['id_billet']);
                $currentCommentaire->setAuteur($commentaire['auteur']);
                $currentCommentaire->setCommentaire($commentaire['commentaire']);
                $currentCommentaire->setDate_commentaire_fr($commentaire['date_commentaire_fr']);
                
                $commentaires_modeles[] = $currentCommentaire;
            }
            $req->closeCursor ();
        
            return $commentaires_modeles;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            echo 'Echec de la requête vérifiez les paramètres.';
        } 
    }
    public function sendCommentaire ($id_billet, $auteur, $commentaire)
    {
        global $bdd;
        //vérifications 
        if (is_int($id_billet) || ctype_digit($id_billet)) 
        {
            $id_billet = (int) $id_billet;
        } 
        else 
        {
            echo $id_billet . ' n\'est pas un nombre.';
        }
        if (is_string($auteur))
        {
            $auteur = (string) $auteur;
        }
        else
        {
            echo $auteur . ' n\'est pas du texte valide.';
        }
        
        if (is_string($commentaire))
        {
            $commentaire = (string) $commentaire;
        }
        else
        {
            echo $commentaire . ' n\'est pas du texte valide.';
        }
        // éxécution de la requête, affichage a la valeur 1 = attente de modération
        try 
        {        
            $req = $bdd->prepare ('INSERT INTO commentaires (`id`, `id_billet`, `affichage` ,`auteur`, `commentaire`, `date_commentaire`) VALUES (NULL, :id_billet, 1, :auteur, :commentaire, CURRENT_TIMESTAMP)');
            $req->bindParam(':id_billet', $id_billet, PDO::PARAM_INT);
            $req->bindParam(':auteur', $auteur, PDO::PARAM_STR);
            $req->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
            $req->execute();
            
            $req->closeCursor ();
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            echo 'Echec de la requête vérifiez les paramètres.';
        }   
        
    }
    public function showCommentaireById ($id_commentaire)
    {
        global $bdd;
        //vérifications 
        if (is_int($id_commentaire) || ctype_digit($id_commentaire)) 
        {
            $id_commentaire = (int) $id_commentaire;
        } 
        else 
        {
            echo $id_commentaire . ' n\'est pas un nombre.';
        }
        // éxécution de la requête, changement de la valeur affichage à 2 pour le commentaire posédant id_commentaire
        try 
        {        
            $req = $bdd->prepare ('UPDATE commentaires SET affichage = 2 WHERE id = :id_commentaire');
            $req->bindParam(':id_commentaire', $id_commentaire, PDO::PARAM_INT);
            $req->execute();
            
            $req->closeCursor ();
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            echo 'Echec de la requête vérifiez les paramètres.';
        }
    }
    public function deletCommentaireById ($id_commentaire)
    {
        global $bdd;
        //vérifications 
        if (is_int($id_commentaire) || ctype_digit($id_commentaire)) 
        {
            $id_commentaire = (int) $id_commentaire;
        } 
        else 
        {
            echo $id_commentaire . ' n\'est pas un nombre.';
        }
        // éxécution de la requête, supprimer le commentaire posédant id_commentaire
        try 
        {        
            $req = $bdd->prepare ('DELETE FROM commentaires WHERE id = :id_commentaire');
            $req->bindParam(':id_commentaire', $id_commentaire, PDO::PARAM_INT);
            $req->execute();
            
            $req->closeCursor ();
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            echo 'Echec de la requête vérifiez les paramètres.';
        }
    }
}
?>
