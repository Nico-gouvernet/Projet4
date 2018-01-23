<!DOCTYPE html>
<html>
    <head>
        <title>Administration du blog</title> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">         
        <link href="../View/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <section id="global" class="container">
            <section id="pageContent" class="row justify-content-center">
<!-------------------------------------------------------------------  Si le mot de passe est correct ---------------------------------------->
    <?php
        if ($est_connecte)
        {
     ?>
<!-------------------------------------------------------------------  On affiche la page ---------------------------------------->
        </section>
            <form action="../Controller/billet_edit_post.php" method="post">
                <p>
                    <label for="titre">Titre</label> : <input type="text" name="titre" id="titre" value="<?php echo $editBillet->getTitre();?>"/><br />
                    <label for="contenu">Contenu</label> : <textarea name="contenu" id="contenu"><?php echo $editBillet->getContenu();?></textarea><br />            
                    <input type="hidden" name="id" value="<?php echo $editBillet->getId();?>" />
                    <input type="submit" value="Sauvegarder les modifications" class="btn btn-secondary btn-sm"/>
                </p>
            </form>            
            <form action="../Controller/billet_delet.php" method="post" onsubmit="return confirmation();">
                <p>   
                    <input type="hidden" name="id" value="<?php echo $editBillet->getId();?>" />       
                    <input type="submit" name="boutonEffacer" value="Supprimer le billet" class="btn btn-secondary btn-sm">
                </p>
            </form>   
            <a href="../index.php?section=admin" class="btn btn-secondary btn-sm" id="lienAdmin">Retour à la page sans sauvegarder</a>
        </section>
<!------------------------------------------------------------------- Message d'erreur si le mot de passe est incorrect  ---------------------------------------->
            <?php
        }
        else
        {
            echo '<p>Vous n\'êtes pas connecté</p>';
        }
        ?>  
    <script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script type="text/javascript" src="../View/scripts/tinyMCE.js"></script>  
    <script type="text/javascript" src="../View/scripts/confirmation.js"></script>  
    <?php include_once('liensBootstrap.php');?>
    </body>
</html>
