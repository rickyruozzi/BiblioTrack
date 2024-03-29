
<!DOCTYPE html>
<!-- Inizio Codice html -->
<html>
    <head>
        <link type='text/css' rel="stylesheet" href="feedback.css">
        <title>Modulo Compilazione Feedback:</title>
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
                <div id = div_dati_feedback>
                <h1 id = dati_feedback>Dati Feedback</h1>
                </div>
            <form action="feedback.php" method="post">
                <div id = form_content>
                    <label for="voto" >Voto: </label>
                    <input type="text" id="voto" maxlength="40" name = "voto">

                <div id = form_content>
                    <label for="feedback" >Feedback: </label>
                    <input type="text" id="feedback" maxlength="40" name = "feedback">

                <div id = form_content>
                    <label for="id_utente" >Id Utente: </label>
                    <input type="text" id="id_utente" maxlength="40" name = "id_utente">

                <div id = form_content>
                    <label for="id_libro" >id libro: </label>
                    <input type="text" id="id_libro" maxlength="40" name = "id_libro">
                </div>               
                <div id = buttons>
                    <button type="submit" name="submit">Invia</button>
                    <button type="reset">Reset</button>
                </div>
            </form>
        </div>
	</body>
</html>
<?php

if(isset($_POST["submit"])){
    // Dichiarazione variabili da inserire nel DB.
    $voto = $_POST["voto"];
    $feedback = $_POST["feedback"]
    $id_utente = $_POST["id_utente"]
    $id_libro = $_POST["id_libro"]
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
    $query = "INSERT INTO feedback_libri VALUES(0,'$voto','$feedback','$id_utente','$id_libro')";
    // avvio della query per inserire dati nel DB.
    $conn->query($query);
}
?>
