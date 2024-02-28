$(document).ready(function(){
    // Charger les données initiales du tableau
    refreshTable();

    // Fonction pour rafraîchir le tableau
    function refreshTable() {
        $.ajax({
            url: 'fetch_data.php',
            type: 'post',
            success: function(response) {
                $('#crud_table').html(response);
            }
        });
    }

    // Définir une fonction pour afficher une alerte lorsque la cellule devient verte
    $('#crud_table').on('change', 'td.green', function(){
        alert('La cellule est devenue verte !');
    });
});
