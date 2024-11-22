<?php
include("vues/entete.php");	
?>
<table >
<tr>
    <th>societe</th>
    <th>adresse</th>
    <th>secteur</th>
</tr>
<?php
foreach($lesClientsEtSites as $UnClient){
    ?>
            <tr >
            <button onclick="MontrerSitesDeClients($UnClient['client'])">
                <td><?php echo $UnClient["societe"];?></td>
                <td><?php echo $UnClient["adresse"];?></td>
                <td><?php echo $UnClient["secteur"];?></td>
                </button>
            </tr>
            <table id=<?php echo $$UnClient['client'];?> hidden=true>
                <tr>
                    <th>nom</th>
                    <th>adresse</th>
                    <th>référent</th>
                </tr>
                <?php
                foreach($UnClient["sites"] as $UnSite){
                ?>
                    <tr>
                        <td><?php echo $UnSite["nom"];?></td>
                        <td><?php echo $UnSite["adresse"];?></td>
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