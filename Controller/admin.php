<?php
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ On affiche la page connexion_sql.php ]
include_once('./helpers/connexionHelper.php');
$helper = new ConnexionHelper();
session_start();

if (isset($_SESSION['encodedPassword']) && $helper->verifierMotDePasse($_SESSION['encodedPassword'])) {
    $est_connecte = true;
} else {
    if (array_key_exists('mot_de_passe', $_POST)) {
        $mot_de_passe = $_POST['mot_de_passe'];
        
        $est_connecte = $helper->verifierMotDePasse($mot_de_passe);

        if ($est_connecte) {
            $_SESSION['encodedPassword'] = $mot_de_passe;
        }
    } else {
        $est_connecte = false;
    }
}
if ($est_connecte) {
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ MDP OK ]
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ récupération des commentaires à modérer]
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [  On affiche la page commentaire.php]
    include_once('./Model/commentaire.php');
    $commentaire = new Commentaire();
    $commentaires = $commentaire->getAllToAdmin();
    $commentaireAdmin = new Commentaire();
    $est_connecte = true;
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ récupération de la liste des billets]
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [  On affiche la page billet.php]
    include_once('./Model/billet.php');
    $listeBillet = new Billet();
    $listeBillets = $listeBillet->getListe();
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [  ajout de la page]
    include_once('./View/admin.php');
    
} else {
//------------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>> [ Mot de passe FAUX]
    echo '<p>Mot de passe incorrect</p>';
}
