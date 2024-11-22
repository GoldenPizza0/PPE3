<?php
// On inclut ici une vérification de la session ou d'un token si nécessaire
session_start();

// Vérifier si l'utilisateur a été correctement inscrit
if (isset($_SESSION['inscription_reussie']) && $_SESSION['inscription_reussie'] === true) {
    // On peut réinitialiser la session pour éviter des messages répétitifs lors du rechargement de la page
    unset($_SESSION['inscription_reussie']);
} else {
    // Si l'inscription a échoué ou si la session est absente, on redirige vers la page d'inscription
    header('Location: inscription.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription</title>
    <link rel="stylesheet" href="styles.css"> <!-- Ajouter votre fichier CSS -->
</head>
<body>
    <header>
        <h1>Confirmation d'Inscription</h1>
    </header>
    
    <main>
        <section class="confirmation">
            <h2>Félicitations !</h2>
            <p>Votre inscription a été effectuée avec succès.</p>
            
            <p><a href="./?action=connexion">Cliquez ici pour vous connecter à votre compte.</a></p>
        </section>

        <footer>
            <p>&copy; 2024 esn_steria</p>
        </footer>
    </main>
</body>
</html>
