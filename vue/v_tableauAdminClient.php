<?php
include("vues/entete.php");	
include("modele/fonction.client.php");	
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
<table >
<tr>
    <th>societe</th>
    <th>adresse</th>
    <th>secteur</th>
</tr>
<?php
foreach($lesClientsEtSites as $UnClient){
    ?>
            <tr onclick="MontrerSitesDeClients(<?php echo $UnClient['code_client'];?>)">
                <td><?php echo $UnClient["societe"];?></td>
                <td><?php echo $UnClient["adresse"];?></td>
                <td><?php echo $UnClient["activite"];?></td>
            </tr>
            <table value="sous-tableau" id=<?php echo $UnClient['code_client'];?> hidden=true>
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
    </table>
<?php
}
?>