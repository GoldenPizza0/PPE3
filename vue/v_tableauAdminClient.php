
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

<a href="./?uc=client&action=CreerClient"><button >créer un client</button></a>

<table >
<tr style="background-color:#00ffff;">
    <th>societe</th>
    <th>adresse</th>
    <th>secteur</th>
    <th>supprimer</th>
    <th>modifier</th>
    <th>afficher site</th>
    <th>ajouter un site</th>
</tr>
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
                        <th></th>
                        <th></th>
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