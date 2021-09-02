function canvi(){  // Funció que crido quan canvia el valor del desplegable.
    
    $.getJSON("http://www.floatrates.com/daily/eur.json", function(divises){ // llegim el JSON// Canvio el json que he creat per la HTTP, per poder actualitzar les dades.
        // console.log(divises); // Mostro el json per pantalla.
        
 // Llegeixo el codi de divisa que ha seleccionat l'usuari
        var codi_divisa = document.getElementById("divisa").value;

        if(codi_divisa != "select"){
            // Aconsegueixo el rate(valor de la divisa) a partir del codi de divisa
            var canvi = divises[codi_divisa]["rate"];

            // Llegeixo el import en € que l'usuari ha escrit
            var euro  = document.getElementById("euro").value;
            // Faig el càlcul (Conversió)
            var resultat = euro * canvi;

            // Li poso el valor del canvi amb només 2 decimals en el input de resultat
                document.getElementById("resultado").value = resultat.toFixed(2);
        }

    });
}