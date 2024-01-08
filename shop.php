
<!-- Section "Shop" -->
<section class="shop">
    <h2>Shop</h2>
    <?php include('path_vers_le_fichier_php_contenant_le_code_précédent.php'); ?>
</section>



<?php
// Requête pour récupérer les catégories
$query = "SELECT * FROM categories";
$result = $conn->query($query);

// Vérifier s'il y a des résultats
if ($result->num_rows > 0) {
    echo '<ul class="categories-list">';
    // Afficher les catégories dans la section "shop"
    while ($row = $result->fetch_assoc()) {
        echo '<li class="category">' . $row['name'] . '</li>';
    }
    echo '</ul>';
} else {
    echo 'Aucune catégorie trouvée.';
}

// Fermer la connexion à la base de données
$conn->close();
?>

