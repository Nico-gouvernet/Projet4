<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Administration du blog</title>
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script>
            tinymce.init({
                selector: '#contenu'
            });
        </script>
    </head>
    <body>
    
    <?php
    if ($est_connecte) // Si le mot de passe est bon
    {
    // On affiche la page
    ?>
        <h1>Outils d'administration</h1>

        <h2>Commentaires à modérer</h2>
        <?php
        // Récupération des commentaires
        foreach ($commentaires as $commentaire)
        {
        ?>
            <p><strong><?php echo htmlspecialchars($commentaire->getAuteur()); ?></strong> le <?php echo $commentaire->getDate_commentaire_fr(); ?></p>
            <p><?php echo nl2br(htmlspecialchars($commentaire->getCommentaire())); ?></p>
            <form action="" method="POST">
                <input type="submit" name="boutonValider<?php echo $commentaire->getId();?>" value="Valider">
                <input type="submit" name="boutonEffacer<?php echo $commentaire->getId();?>" value="Effacer">
            </form>
            <?php
            if (isset($_POST['boutonValider' . $commentaire->getId()]))
            {
                $commentaireAdmin->showCommentaireById($commentaire->getId());
                header("Refresh:0");
            }
              
            if (isset($_POST['boutonEffacer' . $commentaire->getId()]))
            {
                $commentaireAdmin->deletCommentaireById($commentaire->getId());
                header("Refresh:0");
            }
        } // Fin de la boucle des commentaires
        ?>  
        <h2>Administration des billets</h2>

         <!-- formulaire d'ajout de billets -->
        <form action="controleur/blog/billet_post.php" method="post">
            <p>

                <label for="titre">Titre</label> : <input type="text" name="titre" id="titre" /><br />
                <label for="contenu">Contenu</label> : <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea><br />
                <input type="submit" value="Envoyer" />

            </p>
        </form>     
    <?php
    }
    else // Message d'erreur si le mot de passe est incorrect
    {
        echo '<p>Mot de passe incorrect</p>';
    }
    ?>    
        
    </body>
</html>
