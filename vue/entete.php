<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titre ?></title>
        <style type="text/css">
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    </head>
    <body>
    <nav>
        <ul id="menuGeneral">
            <li><a href="./?uc=accueil">Contrat</a></li>
            <?php if(isLoggedOn()){ ?>
            <li><a href="./?uc=client">Client</a></li>
            <li><a href="./?uc=salarie">Salarié</a></li>
            <li id="logo"><a href="./?uc=accueil"><img src="images/steria.svg" style="width:64px;height:64px" alt="logo" /></a></li>
            <li></li>
            <li><a href="./?uc=domainetechnique">Domaine Technique</a></li>
            
            <li><a href="./?uc=deconnexion"><img src="images/profil.png" alt="loupe" />déconnexion</a></li>
            <?php } else { ?>
            <li><a href="./?uc=connexion"><img src="images/profil.png" alt="loupe" />Connexion</a></li>
            <?php } ?>
        </ul>
    </nav>
    <div id="bouton">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <ul id="menuContextuel">
        <li><img src="images/logoBarre.png" alt="logo" /></li>
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
