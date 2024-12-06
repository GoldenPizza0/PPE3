<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>ESN STERIA</title>
        <style type="text/css">
            @import url("css/styles.css");
        </style>
        <link href="css/cssGeneral.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    </head>
    <body>
    <nav>
            
        <ul id="menuGeneral">
            <li id="logo"><a href="./?uc=accueil"><img src="images/steria.svg" style="width:64px;height:64px" alt="logo" /></a></li>
            <li><a href="./?uc=recherche">Recherche</a></li>
            <li><a href="./?uc=client">Client</a></li>
            <li><a href="./?uc=salarie">Salarié</a></li>
            <li><a href="./?uc=intervenant">Intervenant</a></li>
            <li><a href="./?uc=commercial">Commercial</a></li>
            <li><a href="./?uc=secteur">Secteur</a></li>
            <li><a href="./?uc=intervention">Intervention</a></li> 

            
            <li></li> 
            <li><a href="./?uc=cgu">CGU</a></li>
            <?php if(isLoggedOn()){ ?>
            <li><a href="./?uc=profil"><img src="images/profil.png" alt="loupe" />Mon Profil</a></li>
            <?php } 
            else{ ?>
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
            <?php for ($i = 0; $i < count($menuBurger); $i++) { ?>
                <li>
                    <a href="<?php echo $menuBurger[$i]['url']; ?>">
                        <?php echo $menuBurger[$i]['label']; ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>

    <div id="corps">