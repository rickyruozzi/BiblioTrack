<!DOCTYPE html>
<html>
    <head>
        <link type='text/css' rel="stylesheet" href="utenti.css">
        <title>Modulo Compilazione Utenti:</title>
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
        <div class = form>
            <div class = form_content>
                <div id = div_dati_utente>
                    <h1 id = dati_utente>Dati Utenti</h1>
                </div>
            <form action="utenti.php" method="post">

                <div id = form_content>
                    <label for="nome" >Nome: </label>
                    <input type="text" id="nome" maxlength="40" name = "nome">

                    <label for="cognome" >Cognome: </label>
                    <input type="text" id="cognome" maxlength="20" name = "cognome">

                    <label for="mail" >Email: </label>
                    <input type="text" id="mail" maxlength="20" name = "mail">

                    <label for="telefono" >Telefono: </label>
                    <input type="text" id="telefono" maxlength="20" name = "telefono">    

                    <label for="password" >Password: </label>
                    <input type="text" id="password" maxlength="20" name = "password">           

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
    
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["mail"];
    $telefono = $_POST["telefono"];
    $password = $_POST["password"];
   
    $server = "localhost";
    $user = "root";
    $password = "";
    $db_nome = "bibliotrack";

    $conn = new mysqli($server, $user, $password, $db_nome);
    if($conn)
	    echo("Connessione eseguita");
    else
	    die("Connessione non eseguita");
    
    $query = "INSERT INTO utenti VALUES(0,'$nome','$cognome','$email','$telefono','$password')";
    $conn->query($query);
}
?>
