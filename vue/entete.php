<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titre ?></title>
        <style type="text/css">
            @import url("css/styles.css");
        </style>
        <link href="css/cssGeneral.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    </head>
    <body>
    <nav>
        <ul id="menuGeneral">
            
            <li><a href="./?uc=client">Client</a></li>
            <li><a href="./?uc=Domaine_Technique">Domaine Technique</a></li>
            <li><a href="./?uc=accueil">Contrat</a></li>
            <li><a href="./?uc=intervenant">Intervenant</a></li>
            <li id="logo"><a href="./?uc=accueil"><img src="images/steria.svg" style="width:64px;height:64px" alt="logo" /></a></li>
            <li><a href="./?uc=commercial">Commercial</a></li>
            <li><a href="./?uc=secteur">Secteur</a></li>
            <li><a href="./?uc=intervention">Intervention</a></li> 

            

            <?php if(isLoggedOn()){ ?>
            <li><a href="./?uc=deconnexion">Deconnexion</a></li>
            <?php } 
            else{ ?>
            <li><a href="./?uc=deconnexion"><img style="width: auto;height: 35px;" src="images/profil.png" alt="loupe" /></a></li>
            <?php } ?>
        </ul>
    </nav>
    <div id="bouton">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <ul id="menuContextuel">
        <li><img src="images/steria.svg" style="width:64px;height:64px" alt="logo" /></li>
        <?php if (isset($menuBurger)) { ?>
            <?php foreach ($menuBurger as $item) { ?>
                <li>
                    <a href="<?php echo $item['url']; ?>">
                        <?php echo $item['label']; ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
    <div id="corps">
