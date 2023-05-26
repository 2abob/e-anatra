function search() {
    var val = document.getElementById("navbar-search-input").value;
    if(!val)
        window.location.href = "/resultatrecherche/ET";
    else 
        window.location.href = "/resultatrecherche/"+val;
}

var searchField = document.getElementById("navbar-search-input");

searchField.addEventListener("keypress", function(event) {
  if (event.keyCode === 13) {
    // La touche "Entrée" a été pressée
    event.preventDefault(); // Optionnel, pour empêcher la soumission du formulaire

    // Votre code ici pour gérer l'événement de la touche "Entrée"
    var val = document.getElementById("navbar-search-input").value;
    if(!val)
        window.location.href = "/resultatrecherche/ET";
    else 
        window.location.href = "/resultatrecherche/"+val;
}});