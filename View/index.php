<!-- Projet 4 Création du fichier Index.php Fait par GOUVERNET Nicolas le 08/01/2018 -->
<!DOCTYPE html>
<html>
    <head>
        <title>Billet simple pour l'Alaska</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="View/style.css" rel="stylesheet" type="text/css" /> 
    </head>
        
    <body>
        <h1>Billet simple pour l'Alaska</h1>

        <!-- Mise en place de boutons pour la pagination-->  

        <!-- ********************* Partie Précédent **************************** -->        
    <a
            <?php 
                if(!isset($_GET['page']) OR $_GET['page']==1) 
                    {
                        echo 'style="display :none;";';
                    }
            ?>

            href="index.php?page=<?php 
                if(isset($_GET['page']))
                     {
                         echo ($_GET['page']-1); 
                     }
            ?>"

        >Précédent</a>
    
    <!-- ************************  Partie suivante ********************************-->   
        <a 
            <?php 
                 if(isset($_GET['page']) AND $_GET['page'] == $nbPage)
                     {
                        echo 'style="display :none;";';
                     }
            ?>

            href="index.php?page=<?php
                if(isset($_GET['page']))
                    {
                        echo ($_GET['page']+1); 
                    }
                else
                    {
                        echo 2;
                    }
            ?>"
        >Suivant</a>

        <!-- chargement des billets -->
        <?php
        foreach($billets as $billet)
        {
        ?>
        <div class="news">
            <h3>
                <?php echo $billet['titre']; ?>
                <em>le <?php echo $billet['date_creation_fr']; ?></em>
            </h3>
            
            <p>
                <?php echo $billet['contenu']; ?>
                <br />
                <em><a href="commentaires.php?billet=<?php echo $billet['id']; ?>">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        ?>
    </body>
</html>
