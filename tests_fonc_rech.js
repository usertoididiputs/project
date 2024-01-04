document.getElementById("rechercheForm").addEventListener("submit", function(event) {
    // Prévenir le comportement par défaut
    event.preventDefault();

    // Validation du formulaire
    var rechercheGlobale = document.forms["rechercheForm"]["recherche_globale"].value;
    if (rechercheGlobale == "") {
        alert("Le champ 'Compétences' ne peut pas être vide.");
        return false;
    }

    // D'autres validations peuvent être ajoutées ici

    // Soumettre le formulaire si tout est valide
    this.submit();
});