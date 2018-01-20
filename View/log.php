<!DOCTYPE html>
<html>
    <head>
        <title>Authentification</title>           
    </head>
    <body>
        <section id="global" class="container">
            <header id="header" class="row">
                <a id="mainTitle" class="col-12"><p>Veuillez entrer le mot de passe pour accéder à la page d'administration :</p></a>
            </header>
            <section id="pageContent" class="row justify-content-center">
<!------------------------------------------------------------------- Formulaire de connexion ---------------------------------------->
        <div id="connexionForm">
            <p>
                <input type="password" name="mot_de_passe" id="mot_de_passe" />
                <button id="boutonValider" class="btn btn-secondary btn-sm">Valider</button>
                <a href="index.php" class="btn btn-secondary btn-sm">Retour à l'acceuil</a>
            </p>
        </div>
<!-------------------------------------------------------------------fin du Formulaire de connexion ---------------------------------------->
        </section>
    </section>
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="./vue/scripts/sha1.js"></script>
        <script src="./vue/scripts/log.js" type="text/javascript"></script>
        <?php include_once('liensBootstrap.php');?>
    </body>
</html>
