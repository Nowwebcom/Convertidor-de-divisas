<?php
  //dades de connexió
  $servidor = "vl19226.dinaserver.com";
  $usuari = "molok_";
  $contrasenya = "/9b77whM0*C5";
  $basededades = "cecot";
  $taula = "cars";

  $sql = "SELECT * FROM $taula"; //consulta

  //fem la connexió
  $conn = new mysqli($servidor, $usuari, $contrasenya, $basededades);

  // comprovem la connexió
  if ($conn->connect_error) {
    return "Fallada en la connexió: ".$conn->connect_error;
    die();
  }

  $resultat = $conn->query($sql); //executem la consulta
  $json_results = ""; //cadena que construirem com un json
  $result_array = []; //resultat en array

  if ($resultat->num_rows > 0) { //comprovem que el resultat no és 0
    for ($n=0; $n<$resultat->num_rows; $n++) { //per cada resultat...
      array_push($result_array, $resultat->fetch_assoc()); //anem afegint cada fila a un array
    }
  }

  $json_results = json_encode($result_array); //el codifiquem en json
  $conn->close(); //tanquem la connexió amb la base de dades

  echo $json_results; //l'imprimim
?>