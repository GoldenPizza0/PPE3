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
        <button onclick="MontrerSitesDeClients($UnClient['client'])">
            <tr>
                <td><?php echo $UnClient["societe"];?></td>
                <td><?php echo $UnClient["adresse"];?></td>
                <td><?php echo $UnClient["secteur"];?></td>
            </tr>
            
        </button>
            <table>
                    <tr>
                        <th>nom</th>
                        <th>adresse</th>
                        <th>référent</th>
                    </tr>
            <?php
            foreach($UnClient["sites"] as $UnSite){
            ?>
                <tr id = $UnClient['client']>
                    <td><?php echo $UnSite["nom"];?></td>
                    <td><?php echo $UnClient["adresse"];?></td>
                    <td><?php echo $UnSite["referent"];?></td>
                </tr>
            <?php
            }
            ?>
            </table>
    <?php
    }
    ?>
</table>