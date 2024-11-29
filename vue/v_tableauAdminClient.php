<?php
include("vues/entete.php");	
?> 
<style>
table {
    width: 100%;
    border-collapse: collapse;
}
th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}
tr:hover {
    background-color: #f5f5f5;
}
</style>
<form method="REQUEST" action="./?uc=client">
<table >
<tr>
    <th>societe</th>
    <th>adresse</th>
    <th>secteur</th>
    <th>afficher site</th>
</tr>
<?php
foreach($lesClientsEtSites as $UnClient){
    ?>
            <tr>
                <td><?php echo $UnClient["societe"];?></td>
                <td><?php echo $UnClient["adresse"];?></td>
                <td><?php echo $UnClient["activite"];?></td>
                <td><a href="./?uc=client"><button name="button" value= <?php echo $UnClient['code_client'];?>>afficher</button></a>
                <a href="./?uc=client&action=Supprimer&libelle=Client" img="./images/supp.png"><button name="idClient" value= <?php echo $UnClient['code_client'];?>></button></a>
                <a href="./?uc=client"><button name="button" value= <?php echo $UnClient['code_client'];?>>afficher</button></a></td>
            </tr>
            <?php
            if ($_REQUEST['button'] == $UnClient['code_client']){
            ?>
                <table>
                    <tr>
                        <th>nom</th>
                        <th>adresse</th>
                        <th>référent</th>
                    </tr>
                    <?php
                    foreach($UnClient["sites"] as $UnSite){
                    ?>
                        <tr>
                            <td><?php echo $UnSite["nom_site"];?></td>
                            <td><?php echo $UnSite["adresse_site"];?></td>
                            <td><?php echo $UnSite["referent"];?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            <?php
            }
            ?>
<?php
}
?>
</table>
</form>