<!DOCTYPE html>
<html>
    <head>
        <title>Billet simple pour l'Alaska</title>
        <?php include_once('head.php');?>
    </head>    
    <body>
        <section id="global" class="container">
            <header id="header" class="row">
                <a id="mainTitle" class="col-12" href="index.php"><h1>Billet simple pour l'Alaska Jean Forteroche </h1></a>
            </header>
        <section id="pageContent" class="row justify-content-center"> 
<!------------------------------------------------------------------- Chargement du billet ---------------------------------------->
        <?php
        foreach($billets as $billet)
        {
        ?>
        <div class="news">
            <h3><?php echo $billet->getTitre(); ?></h3>
                <div><?php echo $billet->getContenu(); ?></div>
                    <p>
                      <em class="datePublication">Publié le <?php echo $billet->getDate_creation_fr(); ?></em>
                      <br />
                      <em><a href="index.php?section=commentaires&billet=<?php echo $billet->getId(); ?>" class="btn btn-secondary btn-sm">Commentaires</a></em>
                    <p>
        </div>
        <?php
        }
        ?>  
<!------------------------------------------------------------------- Fin du Chargement du billet ---------------------------------------->
        </section>
            <p>Billet simple pour l'Akaska - Jean Forteroche</p>
            <p>Réalisé par GOUVERNET Nicolas - avec HTML5/CSS3 et PHP 7.2.1</p>
            <p><a href="index.php?section=log" class="btn btn-secondary btn-sm" id="administration">Administration</a></p>
        </section>    
        <?php include_once('liensBootstrap.php');?>
    </body>
</html>
