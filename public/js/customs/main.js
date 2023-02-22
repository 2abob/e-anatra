
function autofillMatricule(){

    let selectClasse = document.getElementById('id_classe');
    let classe = selectClasse.options[selectClasse.selectedIndex].text;

    let selectCours = document.getElementById('id_type_cours');
    let typeCours = selectCours.options[selectCours.selectedIndex].text;

    // let x = document.getElementById("id_classe").value;
    // let y = document.getElementById("id_type_cours").value;
    const d = new Date().getFullYear();
    // document.getElementById("demo").innerHTML = d.getFullYear();
    // if(x=="A")
    // {
        document.getElementById("matricule").value = classe+"-"+typeCours+"/"+d;
    // }
}
