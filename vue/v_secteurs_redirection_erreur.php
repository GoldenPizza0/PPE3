<?php
if (isset($message)) {
    echo "<p>" . htmlspecialchars($message) . "</p>";
    exit;
}
header("Refresh: 2; url=index.php?uc=secteur&action=voirSecteurs");
?>