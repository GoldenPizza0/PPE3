<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title><?php echo $titre ?></title>
          <link href="modele/styles.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    </head>
    <body>
    <nav>
            
        <ul id="menuGeneral">
            <li><a href="./?uc=accueil">Accueil</a></li> 
            <li><a href="./?uc=recherche">Recherche</a></li>
            <li><a href="./?uc=client">Client</a></li> 

            <li id="logo"><a href="./?uc=accueil"><img src="images/logoBarre.jpg" style="width:64px;height:64px" alt="logo" /></a></li>
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