<?php
include("vue/entete.php");	
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
<form method="POST" action="./?uc=client">
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
                <td><a href="./?uc=client"><button name="button" value= <?php echo $UnClient['code_client'];?>>afficher</button></a></td>
            </tr>
            <?php
            if ($_POST['button'] == $UnClient['code_client']){
            ?>
                    <tr>
                        <th>sites</th>
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
            <?php
            }
            ?>

<?php
}
?>
</table>
</form>