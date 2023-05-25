    var nouvelleFenetre;

    function popup(fenetre, id) {
        // Ouvrir une nouvelle fenêtre avec le tableau de valeurs
        nouvelleFenetre = window.open(fenetre+"?id="+id, "_blank", "width=800,height=600");
    }

    function selectionnerValeur(valeur) {
        // Fermer la fenêtre et mettre la valeur sélectionnée dans le champ de texte
        var url = new URL(window.location.href);

        var params = url.searchParams;

        var param1Value = params.get('id');

        console.log(params);

        window.opener.document.getElementById(param1Value+"").value = valeur;
        window.close();
        //   nouvelleFenetre.close();
    }