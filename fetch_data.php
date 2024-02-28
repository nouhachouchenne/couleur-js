<?php
// Connexion à la base de données
$mysqli = new mysqli('localhost', 'root', '', 'dlconsult');

// Vérification de la connexion
if($mysqli->connect_errno) {
    echo "Erreur de connexion: " . $mysqli->connect_error;
    exit();
}
error_reporting(0);
// Récupérer les données de la base de données
$result = $mysqli->query("SELECT * FROM students");

// Générer le contenu du tableau
$table_html = '<tr><th>ID</th><th>Nom</th><th>Statut</th></tr>';
while($row = $result->fetch_assoc()) {
    $table_html .= '<tr>';
    $table_html .= '<td>' . $row['id'] . '</td>';
    $table_html .= '<td>' . $row['nom'] . '</td>';
    // Vérifier si le statut est vert, ajouter la classe appropriée
    $table_html .= '<td class="' . ($row['statut'] == 'vert' ? 'green' : '') . '">' . $row['statut'] . '</td>';
    $table_html .= '</tr>';
}

// Afficher le contenu du tableau
echo $table_html;

// Fermer la connexion à la base de données
$mysqli->close();
?>
