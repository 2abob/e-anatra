    
    function popup(fenetre, id) {
        // Ouvrir une nouvelle fenêtre avec le tableau de valeurs
        window.open(fenetre+"?id="+id, "_blank");
    }

    function selectionnerValeur(valeur) {
        // Fermer la fenêtre et mettre la valeur sélectionnée dans le champ de texte
        var url = window.location.href;

        var url = new URL(urlString);

        var params = url.searchParams;

        var param1Value = params.get("id");

        window.opener.document.getElementById(param1Value+"").value = valeur;
        window.close();
        //   nouvelleFenetre.close();
    }