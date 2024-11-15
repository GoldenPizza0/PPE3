<?php
include("vues/entete.php");	

foreach($lesClientsEtSites as $UnClient){
    ?>
    <table >
        <tr>
            <th>societe</th>
            <th>adresse</th>
            <th>secteur</th>
        </tr>
        <button onclick="MontrerSitesDeClients($UnClient['client'])">
            <tr>
                <td><?php echo $UnClient["societe"];?></td>
                <td><?php echo $UnClient["adresse"];?></td>
                <td><?php echo $UnClient["secteur"];?></td>
            </tr>
            <?php
            foreach($UnClient["sites"] as $UnSite){
            ?>
                <table id=<?php echo $UnSite["client"];?> hidden=true>
                    <tr>
                        <th>nom</th>
                        <th>adresse</th>
                        <th>référent</th>
                    </tr>
                    <tr>
                        <td><?php echo $UnSite["nom"];?></td>
                        <td><?php echo $UnClient["adresse"];?></td>
                        <td><?php echo $UnSite["referent"];?></td>
                    </tr>
                </table>
            <?php
            }
            ?>
        </button>
    </table>
<?php
}
?>