<!-- Projet 4 Création du fichier Index.php Fait par GOUVERNET Nicolas le 08/01/2018 -->
<!-- Modification du fichier le 11/01/2018 Mise en place de la POO pour la pagination l'administartion et le contenu avec le billet -->
<!DOCTYPE html>
<html>
    <head>
        <title>Billet simple pour l'Alaska</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="View/style.css" rel="stylesheet" type="text/css" /> 
    </head>
        
    <body>
        <h1>Billet simple pour l'Alaska</h1>
        
        <!-- chargement des billets -->
        <?php
        foreach($billets as $billet)
        {
        ?>
        <div class="news">
            <h3>
                <?php echo $billet->getTitre(); ?>
                <em>le <?php echo $billet->getDate_creation_fr(); ?></em>
            </h3>
            
            <p>
                <?php echo $billet->getContenu(); ?>
                <br />
                <em><a href="index.php?section=commentaires&billet=<?php echo $billet->getId(); ?>">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        ?>
        <p><a href="index.php?section=log">Administration</a></p>
    </body>
</html>
