<?php
ob_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Administration du blog</title>         
        <?php include_once('head.php');?>      
    </head>
    <body>
        <section id="global" class="container">
            <header id="header" class="row">
                <a id="mainTitle" class="col-12"><h1>Bienvenue</h1></a>      
            </header>
            <section id="pageContent" class="row justify-content-center">
<!------------------------------------------------------------------- Si le mot de passe est bon ---------------------------------------->
    <?php
    if ($est_connecte) 
    {
    ?>
<!-------------------------------------------------- On affiche la page Récupération des commentaires  ---------------------------------------->
        <?php
        foreach ($commentaires as $commentaire)
        {
        ?>
            <div class="commentaire">
                <p><strong><?php echo htmlspecialchars($commentaire->getAuteur()); ?></strong> le <?php echo $commentaire->getDate_commentaire_fr(); ?></p>
                <p><?php echo nl2br(htmlspecialchars($commentaire->getCommentaire())); ?></p>
                <form action="" method="POST">
                    <input type="submit" name="boutonValider<?php echo $commentaire->getId();?>" value="Valider" class="btn btn-secondary btn-sm">
                    <input type="submit" name="boutonEffacer<?php echo $commentaire->getId();?>" value="Effacer" class="btn btn-secondary btn-sm">
                </form>
                <?php
                if (isset($_POST['boutonValider' . $commentaire->getId()]))
                {
                    $commentaireAdmin->showCommentaireById($commentaire->getId());
                }
                
                if (isset($_POST['boutonEffacer' . $commentaire->getId()]))
                {
                    $commentaireAdmin->deletCommentaireById($commentaire->getId());
                }?>
            </div>
        <?php
        } 
        ?>  
<!-------------------------------------------------- Fin de la page Récupération des commentaires  ---------------------------------------->          
</section>
        <a href="index.php?section=admin" class="btn btn-secondary btn-sm">Actualisation de le page</a>

        <h2>Administration des billets</h2>
<!--------------------------------------------------  formulaire d'ajout de billets ---------------------------------------->
        <h3>Nouveau billet</h3>
        <form action="Controller/billet_post.php" method="post">
            <p>

                <label for="titre">Titre</label> : <input type="text" name="titre" id="titre" /><br />
                <label for="contenu">Contenu</label> : <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea><br />
                <input type="submit" value="Envoyer" class="btn btn-secondary btn-sm"/>

            </p>
        </form>
<!--------------------------------------------------  Fin du formulaire d'ajout de billets ---------------------------------------->
<!--------------------------------------------------  Modification d'un billet ---------------------------------------->
        <h3>Modifier un billet</h3>
            <p>Sélectionnez le billet à modifier :</p>
                <form action="Controller/billet_edit.php" method="post">
                    <select name="modifierBillet">
                        <?php foreach($listeBillets as $listeBillet)
                        {
                        ?>
                    <option value ="<?php echo $listeBillet->getId();?>"><?php echo $listeBillet->getTitre();?></option>
                <?php
                }
                ?>        
            </select>
            <input type="submit" value="Modifier" class="btn btn-secondary btn-sm"/>
        </form>  
<!-------------------------------------------------- Fin de la Modification d'un billet ---------------------------------------->
        <h3> Déconnexion </h3>
     <a href="./index.php?section=log" class="btn btn-warning btn-sm" id="deconnexion">Déconnexion</a>
<!--------------------------------------------------  Message d'erreur si le mot de passe est incorrect  -------------------------------------->  
    <?php    
    }
    else
    {
        echo '<p>Mot de passe incorrect</p>';
    }
    ?>
        </section>

    <script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script type="text/javascript" src="vue/scripts/tinyMCE.js"></script>
    <?php include_once('liensBootstrap.php');?>

    </body>
</html>
