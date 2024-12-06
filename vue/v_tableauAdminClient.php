
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
<table >
<tr style="background-color:#00ffff;">
    <th>societe</th>
    <th>adresse</th>
    <th>secteur</th>
    <th>supprimer</th>
    <th>modifier</th>
    <th>afficher site</th>
</tr>
<?php
foreach($lesClientsEtSites as $UnClient){
    ?>
            <tr>
                <td><?php echo $UnClient["societe"];?></td>
                <td><?php echo $UnClient["adresse"];?></td>
                <td><?php echo $UnClient["activite"];?></td>
                <td><a href="./?uc=client&action=SupprimerClient&id=<?php echo $UnClient['code_client'];?>" onclick="return confirm('voulez vous vraiment supprimer ce client')">X</a></td>
                <td><a href="./?uc=client&action=ModifierClient"><button name="idClient" value= <?php echo $UnClient['code_client'];?>>%</button></a></td>
                <td><a href="./?uc=client"><button name="idClient" value= <?php echo $UnClient['code_client'];?>>afficher</button></a></td>
            </tr>
            <?php
            if ($_POST['idClient'] == $UnClient['code_client']){
            ?>
                    <tr style="background-color:#00ffcc;">
                        <th>sites</th>
                        <th>adresse</th>
                        <th>référent</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    foreach($UnClient["sites"] as $UnSite){
                    ?>
                        <tr>
                            <td><?php echo $UnSite["nom_site"];?></td>
                            <td><?php echo $UnSite["adresse_site"];?></td>
                            <td><?php echo $UnSite["referent"];?></td>
                            <td><a href="./?uc=client&action=SupprimerSite"><button name="idSite" value= <?php $retour = array($UnClient['code_client'], $UnSite["num_site"]);echo $retour ;?>>X</button></a></td>
                            <td><a href="./?uc=client&action=ModifierSite"><button name="idClient" value= <?php echo $UnClient['code_client'];?>>%</button></a></td>
                        </tr>
                    <?php
                    }
                    ?>
            <?php
            }
            ?>

<?php
}
?>
</table>