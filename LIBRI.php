<!DOCTYPE html>
<html>
    <head>
        <link type='text/css' rel="stylesheet" href="libri.css">
        <title>Modulo Compilazione Libri:</title>
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
                <div id = div_dati_libro>
                    <h1 id = dati_libro>Dati LIBRO</h1>
                </div>
            <form action="libri.php" method="post">
                <div id = form_content>
                    <label for="titolo" >Titolo: </label>
                    <input type="text" id="titolo" maxlength="40" name = "titolo">

                    <label for="autore" >Autore: </label>
                    <input type="text" id="autore" maxlength="20" name = "autore">

                    <label for="casa_editrice" >Casa Editrice: </label>
                    <input type="text" id="casa_editrice" maxlength="20" name = "casa_editrice">

                    <label for="anno_pubblicazione" >Anno di Pubblicazione: </label>
                    <input type="text" id="anno_publicazione" maxlength="20" name = "anno_publicazione">    

                    <label for="collana" >Collana: </label>
                    <input type="text" id="collana" maxlength="20" name = "collana">           

                    <label for="genere" >Genere: </label>
                    <input type="text" id="genere" maxlength="40" name = "genere">             
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

    $titolo = $_POST["titolo"];
    $autore = $_POST["autore"];
    $casa_editrice = $_POST["casa_editrice"];
    $anno_pubblicazione = $_POST["anno_pubblicazione"];
    $collana = $_POST["collana"];
    $genere = $_POST["genere"];
    

    $server = "localhost";
    $user = "root";
    $password = "";
    $db_nome = "bibliotrack";

    $conn = new mysqli($server, $user, $password, $db_nome);
    if($conn)
	    echo("Connessione eseguita");
    else
	    die("Connessione non eseguita");
    $query = "INSERT INTO libri VALUES(0,'$titolo','$autore','$casa_editrice','$anno_pubblicazione','$collana','$genere')";
    $conn->query($query);
}
?>
