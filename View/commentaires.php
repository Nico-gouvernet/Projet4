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
                <p><a href="index.php" class="btn btn-secondary btn-sm">Retour à la liste des billets</a></p>
                    <section id="pageContent" class="row justify-content-center">              
<!------------------------------------------------------------------- Affichage du billet ---------------------------------------->
                        <div class="news">
                           <h3><?php echo htmlspecialchars($billet->getTitre()); ?></h3>
                             <div><?php echo $billet->getContenu();?></div>
                            <p><em class="datePublication">Publié le <?php echo $billet->getDate_creation_fr(); ?></em></p>
                        </div>         
                   </section>
<!----------------------------------------------------------------------------- Récupération des commentaires ----------------------------------------------->
        <h2>Commentaires</h2>
        <?php
            foreach ($commentaires as $commentaire)
            {
        ?>  
        <div class="commentaire">
          <p><strong><?php echo htmlspecialchars($commentaire->getAuteur()); ?></strong> le <?php echo $commentaire->getDate_commentaire_fr(); ?></p>
            <p><?php echo nl2br(htmlspecialchars($commentaire->getCommentaire())); ?></p>
            
<!-------------------------------------------------------------- création d'un bouton pour signaler un commentaire  --------------------------------------------->
                <form action="" method="POST">
                    <input type="submit" name="boutonSignaler<?php echo $commentaire->getId();?>" value="Signaler" class="btn btn-secondary btn-sm">
                </form>
                <?php
                if (isset($_POST['boutonSignaler' . $commentaire->getId()]))
                {
                    $commentaireAdmin->reportCommentaireById($commentaire->getId());
                    header("Refresh:0");
                }?>
            </div>
        <?php
        } 
        ?>
<!------------------------------------------------------------------- Fin de la boucle des commentaires---------------------------------------->
<!------------------------------------------------------------------- formulaire d'ajout de commentaires ---------------------------------------->
        <h2>Poster un commentaire</h2>
            <form action="controleur/blog/commentaire_post.php" method="post" onsubmit="commentaireEnvoye()">
                <p>
                    <label for="auteur">Pseudo</label> : <br /> <input type="text" name="auteur" id="auteur" /><br />
                    <label for="commentaire">Message</label> : <br /> <textarea name="commentaire" id="commentaire"></textarea><br />
                    <input type="hidden" name="id_billet" value=<?php echo "$id_billet";?>/>
                    <input type="submit" value="Envoyer" class="btn btn-secondary btn-sm"/>
               </p>
        </form>
<!------------------------------------------------------------------- fin formulaire d'ajout de commentaires ---------------------------------------->
            <footer class="row">
                <div id="footer" class="col-12">
                    <p>Billet simple pour l'Akaska - Jean Forteroche</p>
                    <p>Réalisé par GOUVERNET Nicolas - avec HTML5/CSS3 et PHP 7.2.1</p>
                    <p><a href="index.php?section=log" class="btn btn-secondary btn-sm" id="administration">Administration</a></p>
                </div>
            </footer>
        </section>     
        <?php include_once('liensBootstrap.php');?>
    </body>
</html>
