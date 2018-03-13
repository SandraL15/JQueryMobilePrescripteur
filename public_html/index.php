<?php
session_start();
require('modele/dbParametres.php');
require('modele/Prescripteur.php');
require('modele/Passerelle.php');
require('vue/header.php');
?>
<div data-role="page">
    <div data-role="header">
        <h1>Répertoire des prescripteurs</h1>
    </div>
    <div data-role="content">
    <?php 
    Passerelle::connexion($MYSQL_HOTE,$MYSQL_DB,$MYSQL_USER,$MYSQL_PASS);
    if (isset ($_REQUEST['action'])){
            $action = $_REQUEST['action'];
    }
    else {
            $action = "";            
    }
    switch ($action) {
            case 'addnew' 	:   require('vue/addPrescripteur.php');
                                    break;
            case 'insert' 	:   $nom = $_REQUEST['nom'];
                                    $tel = $_REQUEST['tel'];
                                    $description = $_REQUEST['description'];
                                    $mail = $_REQUEST['mail'];
                                    Passerelle::addPrescripteur($nom, $tel, $description, $mail); 
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;
            case 'details' 	:   $id = $_REQUEST['id'];
                                    $contact = Passerelle::getOnePrescripteur($id);
                                    require('vue/showOnePrescripteur.php');
                                    break;
            case 'update' 	:   $id = $_REQUEST['id'];
                                    $nom = $_REQUEST['nom'];
                                    $tel = $_REQUEST['tel'];
                                    $description = $_REQUEST['description'];
                                    $mail = $_REQUEST['mail'];
                                    Passerelle::updateOnePrescripteur($id, $nom, $tel, $description, $mail);
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;
            case 'delete'	:   $id = $_REQUEST['id'];
                                    Passerelle::delPrescripteur($id);
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;
//            case 'identification':  require('vue/identification.php');
//                                    break;
            case 'verifConnexion':  $login = $_REQUEST['login'];
                                    $mdp = $_REQUEST['mdp'];
                                    if ($login == "toto" && $mdp == "1234"){
                                        $_SESSION["login"] = $login;
                                        $contacts = Passerelle::getPrescripteurs();
                                        require ('vue/showPrescripteurs.php');
                                    }
                                    else
                                        require('vue/identification.php');
                                    
                                    break;
            default             :   require('vue/identification.php');
    }
    ?>  
    </div>
    <div data-role="footer">
    Galaxy Swiss Bourdin 
    </div>
</div>
<?php 
 require('vue/footer.php'); 
?>
</body>
</html>