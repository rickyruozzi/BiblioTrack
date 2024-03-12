<!DOCTYPE html>
<html>
      <!-- Inizio Codice html -->
    <head>
        <link type='text/css' rel="stylesheet" href="prestiti.css">
        <title>Modulo Compilazione Prestiti:</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
	</head>

	<body>
    <header>
            <div class="griglia">
                <div class="contenuto_griglia">
                    <ul>
                        <a href="HOMEPAGE.php"><li>HOMEPAGE</li></a>
                        
                    </ul>
                </div>
            </div>
        </header>
        <!-- richiesta dati da inserire nel db tramite codice HTML -->
        <div class = form>
            <div class = form_content>
                <div id = div_dati_prestiti>
                    <h1 id = dati_prestiti>Dati Prestiti</h1>
                </div>
            <form action="prestiti.php" method="post">

                <div id = form_content>
                    <label for="id_utente" >Id Utente: </label>
                    <input type="text" id="id_utente" maxlength="40" name = "id_utente">

                    <label for="id_libro" >Id Libro: </label>
                    <input type="text" id="autore" maxlength="20" name = "autore">

                    <label for="scadenza_prestito" >scadenza del prestito: </label>
                    <input type="text" id="scadenza_prestito" maxlength="20" name = "scadenza_prestito">
                </div>      

                <div id = buttons>
                    <button type="submit" name="submit">Invia</button>
                    <button type="reset">Reset</button>
                </div>
            </form>
            </div>
        </div>
	</body>
</html>

<?php

if(isset($_POST["submit"])){
    // Dichiarazione variabili da inserire nel DB.
    $id_utente = $_POST["id_utente"];
    $id_libro = $_POST["id_libro"];
    $scadenza_prestito = $_POST["scadenza_prestito"];
    // Dichiarazione informazioni per connessione al DB.
    $server = "localhost";
    $user = "root";
    $password = "";
    $db_nome = "bibliotrack";
    // Dichiarazione stringa di connessione al database.
    $conn = new mysqli($server, $user, $password, $db_nome);
    // controllo sulla connessione.
    if($conn)
	    echo("Connessione eseguita");
    else
	    die("Connessione non eseguita");
    // dichiarazione query d'inserimento dei dati.
    $query = "INSERT INTO prestiti VALUES(0,'$id_utente','$id_libro','$scadenza_prestito')";
    // avvio della query per inserire dati nel DB.
    $conn->query($query);
}
?>
